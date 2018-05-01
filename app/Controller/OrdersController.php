<?php
App::uses('AppController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 */
class OrdersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array();

/**
 * index method
 *
 * @return void
 */
	public function index() {
        $this->Order->recursive = 0;
        $user = $this->Auth->user();
        if (isset($user['role']) && $user['role'] == 'admin' ) {
          $this->set('orders', $this->Order->find("all"));
        } else {
          $this->set('orders', $this->Order->find("all",array("conditions" => array("user_id" => $user['id']))));
        }		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
		$this->set('order', $this->Order->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Order->create();
			if ($this->Order->save($this->request->data)) {
				$this->Flash->success(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The order could not be saved. Please, try again.'));
			}
		}
		$quotes = $this->Order->Quote->find('list');
		$branches = $this->Order->Branch->find('list');
		$paymentsTypes = $this->Order->PaymentsType->find('list');
		$ordersPhases = $this->Order->OrdersPhase->find('list');
		$createdUsers = $this->Order->CreatedUser->find('list');
		$modifiedUsers = $this->Order->ModifiedUser->find('list');
		$statuses = $this->Order->Status->find('list');
		$this->set(compact('quotes', 'branches', 'paymentsTypes', 'ordersPhases', 'createdUsers', 'modifiedUsers', 'statuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Order->save($this->request->data)) {
				$this->Flash->success(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
			$this->request->data = $this->Order->find('first', $options);
		}
		$quotes = $this->Order->Quote->find('list');
		$branches = $this->Order->Branch->find('list');
		$paymentsTypes = $this->Order->PaymentsType->find('list');
		$ordersPhases = $this->Order->OrdersPhase->find('list');
		$createdUsers = $this->Order->CreatedUser->find('list');
		$modifiedUsers = $this->Order->ModifiedUser->find('list');
		$statuses = $this->Order->Status->find('list');
		$this->set(compact('quotes', 'branches', 'paymentsTypes', 'ordersPhases', 'createdUsers', 'modifiedUsers', 'statuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Order->delete()) {
			$this->Flash->success(__('The order has been deleted.'));
		} else {
			$this->Flash->error(__('The order could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

    public function isAuthorized($user) {
        // Admin can access every action
        if (isset($user['role'])) {
            return true;
        }
        // Default deny
        return parent::isAuthorized($user);
    }

}
