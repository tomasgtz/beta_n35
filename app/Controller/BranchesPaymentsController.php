<?php
App::uses('AppController', 'Controller');
/**
 * BranchesPayments Controller
 *
 * @property BranchesPayment $BranchesPayment
 * @property PaginatorComponent $Paginator
 */
class BranchesPaymentsController extends AppController {

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
		$this->BranchesPayment->recursive = 0;
		$this->set('branchesPayments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BranchesPayment->exists($id)) {
			throw new NotFoundException(__('Invalid branches payment'));
		}
		$options = array('conditions' => array('BranchesPayment.' . $this->BranchesPayment->primaryKey => $id));
		$this->set('branchesPayment', $this->BranchesPayment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BranchesPayment->create();
			if ($this->BranchesPayment->save($this->request->data)) {
				$this->Flash->success(__('The branches payment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The branches payment could not be saved. Please, try again.'));
			}
		}
		$branches = $this->BranchesPayment->Branch->find('list');
		$createdUsers = $this->BranchesPayment->CreatedUser->find('list');
		$modifiedUsers = $this->BranchesPayment->ModifiedUser->find('list');
		$statuses = $this->BranchesPayment->Status->find('list');
		$this->set(compact('branches', 'createdUsers', 'modifiedUsers', 'statuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BranchesPayment->exists($id)) {
			throw new NotFoundException(__('Invalid branches payment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BranchesPayment->save($this->request->data)) {
				$this->Flash->success(__('The branches payment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The branches payment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BranchesPayment.' . $this->BranchesPayment->primaryKey => $id));
			$this->request->data = $this->BranchesPayment->find('first', $options);
		}
		$branches = $this->BranchesPayment->Branch->find('list');
		$createdUsers = $this->BranchesPayment->CreatedUser->find('list');
		$modifiedUsers = $this->BranchesPayment->ModifiedUser->find('list');
		$statuses = $this->BranchesPayment->Status->find('list');
		$this->set(compact('branches', 'createdUsers', 'modifiedUsers', 'statuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->BranchesPayment->id = $id;
		if (!$this->BranchesPayment->exists()) {
			throw new NotFoundException(__('Invalid branches payment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->BranchesPayment->delete()) {
			$this->Flash->success(__('The branches payment has been deleted.'));
		} else {
			$this->Flash->error(__('The branches payment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
