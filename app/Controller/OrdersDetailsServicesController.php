<?php
App::uses('AppController', 'Controller');
/**
 * OrdersDetailsServices Controller
 *
 * @property OrdersDetailsService $OrdersDetailsService
 * @property PaginatorComponent $Paginator
 */
class OrdersDetailsServicesController extends AppController {

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
		$this->OrdersDetailsService->recursive = 0;
		$this->set('ordersDetailsServices', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OrdersDetailsService->exists($id)) {
			throw new NotFoundException(__('Invalid orders details service'));
		}
		$options = array('conditions' => array('OrdersDetailsService.' . $this->OrdersDetailsService->primaryKey => $id));
		$this->set('ordersDetailsService', $this->OrdersDetailsService->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrdersDetailsService->create();
			if ($this->OrdersDetailsService->save($this->request->data)) {
				$this->Flash->success(__('The orders details service has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The orders details service could not be saved. Please, try again.'));
			}
		}
		$services = $this->OrdersDetailsService->Service->find('list');
		$ordersDetails = $this->OrdersDetailsService->OrdersDetail->find('list');
		$createdUsers = $this->OrdersDetailsService->CreatedUser->find('list');
		$modifiedUsers = $this->OrdersDetailsService->ModifiedUser->find('list');
		$statuses = $this->OrdersDetailsService->Status->find('list');
		$this->set(compact('services', 'ordersDetails', 'createdUsers', 'modifiedUsers', 'statuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->OrdersDetailsService->exists($id)) {
			throw new NotFoundException(__('Invalid orders details service'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OrdersDetailsService->save($this->request->data)) {
				$this->Flash->success(__('The orders details service has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The orders details service could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OrdersDetailsService.' . $this->OrdersDetailsService->primaryKey => $id));
			$this->request->data = $this->OrdersDetailsService->find('first', $options);
		}
		$services = $this->OrdersDetailsService->Service->find('list');
		$ordersDetails = $this->OrdersDetailsService->OrdersDetail->find('list');
		$createdUsers = $this->OrdersDetailsService->CreatedUser->find('list');
		$modifiedUsers = $this->OrdersDetailsService->ModifiedUser->find('list');
		$statuses = $this->OrdersDetailsService->Status->find('list');
		$this->set(compact('services', 'ordersDetails', 'createdUsers', 'modifiedUsers', 'statuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->OrdersDetailsService->id = $id;
		if (!$this->OrdersDetailsService->exists()) {
			throw new NotFoundException(__('Invalid orders details service'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->OrdersDetailsService->delete()) {
			$this->Flash->success(__('The orders details service has been deleted.'));
		} else {
			$this->Flash->error(__('The orders details service could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
