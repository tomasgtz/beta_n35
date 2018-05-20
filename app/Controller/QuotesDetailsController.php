<?php
App::uses('AppController', 'Controller');
/**
 * QuotesDetails Controller
 *
 * @property QuotesDetail $QuotesDetail
 * @property PaginatorComponent $Paginator
 */
class QuotesDetailsController extends AppController {

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
		$this->QuotesDetail->recursive = 0;
		$this->set('quotesDetails', $this->Paginator->paginate());
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
		if (!$this->QuotesDetail->exists($id)) {
			throw new NotFoundException(__('Invalid quotes detail'));
		}
		$options = array('conditions' => array('QuotesDetail.' . $this->QuotesDetail->primaryKey => $id));
		$this->set('quotesDetail', $this->QuotesDetail->find('first', $options));
	}
*/
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->QuotesDetail->create();
			if ($this->QuotesDetail->save($this->request->data)) {
				$this->Flash->success(__('The quotes detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The quotes detail could not be saved. Please, try again.'));
			}
		}
		$quotes = $this->QuotesDetail->Quote->find('list');
		$createdUsers = $this->QuotesDetail->CreatedUser->find('list');
		$modifiedUsers = $this->QuotesDetail->ModifiedUser->find('list');
		$statuses = $this->QuotesDetail->Status->find('list');
		$this->set(compact('quotes', 'createdUsers', 'modifiedUsers', 'statuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->QuotesDetail->exists($id)) {
			throw new NotFoundException(__('Invalid quotes detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->QuotesDetail->save($this->request->data)) {
				$this->Flash->success(__('The quotes detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The quotes detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('QuotesDetail.' . $this->QuotesDetail->primaryKey => $id));
			$this->request->data = $this->QuotesDetail->find('first', $options);
		}
		$quotes = $this->QuotesDetail->Quote->find('list');
		$createdUsers = $this->QuotesDetail->CreatedUser->find('list');
		$modifiedUsers = $this->QuotesDetail->ModifiedUser->find('list');
		$statuses = $this->QuotesDetail->Status->find('list');
		$this->set(compact('quotes', 'createdUsers', 'modifiedUsers', 'statuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->QuotesDetail->id = $id;
		if (!$this->QuotesDetail->exists()) {
			throw new NotFoundException(__('Invalid quotes detail'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->QuotesDetail->delete()) {
			$this->Flash->success(__('The quotes detail has been deleted.'));
		} else {
			$this->Flash->error(__('The quotes detail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
