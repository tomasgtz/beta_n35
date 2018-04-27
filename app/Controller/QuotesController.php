<?php
App::uses('AppController', 'Controller');
/**
 * Quotes Controller
 *
 * @property Quote $Quote
 * @property PaginatorComponent $Paginator
 */
class QuotesController extends AppController {

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
		$this->Quote->recursive = 0;
		$this->set('quotes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Quote->exists($id)) {
			throw new NotFoundException(__('Invalid quote'));
		}
		$options = array('conditions' => array('Quote.' . $this->Quote->primaryKey => $id));
		$this->set('quote', $this->Quote->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Quote->create();
			if ($this->Quote->save($this->request->data)) {
				$this->Flash->success(__('The quote has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The quote could not be saved. Please, try again.'));
			}
		}
		$branches = $this->Quote->Branch->find('list');
		$createdUsers = $this->Quote->CreatedUser->find('list');
		$modifiedUsers = $this->Quote->ModifiedUser->find('list');
		$statuses = $this->Quote->Status->find('list');
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
		if (!$this->Quote->exists($id)) {
			throw new NotFoundException(__('Invalid quote'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Quote->save($this->request->data)) {
				$this->Flash->success(__('The quote has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The quote could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Quote.' . $this->Quote->primaryKey => $id));
			$this->request->data = $this->Quote->find('first', $options);
		}
		$branches = $this->Quote->Branch->find('list');
		$createdUsers = $this->Quote->CreatedUser->find('list');
		$modifiedUsers = $this->Quote->ModifiedUser->find('list');
		$statuses = $this->Quote->Status->find('list');
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
		$this->Quote->id = $id;
		if (!$this->Quote->exists()) {
			throw new NotFoundException(__('Invalid quote'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Quote->delete()) {
			$this->Flash->success(__('The quote has been deleted.'));
		} else {
			$this->Flash->error(__('The quote could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
