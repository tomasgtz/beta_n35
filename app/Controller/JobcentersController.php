<?php
App::uses('AppController', 'Controller');
/**
 * Jobcenters Controller
 *
 * @property Jobcenter $Jobcenter
 * @property PaginatorComponent $Paginator
 */
class JobcentersController extends AppController {

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
		$this->Jobcenter->recursive = 0;

		$this->loadModel('User');
		$user = $this->User->find('first', array('conditions' => array( 'User.id' => $userId = $this->Auth->user('id'))));
		
		if( $user['User']['role'] == 'normal') {
		
			$this->set('jobcenters', $this->Jobcenter->find("all", ['conditions' => ['Company.id' => $user['User']['company_id'] ]]));
			$showAddButton = false;
		}


		if( $user['User']['role'] == 'admin') {	
			$this->set('jobcenters', $this->Jobcenter->find("all"));
			$showAddButton = true;
		}


		$this->set(compact('showAddButton') );
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Jobcenter->exists($id)) {
			throw new NotFoundException(__('Invalid jobcenter'));
		}
		$options = array('conditions' => array('Jobcenter.' . $this->Jobcenter->primaryKey => $id));
		$this->set('jobcenter', $this->Jobcenter->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		if ($this->request->is('post')) {

			$this->Jobcenter->create();
			
			$this->request->data['Jobcenter']['status_id'] = 1;

			if ($this->Jobcenter->save($this->request->data)) {
				$this->Flash->success(__('El centro de trabajo ha sido agregado exitosamente.'));


				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('El centro de trabajo no fue guardado. Intente de nuevo.'));
			}
		}

		$this->loadModel('User');
		$user = $this->User->find('first', array('conditions' => array( 'User.id' => $userId = $this->Auth->user('id'))));
		
		$this->loadModel('Company');

		if( $user['User']['role'] == 'normal') {

			$this->set('companies',  $this->Company->find('list', ['conditions' => ['status_id' => '1', 
																				   'id' => $user['User']['company_id']
																				  ]]));
		
		} else if( $user['User']['role'] == 'admin') {

			$this->set('companies',  $this->Company->find('list', [ 'conditions' => ['status_id' => '1']]));
			
		}
			
		//	$companies = $this->Jobcenter->Company->find('list');
		$states = $this->Jobcenter->State->find('list');
		$this->loadModel('Status');
		$statuses = $this->Status->find('list', array('fields' => array('id', 'text')) );

		$this->loadModel('State');
		$states = $this->State->find('list', array('fields' => array('id', 'name')) );

		$this->set(compact('statuses', 'states'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Jobcenter->exists($id)) {
			throw new NotFoundException(__('Invalid jobcenter'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Jobcenter->save($this->request->data)) {
				$this->Flash->success(__('The jobcenter has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The jobcenter could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Jobcenter.' . $this->Jobcenter->primaryKey => $id));
			$this->request->data = $this->Jobcenter->find('first', $options);
		}

		$this->loadModel('User');
		$user = $this->User->find('first', array('conditions' => array( 'User.id' => $userId = $this->Auth->user('id'))));
		
		$this->loadModel('Company');

	
		if( $user['User']['role'] == 'normal') {

			$companies = $this->Company->find('list', ['conditions' => ['status_id' => '1', 
																				   'id' => $user['User']['company_id']
																				  ]]);
		
		} else if( $user['User']['role'] == 'admin') {

			$companies = $this->Company->find('list', [ 'conditions' => ['status_id' => '1', 'id' => $this->request->data['Company']['id']]]);
			
		}

		//$companies = $this->Jobcenter->Company->find('list');
		$states = $this->Jobcenter->State->find('list');
		$this->loadModel('Status');
		$statuses = $this->Status->find('list', array('fields' => array('id', 'text')) );
		$this->set(compact('companies', 'states', 'statuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Jobcenter->id = $id;
		if (!$this->Jobcenter->exists()) {
			throw new NotFoundException(__('Invalid jobcenter'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Jobcenter->delete()) {
			$this->Flash->success(__('The jobcenter has been deleted.'));
		} else {
			$this->Flash->error(__('The jobcenter could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
