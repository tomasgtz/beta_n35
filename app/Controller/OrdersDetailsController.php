<?php
App::uses('AppController', 'Controller');
/**
 * OrdersDetails Controller
 *
 * @property OrdersDetail $OrdersDetail
 * @property PaginatorComponent $Paginator
 */
class OrdersDetailsController extends AppController {

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
		$this->OrdersDetail->recursive = 0;
		$this->set('ordersDetails', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
/**
	public function view($id = null) {
		if (!$this->OrdersDetail->exists($id)) {
			throw new NotFoundException(__('Invalid orders detail'));
		}
		$options = array('conditions' => array('OrdersDetail.' . $this->OrdersDetail->primaryKey => $id));
		$this->set('ordersDetail', $this->OrdersDetail->find('first', $options));
	}
*/

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrdersDetail->create();
			if ($this->OrdersDetail->save($this->request->data)) {
				$this->Flash->success(__('The orders detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The orders detail could not be saved. Please, try again.'));
			}
		}
		$orders = $this->OrdersDetail->Order->find('list');
		$createdUsers = $this->OrdersDetail->CreatedUser->find('list');
		$modifiedUsers = $this->OrdersDetail->ModifiedUser->find('list');
		$statuses = $this->OrdersDetail->Status->find('list');
		$services = $this->OrdersDetail->Service->find('list');
		$this->set(compact('orders', 'createdUsers', 'modifiedUsers', 'statuses', 'services'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->OrdersDetail->exists($id)) {
			throw new NotFoundException(__('Invalid orders detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OrdersDetail->save($this->request->data)) {
				$this->Flash->success(__('The orders detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The orders detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OrdersDetail.' . $this->OrdersDetail->primaryKey => $id));
			$this->request->data = $this->OrdersDetail->find('first', $options);
		}
		$orders = $this->OrdersDetail->Order->find('list');
		$createdUsers = $this->OrdersDetail->CreatedUser->find('list');
		$modifiedUsers = $this->OrdersDetail->ModifiedUser->find('list');
		$statuses = $this->OrdersDetail->Status->find('list');
		$services = $this->OrdersDetail->Service->find('list');
		$this->set(compact('orders', 'createdUsers', 'modifiedUsers', 'statuses', 'services'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->OrdersDetail->id = $id;
		if (!$this->OrdersDetail->exists()) {
			throw new NotFoundException(__('Invalid orders detail'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->OrdersDetail->delete()) {
			$this->Flash->success(__('The orders detail has been deleted.'));
		} else {
			$this->Flash->error(__('The orders detail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
