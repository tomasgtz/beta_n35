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
    public $components = array();

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Branch->recursive = 0;
        $this->set('branches', $this->Branch->find("all"));
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
        if (!$this->Branch->exists($id)) {
            throw new NotFoundException(__('Sucursal no encontrada'));
        }
        $options = array('conditions' => array('Branch.' . $this->Branch->primaryKey => $id));
        $this->set('branch', $this->Branch->find('first', $options));
    }
    */

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Branch->create();
            if ($this->Branch->save($this->request->data)) {
                $this->Flash->success(__('La información se guardó correctamente.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('No se pudo guardar la información. Intente nuevamente.'));
            }
        }
        $states = $this->Branch->State->find('list');
        $countries = $this->Branch->Country->find('list', array('conditions' => array('id' => 138)));
        $usersIds = array_values($this->Branch->find('list', array('recursive' => -1, 'fields' => 'user_id')));
        $options01 = array(
            'conditions' => array(
                'AND' => array(
                    'User.role != "admin"',
                    'NOT' => array('User.id' => $usersIds)
                )
            )
        );
        $users = $this->Branch->User->find('list', $options01);
        // $users = $this->Branch->User->find('list');
        $jewelrystores = $this->Branch->JewelryStore->find('list');
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
            throw new NotFoundException(__('Sucursal no encontrada'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Branch->save($this->request->data)) {
                $this->Flash->success(__('La información se guardó correctamente.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('No se pudo guardar la información. Intente nuevamente.'));
            }
        } else {
            $options = array('conditions' => array('Branch.' . $this->Branch->primaryKey => $id));
            $this->request->data = $this->Branch->find('first', $options);
        }
        $states = $this->Branch->State->find('list');
        $countries = $this->Branch->Country->find('list', array('conditions' => array('id' => 138)));
        $usersIds = array_values($this->Branch->find('list', array('recursive' => -1, 'fields' => 'user_id', 'conditions' => array('id != ' . $id . ''))));
        $options01 = array(
            'conditions' => array(
                'AND' => array(
                    'User.role != "admin"',
                    'NOT' => array('User.id' => $usersIds)
                )
            )
        );
        $users = $this->Branch->User->find('list', $options01);
        $jewelrystores = $this->Branch->JewelryStore->find('list');
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
            throw new NotFoundException(__('Sucursal no encontrada'));
        }
        $this->request->allowMethod('post', 'delete');
        // Actualizar el status 
        $data['Branch']['status_id'] = 3;
        if ($this->Branch->save($data)) {
            $this->Flash->success(__('El status de la sucursal ha sido actualizado a borrado'));
        } else {
            $this->Flash->error(__('No se pudo guardar la información. Intente nuevamente'));
        }
        return $this->redirect(array('action' => 'index'));
    }
    
    public function isAuthorized($user) {
        return parent::isAuthorized($user);
    }
    
}