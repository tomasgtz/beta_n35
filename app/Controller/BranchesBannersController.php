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

        $this->loadModel('jewelryStores');
        $this->jewelryStores->recursive = 0;


        $user = $this->Auth->user();
        if (isset($user['role']) && $user['role'] == 'admin') {
            $this->set('branchesBanners', $this->BranchesBanner->find('all'));
        } else {
            $this->loadModel('Branch');
            $this->Branch->recursive = -1;
            $branch = $this->Branch->find('first', array('fields' => array('id'), 'conditions' => array('user_id' => $user['id'])));
            $this->set('branchesBanners', $this->BranchesBanner->find('all', array('conditions' => array('AND' => array('branch_id' => $branch['Branch']['id'], 'BranchesBanner.status_id' =>'1')))));

        }
        $this->set('fileRoute', 'app/webroot/files/banners/');
        
        $jewelryStores = $this->jewelryStores->find('list');
        $this->set(compact('jewelryStores'));
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
        if (!$this->BranchesBanner->exists($id)) {
            throw new NotFoundException(__('Invalid branches banner'));
        }
        $options = array('conditions' => array('BranchesBanner.' . $this->BranchesBanner->primaryKey => $id));
        $this->set('branchesBanner', $this->BranchesBanner->find('first', $options));
    }
    */

    /**
     * add method
     *
     * @return void
     */
    public function add() {

        $this->File->routeToSave = APP . 'webroot' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'banners' . DIRECTORY_SEPARATOR;

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

        $this->File->routeToSave = APP . 'webroot' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'banners' . DIRECTORY_SEPARATOR;

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

        $this->File->routeToSave = APP . 'webroot' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'banners' . DIRECTORY_SEPARATOR;

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

        // Anyone logged in can access the index
        if (isset($user['role']) && $this->action == 'index') {
            return true;
        }
        
        // The owner of a whatever can view, edit and delete it
        $userAssignedId = $this->{$this->modelClass}->findById($this->request->params['pass'][0])['Branch']['user_id'];

        if( $user['id'] == $userAssignedId ){
            return true;
        }

        // Default deny
        return parent::isAuthorized($user);        
    }

}
