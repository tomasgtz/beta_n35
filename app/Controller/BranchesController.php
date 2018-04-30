<?php
App::uses('AppController', 'Controller');
/**
 * Branches Controller
 *
 * @property Branch $Branch
 * @property PaginatorComponent $Paginator
 */
class BranchesController extends AppController {

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
		$this->Branch->recursive = 0;
		$this->set('branches', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Branch->exists($id)) {
			throw new NotFoundException(__('Invalid branch'));
		}
		$options = array('conditions' => array('Branch.' . $this->Branch->primaryKey => $id));
		$this->set('branch', $this->Branch->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Branch->create();
			if ($this->Branch->save($this->request->data)) {
				$this->Flash->success(__('The branch has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The branch could not be saved. Please, try again.'));
			}
		}
		$states = $this->Branch->State->find('list');
		$countries = $this->Branch->Country->find('list');
		$users = $this->Branch->User->find('list');
		$jewelrystores = $this->Branch->Jewelrystore->find('list');
		$createdUsers = $this->Branch->CreatedUser->find('list');
		$modifiedUsers = $this->Branch->ModifiedUser->find('list');
		$statuses = $this->Branch->Status->find('list');
		$this->set(compact('states', 'countries', 'users', 'jewelrystores', 'createdUsers', 'modifiedUsers', 'statuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Branch->exists($id)) {
			throw new NotFoundException(__('Invalid branch'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Branch->save($this->request->data)) {
				$this->Flash->success(__('The branch has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The branch could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Branch.' . $this->Branch->primaryKey => $id));
			$this->request->data = $this->Branch->find('first', $options);
		}
		$states = $this->Branch->State->find('list');
		$countries = $this->Branch->Country->find('list');
		$users = $this->Branch->User->find('list');
		$jewelrystores = $this->Branch->Jewelrystore->find('list');
		$createdUsers = $this->Branch->CreatedUser->find('list');
		$modifiedUsers = $this->Branch->ModifiedUser->find('list');
		$statuses = $this->Branch->Status->find('list');
		$this->set(compact('states', 'countries', 'users', 'jewelrystores', 'createdUsers', 'modifiedUsers', 'statuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Branch->id = $id;
		if (!$this->Branch->exists()) {
			throw new NotFoundException(__('Invalid branch'));
		}
		$this->request->allowMethod('post', 'delete');
		// Actualizar el status 
		$data['Branch']['status_id'] = 3;
		if ($this->Branch->save($data)) {
			$this->Flash->success(__('The branch has been deleted.'));
		} else {
			$this->Flash->error(__('The branch could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
