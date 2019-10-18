<?php
App::uses('AppController', 'Controller');
/**
 * Companies Controller
 *
 * @property Company $Company
 * @property PaginatorComponent $Paginator
 */
class CompaniesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Company->recursive = 0;
		

		$this->loadModel('User');
		$user = $this->User->find('first', array('conditions' => array( 'User.id' => $userId = $this->Auth->user('id'))));
		
		if( $user['User']['role'] == 'normal') {

			if($user['User']['company_id'] === null) {
				$this->Flash->error(__('Favor de dar de alta su empresa'));
				return $this->redirect(array('action' => 'add'));
			}

			$this->set('companies',  $this->Company->find('all', ['conditions' => ['Status.text' => 'Active', 'Company.id' => $user['User']['company_id']]]));
			$showAddButton = false;
			
		
		} else if( $user['User']['role'] == 'admin') {

			$this->set('companies',  $this->Company->find('all', ['conditions' => ['Status.text' => 'Active']]));
			$showAddButton = true;
			
		}

		$this->set(compact('showAddButton', 'user') );
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Company->exists($id)) {
			throw new NotFoundException(__('Invalid company'));
		}
		$options = array('conditions' => array('Company.' . $this->Company->primaryKey => $id));
		$this->set('company', $this->Company->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		if ($this->request->is('post')) {

			$this->Company->create();

			if ($this->Company->save($this->request->data)) {
				$this->Flash->success(__('La empresa se guardo correctamente. Por favor, complete la informacion de cada centro de trabajo'));

				$this->loadModel('JobCenter');
				

				for($i = 0; $i < (int) $this->request->data['Company']['no_jobcenters']; $i++) {
					$arr = array('JobCenter' => array(
												'company_id' => $this->Company->id,
												'status_id' => '1',
												'name' => 'Centro de Trabajo ' . ($i + 1)
												)
							);
					$this->JobCenter->create();
					$this->JobCenter->save($arr);
				}
				
				return $this->redirect(array('controller' => 'JobCenters', 'action' => 'index'));
			} else {
				$this->Flash->error(__('The company could not be saved. Please, try again.'));
			}
		}
		$statuses = $this->Company->Status->find('list');
		$this->set(compact('statuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Company->exists($id)) {
			throw new NotFoundException(__('Invalid company'));
		}

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Company->save($this->request->data)) {
				$this->Flash->success(__('The company has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The company could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Company.' . $this->Company->primaryKey => $id));
			$this->request->data = $this->Company->find('first', $options);
		}

		$this->loadModel('Status');
		$statuses = $this->Status->find('list', array('fields' => array('id', 'text')) );

		$this->set(compact('statuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Company->id = $id;
		if (!$this->Company->exists()) {
			throw new NotFoundException(__('Invalid company'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Company->delete()) {
			$this->Flash->success(__('The company has been deleted.'));
		} else {
			$this->Flash->error(__('The company could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
