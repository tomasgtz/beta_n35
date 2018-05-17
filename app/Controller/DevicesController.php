<?php

App::uses('AppController', 'Controller');

/**
 * Devices Controller
 *
 * @property Device $Device
 * @property PaginatorComponent $Paginator
 */
class DevicesController extends AppController {

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
        $this->Device->recursive = 0;
        if (!isset($this->request->params['named']['branch_id']) || 
            $this->request->params['named']['branch_id']== null) {
            $this->request->params['named']['branch_id'] = '';
        }
        if (!empty($this->request->params['named']['branch_id'])) {
            $options = array(
                'conditions' => array(
                    'branch_id' => $this->request->params['named']['branch_id']
                )
            );
            $this->set('devices', $this->Device->find("all", $options));
        } else {
            $this->set('devices', $this->Device->find("all"));
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
        if (!$this->Device->exists($id)) {
            throw new NotFoundException(__('Dispositivo no encontrado'));
        }
        $options = array('conditions' => array('Device.' . $this->Device->primaryKey => $id));
        $this->set('device', $this->Device->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Device->create();
            if ($this->Device->save($this->request->data)) {
                $this->Flash->success(__('La información fue guardada correctamente.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('No se pudo guardar la información. Intente nuevamente.'));
            }
        }
        $branches = $this->Device->Branch->find('list');
        $createdUsers = $this->Device->CreatedUser->find('list');
        $modifiedUsers = $this->Device->ModifiedUser->find('list');
        $statuses = $this->Device->Status->find('list');
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
        if (!$this->Device->exists($id)) {
            throw new NotFoundException(__('Dispositivo no encontrado'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Device->save($this->request->data)) {
                $this->Flash->success(__('La información fue guardada correctamente.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('No se pudo guardar la información. Intente nuevamente.'));
            }
        } else {
            $options = array('conditions' => array('Device.' . $this->Device->primaryKey => $id));
            $this->request->data = $this->Device->find('first', $options);
        }
        $branches = $this->Device->Branch->find('list');
        $createdUsers = $this->Device->CreatedUser->find('list');
        $modifiedUsers = $this->Device->ModifiedUser->find('list');
        $statuses = $this->Device->Status->find('list');
        $return_id = $this->request->pass[1];
        $this->set(compact('return_id', 'branches', 'createdUsers', 'modifiedUsers', 'statuses'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Device->id = $id;
        if (!$this->Device->exists()) {
            throw new NotFoundException(__('Dispositivo no encontrado'));
        }
        $this->request->allowMethod('post', 'delete');
        // Actualizar el status 
        $data['Device']['status_id'] = 3;
        if ($this->Device->save($data)) {
            $this->Flash->success(__('El status del dispositivo fue cambiado a eliminado'));
        } else {
            $this->Flash->error(__('No se pudo guardar la información. Intente nuevamente'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function isAuthorized($user) {
        return parent::isAuthorized($user);
    }

}
