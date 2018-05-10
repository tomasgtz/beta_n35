<?php

App::uses('AppController', 'Controller');

/**
 * BranchesColors Controller
 *
 * @property BranchesColor $BranchesColor
 * @property PaginatorComponent $Paginator
 */
class BranchesColorsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array(
        'File' => array(
            'routeToSave' => APP . 'webroot' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'logos' . DIRECTORY_SEPARATOR,
            'allowedExtensions' => array('jpg', 'jpeg', 'gif', 'png'),
        )
    );

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->BranchesColor->recursive = 0;
        $user = $this->Auth->user();
        if (isset($user['role']) && $user['role'] == 'admin') {
            $this->set('branchesColors', $this->BranchesColor->find('all'));
        } else {
            $this->loadModel('Branch');
            $this->Branch->recursive = -1;
            $branch = $this->Branch->find('first', array('fields' => array('id'), 'conditions' => array('user_id' => $user['id'])));
            $this->set('branchesColors', $this->BranchesColor->find('all', array('conditions' => array('branch_id' => $branch['Branch']['id']))));
        }
        $this->set('fileRoute', 'app/webroot/files/logos/');
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->BranchesColor->exists($id)) {
            throw new NotFoundException(__('Invalid branches color'));
        }
        $options = array('conditions' => array('BranchesColor.' . $this->BranchesColor->primaryKey => $id));
        $this->set('branchesColor', $this->BranchesColor->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            // Inicio guardar archivos
            $this->File->identifier = 'SucursalLogo' . date('YmdHis');
            $data = $this->request->data['BranchesColor']['url_logo'];
            $this->request->data['BranchesColor']['url_logo'] = $this->File->save($data) ? $this->File->name : $this->File->imageNotFound;
            // Fin guardar archivos
            $this->BranchesColor->create();
            if ($this->BranchesColor->save($this->request->data)) {
                $this->Flash->success(__('The branches color has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The branches color could not be saved. Please, try again.'));
            }
        }
        $user = $this->Auth->user();
        if (isset($user['role']) && $user['role'] == 'admin') {
            $branches = $this->BranchesColor->Branch->find('list');
        } else {
            $branches = $this->BranchesColor->Branch->find('list', array('conditions' => array('user_id' => $user['id'])));
        }
        $createdUsers = $this->BranchesColor->CreatedUser->find('list');
        $modifiedUsers = $this->BranchesColor->ModifiedUser->find('list');
        $statuses = $this->BranchesColor->Status->find('list');
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
        if (!$this->BranchesColor->exists($id)) {
            throw new NotFoundException(__('Invalid branches color'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->request->data['BranchesColor']['url_logo']['name'] == '') {
                unset($this->request->data['BranchesColor']['url_logo']);
            } else {
                $this->File->identifier = 'SucursalLogo' . date('YmdHis');
                $data = $this->request->data['BranchesColor']['url_logo'];
                $this->request->data['BranchesColor']['url_logo'] = $this->File->save($data) ? $this->File->name : $this->File->imageNotFound;
            }
            if ($this->BranchesColor->save($this->request->data)) {
                $this->Flash->success(__('The branches color has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The branches color could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('BranchesColor.' . $this->BranchesColor->primaryKey => $id));
            $this->request->data = $this->BranchesColor->find('first', $options);
        }
        $user = $this->Auth->user();
        if (isset($user['role']) && $user['role'] == 'admin') {
            $branches = $this->BranchesColor->Branch->find('list');
        } else {
            $branches = $this->BranchesColor->Branch->find('list', array('conditions' => array('user_id' => $user['id'])));
        }
        $createdUsers = $this->BranchesColor->CreatedUser->find('list');
        $modifiedUsers = $this->BranchesColor->ModifiedUser->find('list');
        $statuses = $this->BranchesColor->Status->find('list');
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
        $this->BranchesColor->id = $id;
        if (!$this->BranchesColor->exists()) {
            throw new NotFoundException(__('Lista de color inválida'));
        }
        $this->request->allowMethod('post', 'delete');
        // Actualizar el status 
        $data['BranchesColor']['status_id'] = 3;
        if ($this->BranchesColor->save($data)) {
            $this->Flash->success(__('La lista de colores fue eliminada.'));
        } else {
            $this->Flash->error(__('La lista de colores no pudo ser eliminada, intente más tarde'));
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

    public function download() {
        if ($this->request->is('get')) {
            $filename = $this->request->params['pass'][0] . '.' . $this->request->params['ext'];
            $fullPath = $this->File->routeToSave . $filename;
            if (file_exists($fullPath)) {
                $this->response->file($fullPath, array('download' => true, 'name' => $filename));
            } else {
                throw new NotFoundException();
            }
        } else {
            throw new NotFoundException();
        }
        return $this->response;
    }

}
