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
    public $components = array();

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->JewelryStore->recursive = 0;
        $this->set('jewelryStores', $this->JewelryStore->find("all"));
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
        if (!$this->JewelryStore->exists($id)) {
            throw new NotFoundException(__('No se encontró la joyería'));
        }
        $options = array('conditions' => array('JewelryStore.' . $this->JewelryStore->primaryKey => $id));
        $this->set('jewelryStore', $this->JewelryStore->find('first', $options));
    }
    */

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
                $this->Flash->success(__('La información fue guardada exitosamente.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('No pudo guardarse la informacion. Intente nuevamente.'));
            }
        }
        $states = $this->JewelryStore->State->find('list');
        $countries = $this->JewelryStore->Country->find('list', array('conditions' => array('id' => 138)));
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
            throw new NotFoundException(__('No se encontró la joyería'));
        }
        if ($this->request->is(array('post', 'put'))) {
            // Convertir en mayusculas el RFC
            $this->request->data['JewelryStore']['rfc'] = strtoupper($this->request->data['JewelryStore']['rfc']);
            if ($this->JewelryStore->save($this->request->data)) {
                $this->Flash->success(__('La información fue guardada exitosamente'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('No pudo guardarse la informacion. Intente nuevamente'));
            }
        } else {
            $options = array('conditions' => array('JewelryStore.' . $this->JewelryStore->primaryKey => $id));
            $this->request->data = $this->JewelryStore->find('first', $options);
        }
        $states = $this->JewelryStore->State->find('list');
        $countries = $this->JewelryStore->Country->find('list', array('conditions' => array('id' => 138)));
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
            throw new NotFoundException(__('No se encontró la joyería'));
        }
        $this->request->allowMethod('post', 'delete');
        // Actualizar el status 
        $data['JewelryStore']['status_id'] = 3;
        if ($this->JewelryStore->save($data)) {
            $this->Flash->success(__('El status ha sido cambiado a eliminado'));
        } else {
            $this->Flash->error(__('El status no pudo ser actualizado a eliminado. Intente nuevamente.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function isAuthorized($user) {
        return parent::isAuthorized($user);
    }

}