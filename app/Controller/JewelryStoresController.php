<?php
App::uses('AppController', 'Controller');
/**
 * JewelryStores Controller
 *
 * @property JewelryStore $JewelryStore
 * @property PaginatorComponent $Paginator
 */
class JewelryStoresController extends AppController {

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
		$this->JewelryStore->recursive = 0;
		$this->set('jewelryStores', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->JewelryStore->exists($id)) {
			throw new NotFoundException(__('Invalid jewelry store'));
		}
		$options = array('conditions' => array('JewelryStore.' . $this->JewelryStore->primaryKey => $id));
		$this->set('jewelryStore', $this->JewelryStore->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->JewelryStore->create();
			// Convertir en mayusculas el RFC
			$this->request->data['JewelryStore']['rfc'] = strtoupper($this->request->data['JewelryStore']['rfc']);
			if ($this->JewelryStore->save($this->request->data)) {
				$this->Flash->success(__('The jewelry store has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The jewelry store could not be saved. Please, try again.'));
			}
		}
		$states = $this->JewelryStore->State->find('list');
		$countries = $this->JewelryStore->Country->find('list',array('conditions' => array('id' => 138)));
		$createdUsers = $this->JewelryStore->CreatedUser->find('list');
		$modifiedUsers = $this->JewelryStore->ModifiedUser->find('list');
		$statuses = $this->JewelryStore->Status->find('list');
		$this->set(compact('states', 'countries', 'createdUsers', 'modifiedUsers', 'statuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->JewelryStore->exists($id)) {
			throw new NotFoundException(__('Invalid jewelry store'));
		}
		if ($this->request->is(array('post', 'put'))) {
			// Convertir en mayusculas el RFC
			$this->request->data['JewelryStore']['rfc'] = strtoupper($this->request->data['JewelryStore']['rfc']);
			if ($this->JewelryStore->save($this->request->data)) {
				$this->Flash->success(__('The jewelry store has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The jewelry store could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('JewelryStore.' . $this->JewelryStore->primaryKey => $id));
			$this->request->data = $this->JewelryStore->find('first', $options);
		}
		$states = $this->JewelryStore->State->find('list');
		$countries = $this->JewelryStore->Country->find('list',array('conditions' => array('id' => 138)));
		$createdUsers = $this->JewelryStore->CreatedUser->find('list');
		$modifiedUsers = $this->JewelryStore->ModifiedUser->find('list');
		// $statuses = $this->JewelryStore->Status->find('list',array('conditions' => array('id != 3')));
		$statuses = $this->JewelryStore->Status->find('list');
		$this->set(compact('states', 'countries', 'createdUsers', 'modifiedUsers', 'statuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->JewelryStore->id = $id;
		if (!$this->JewelryStore->exists()) {
			throw new NotFoundException(__('Invalid jewelry store'));
		}
		$this->request->allowMethod('post', 'delete');
		// Actualizar el status 
		$data['JewelryStore']['status_id'] = 3;
		if ($this->JewelryStore->save($data)) {
			$this->Flash->success(__('The jewelry store has been deleted.'));
		} else {
			$this->Flash->error(__('The jewelry store could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
