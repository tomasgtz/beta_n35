<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Flash');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->loadModel('Status');
        $this->Status->recursive = -1;
        $users = $this->User->find('all');
        foreach ($users as $key => $user) {
            $branch = $user['Branch'];
            if(count($branch)>0){
                $users[$key]['Branch'][0]['Status'] = $this->Status->findById($branch[0]['status_id'])['Status'];
            }
        }
        $this->set('users', $users);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        /**
          if (!$this->User->exists($id)) {
          throw new NotFoundException(__('Invalid user'));
          }
          $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
          $this->set('user', $this->User->find('first', $options));
         */
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $statuses = $this->User->Status->find('list');
        $this->set(compact('statuses'));        
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        /**
          $this->User->id = $id;
          if (!$this->User->exists()) {
          throw new NotFoundException(__('Invalid user'));
          }
          $this->request->allowMethod('post', 'delete');
          if ($this->User->delete()) {
          $this->Flash->success(__('The user has been deleted.'));
          } else {
          $this->Flash->error(__('The user could not be deleted. Please, try again.'));
          }
          return $this->redirect(array('action' => 'index'));
         */
    }

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('logout');
    }

    public function login() {
        $this->layout = 'blank';
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                // debug($this->Auth->redirectUrl());
                $user = $this->Auth->User();
                if($user['role'] == 'admin'){
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->loadModel('Branch');
                    $branchStatusId = $this->Branch->findByUserId($user['id'])['Branch']['status_id'];
                    if($branchStatusId == 1){
                        return $this->redirect($this->Auth->redirectUrl());
                    } else {
                        $mensaje = 'Sucursal inactiva, intente más tarde';
                    }
                }
            } else {
                $mensaje = 'Usuario o contraseña inválida, intentar otra vez';    
            }
            $this->Flash->error($mensaje);
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function isAuthorized($user) {   
        // debug($this->request);
        // die;
        return parent::isAuthorized($user);
    }

}
