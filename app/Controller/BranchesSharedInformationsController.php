<?php

App::uses('AppController', 'Controller');

/**
 * BranchesSharedInformations Controller
 *
 * @property BranchesSharedInformation $BranchesSharedInformation
 * @property PaginatorComponent $Paginator
 */
class BranchesSharedInformationsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array();

    /**
     * Allow access to index & view actions
     */
    /**
    public function beforeFilter() {
        parent::beforeFilter();
        $user = $this->Auth->user();
        if (isset($user['role']) && $user['role'] == 'admin') {
            $this->Auth->allow('*');
        } else {
            $this->Auth->allow('index');
        }
    }
    */

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->BranchesSharedInformation->recursive = 0;
        $user = $this->Auth->user();

        if (isset($user['role']) && $user['role'] == 'admin') {

            $this->loadModel('JewelryStore');
            $this->JewelryStore->recursive = -1;
            $jewelryStores = $this->JewelryStore->find('list', array(
        'fields' => array('id','name')));


            $this->set('branchesSharedInformations', $this->BranchesSharedInformation->find('all'));
            $options = array(
                'allowDelete' => 1,
                'allowEdit' => 1,
                'allowAdd' => 1
            );
            $this->set('options',$options);
            $this->set(compact('jewelryStores',$jewelryStores));

        } else {
            $this->loadModel('Branch');
            $this->Branch->recursive = -1;
            $branch = $this->Branch->find('first', array('fields' => array('id'), 'conditions' => array('user_id' => $user['id'])));
            $this->set('branchesSharedInformations', $this->BranchesSharedInformation->find('all', array('conditions' => array('branch_id' => $branch['Branch']['id']))));
            $options = array(
                'allowDelete' => 0,
                'allowEdit' => 0,
                'allowAdd' => 0
            );
            $this->set('options',$options);
        }
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
        if (!$this->BranchesSharedInformation->exists($id)) {
            throw new NotFoundException(__('Invalid branches shared information'));
        }
        $options = array('conditions' => array('BranchesSharedInformation.' . $this->BranchesSharedInformation->primaryKey => $id));
        $this->set('branchesSharedInformation', $this->BranchesSharedInformation->find('first', $options));
    }
    */
    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->BranchesSharedInformation->create();
            if ($this->BranchesSharedInformation->save($this->request->data)) {
                $this->Flash->success(__('The branches shared information has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The branches shared information could not be saved. Please, try again.'));
            }
        }

        $this->loadModel('JewelryStore');
        $jewelryStores = $this->JewelryStore->find('list');
        $branches = $this->BranchesSharedInformation->Branch->find('list');
        $createdUsers = $this->BranchesSharedInformation->CreatedUser->find('list');
        $modifiedUsers = $this->BranchesSharedInformation->ModifiedUser->find('list');
        $statuses = $this->BranchesSharedInformation->Status->find('list');
        $this->set(compact('jewelryStores', 'branches', 'createdUsers', 'modifiedUsers', 'statuses'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->BranchesSharedInformation->exists($id)) {
            throw new NotFoundException(__('Invalid branches shared information'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->BranchesSharedInformation->save($this->request->data)) {
                $this->Flash->success(__('The branches shared information has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The branches shared information could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('BranchesSharedInformation.' . $this->BranchesSharedInformation->primaryKey => $id));
            $this->request->data = $this->BranchesSharedInformation->find('first', $options);
        }
        $branches = $this->BranchesSharedInformation->Branch->find('list');
        $createdUsers = $this->BranchesSharedInformation->CreatedUser->find('list');
        $modifiedUsers = $this->BranchesSharedInformation->ModifiedUser->find('list');
        $statuses = $this->BranchesSharedInformation->Status->find('list');
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
        $this->BranchesSharedInformation->id = $id;
        if (!$this->BranchesSharedInformation->exists()) {
            throw new NotFoundException(__('Url inválida'));
        }

        $this->request->allowMethod('post', 'delete');
        // Actualizar el status 
        $data['BranchesSharedInformation']['status_id'] = 3;
        if ($this->BranchesSharedInformation->save($data)) {
            $this->Flash->success(__('La url ha sido eliminada'));
        } else {
            $this->Flash->error(__('La url no pudo ser eliminada, intente más tarde'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function isAuthorized($user) {
        $action = $this->request->params['action'];
        if ($user['role'] !== 'admin' && $action == 'index') {
            return true;
        }
        // Default deny
        return parent::isAuthorized($user);
    }

}
