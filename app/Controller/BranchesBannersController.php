<?php

App::uses('AppController', 'Controller');

/**
 * BranchesBanners Controller
 *
 * @property BranchesBanner $BranchesBanner
 * @property PaginatorComponent $Paginator
 */
class BranchesBannersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array(
        'File' => array(
            'routeToSave' => APP . 'webroot' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'banners' . DIRECTORY_SEPARATOR,
            'allowedExtensions' => array('jpg', 'jpeg', 'gif', 'png'),
        )
    );

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->BranchesBanner->recursive = 0;
        $user = $this->Auth->user();
        if (isset($user['role']) && $user['role'] == 'admin') {
            $this->set('branchesBanners', $this->BranchesBanner->find('all'));
        } else {
            $this->loadModel('Branch');
            $this->Branch->recursive = -1;
            $branch = $this->Branch->find('first', array('fields' => array('id'), 'conditions' => array('user_id' => $user['id'])));
            $this->set('branchesBanners', $this->BranchesBanner->find('all', array('conditions' => array('branch_id' => $branch['Branch']['id']))));
        }
        $this->set('fileRoute', 'app/webroot/files/banners/');
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->BranchesBanner->exists($id)) {
            throw new NotFoundException(__('Invalid branches banner'));
        }
        $options = array('conditions' => array('BranchesBanner.' . $this->BranchesBanner->primaryKey => $id));
        $this->set('branchesBanner', $this->BranchesBanner->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {

        if ($this->request->is('post')) {
            // Inicio guardar archivos
            $this->File->identifier = 'BranchBanner' . date('YmdHis');
            $data = $this->request->data['BranchesBanner']['url_banner'];
            $this->request->data['BranchesBanner']['url_banner'] = $this->File->save($data) ? $this->File->name : $this->File->imageNotFound;
            // Fin guardar archivos
            $this->BranchesBanner->create();
            if ($this->BranchesBanner->save($this->request->data)) {
                $this->Flash->success(__('El banner ha sido guardado correctamente.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('El banner no pudo ser guardado'));
            }
        }
        $user = $this->Auth->user();
        if (isset($user['role']) && $user['role'] == 'admin') {
            $branches = $this->BranchesBanner->Branch->find('list');
        } else {
            $branches = $this->BranchesBanner->Branch->find('list', array('conditions' => array('user_id' => $user['id'])));
        }
        $createdUsers = $this->BranchesBanner->CreatedUser->find('list');
        $modifiedUsers = $this->BranchesBanner->ModifiedUser->find('list');
        $statuses = $this->BranchesBanner->Status->find('list');
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
        if (!$this->BranchesBanner->exists($id)) {
            throw new NotFoundException(__('Banner inválido'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->request->data['BranchesBanner']['url_banner']['name'] == '') {
                unset($this->request->data['BranchesBanner']['url_banner']);
            } else {
                $this->File->identifier = 'BranchBanner' . date('YmdHis');
                $data = $this->request->data['BranchesBanner']['url_banner'];
                $this->request->data['BranchesBanner']['url_banner'] = $this->File->save($data) ? $this->File->name : $this->File->imageNotFound;
            }
            if ($this->BranchesBanner->save($this->request->data)) {
                $this->Flash->success(__('El banner ha sido guardado correctamente.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('El banner no pudo ser guardado, intente otra vez'));
            }
        } else {
            $options = array('conditions' => array('BranchesBanner.' . $this->BranchesBanner->primaryKey => $id));
            $this->request->data = $this->BranchesBanner->find('first', $options);
        }
        $user = $this->Auth->user();
        if (isset($user['role']) && $user['role'] == 'admin') {
            $branches = $this->BranchesBanner->Branch->find('list');
        } else {
            $branches = $this->BranchesBanner->Branch->find('list', array('conditions' => array('user_id' => $user['id'])));
        }
        $createdUsers = $this->BranchesBanner->CreatedUser->find('list');
        $modifiedUsers = $this->BranchesBanner->ModifiedUser->find('list');
        $statuses = $this->BranchesBanner->Status->find('list');
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
        $this->BranchesBanner->id = $id;
        if (!$this->BranchesBanner->exists()) {
            throw new NotFoundException(__('Invalid branches banner'));
        }
        $this->request->allowMethod('post', 'delete');
        // Actualizar el status 
        $data['BranchesBanner']['status_id'] = 3;
        if ($this->BranchesBanner->save($data)) {
            $this->Flash->success(__('El banner ha sido eliminado.'));
        } else {
            $this->Flash->error(__('El banner no pudo ser eliminado, intente más tarde.'));
        }
        return $this->redirect(array('action' => 'index'));
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

    public function isAuthorized($user) {
        // Admin can access every action
        if (isset($user['role'])) {
            return true;
        }
        // Default deny
        return parent::isAuthorized($user);
    }

}
