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
            'allowedExtensions' => array('jpg', 'jpeg', 'gif', 'png')            
        )
    );

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->BranchesBanner->recursive = 0;
        $this->set('branchesBanners', $this->BranchesBanner->find('all'));
        $this->set('fileRoute', $this->File->routeToSave);
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

            // Sección para guardar archivos
            $this->File->identifier = 'BranchBanner' . date('YmdHis');

            $data = $this->request->data['BranchesBanner']['url_banner'];
            
            $this->request->data['BranchesBanner']['url_banner'] = ($this->File->save($data) == true) ? $this->File->name : 'no_image.png';
            
            $this->BranchesBanner->create();
            if ($this->BranchesBanner->save($this->request->data)) {
                $this->Flash->success(__('The branches banner has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The branches banner could not be saved. Please, try again.'));
            }
        }
        $branches = $this->BranchesBanner->Branch->find('list');
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
            throw new NotFoundException(__('Invalid branches banner'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->BranchesBanner->save($this->request->data)) {
                $this->Flash->success(__('The branches banner has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The branches banner could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('BranchesBanner.' . $this->BranchesBanner->primaryKey => $id));
            $this->request->data = $this->BranchesBanner->find('first', $options);
        }
        $branches = $this->BranchesBanner->Branch->find('list');
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
        if ($this->BranchesBanner->delete()) {
            $this->Flash->success(__('The branches banner has been deleted.'));
        } else {
            $this->Flash->error(__('The branches banner could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function beforeFilter() {

        $this->Auth->allow('index', 'add', 'edit', 'delete');
    }

}