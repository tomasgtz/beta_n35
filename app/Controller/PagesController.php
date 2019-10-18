<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class PagesController extends AppController {

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
        
    }

	public function display() {

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
          if (!$this->User->exists($id)) {
          throw new NotFoundException(__('Usuario no encontrado'));
          }
          $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
          $this->set('user', $this->User->find('first', $options));
    }
    */


    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        //$this->Auth->allow('logout', 'forgotPassword', 'reset_password_token');
    }

    

    public function isAuthorized($user) {
        // debug($this->request);
        // die;
        return true;
    }

}
