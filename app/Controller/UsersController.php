<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

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
    public $components = array('ForgotPassword', 'Flash');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->loadModel('Status');
        $this->Status->recursive = -1;
        $users = $this->User->find('all');
        
        $this->set('users', $users);
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

    /**
     * add method
     *
     * @return void
     */
    public function add() {

        $this->LoadModel('Roles');
        $roles = $this->Roles->find('list', array('fields'=> array('name', 'name')));
      

        if ($this->request->is('post')) {
            $this->User->create();
            
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('La información ha sido guardada correctamente.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('La información del usuario no pudo guardarse. Intente nuevamente.'));
            }
        }
		$companies[0] = 'Sin empresa';
		$this->LoadModel('Companies');
		$companies2 = $this->Companies->find('list', array('fields'=> array('id', 'name')));

		$companies = array_merge( $companies, $companies2);
		$this->set(compact('companies'));

        $this->set(compact('roles'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->User->recursive = -1;

        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Usuario no encontrado'));
        }
        
        if ($this->request->is(array('post', 'put'))) {
            $user = $this->User->findById($id);
            // Las contraseñas no cambiaron
            if ($user['User']['password'] !== $this->request->data['User']['password']) {
                $validatePassword = $this->ForgotPassword->validateStrengthPassword($this->request->data['User']['password'], $this->request->data['User']['password']);
                if ($validatePassword !== true) {
                    $this->Flash->success($this->ForgotPassword->errorMessages);
                    return $this->redirect(array('action' => 'edit', $id));
                }
            }
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('La información ha sido guardada correctamente.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('La información del usuario no pudo guardarse. Intente nuevamente.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }

        $this->LoadModel('Roles');
        $roles = $this->Roles->find('list', array('fields'=> array('name', 'name')));
      
        $statuses = $this->User->Status->find('list', array('fields'=> array('id', 'text')));

		$companies[0] = 'Sin empresa';
		$this->LoadModel('Companies');
		$companies2 = $this->Companies->find('list', array('fields'=> array('id', 'name')));

		$companies = array_merge( $companies, $companies2);
		$this->set(compact('companies'));

        $this->set(compact('statuses'));
        $this->set(compact('roles'));
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
          throw new NotFoundException(__('Usuario no encontrado'));
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
        $this->Auth->allow('logout', 'forgotPassword', 'reset_password_token');
    }

    public function login() {
        $this->layout = 'blank';
        
        if ($this->request->is('post')) {
            
            if ($this->Auth->login()) {
                // debug($this->Auth->redirectUrl());
                $user = $this->Auth->User();
                if ($user['role'] == 'admin') {
                    return $this->redirect(array('controller' => 'Companies', 'action' => 'index'));
                } else {
                   return $this->redirect(array('controller' => 'Companies', 'action' => 'index'));
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

    public function forgotPassword() {
        $this->layout = 'blank';
        if ($this->request->is('post') && !empty($this->request->data)) {
            $this->User->recursive = 0;
            $user = $this->User->findByUsername($this->request->data['User']['username']);
            if (empty($user)) {
                $this->Flash->error(__('La cuenta de correo no existe'));
                $this->redirect(array('action' => 'forgotPassword'));
            }
            $user['User']['reset_password_token'] = $this->ForgotPassword->generatePasswordToken();
            $user['User']['token_created_at'] = date('Y-m-d H:i:s');
            if ($this->User->save($user) && $this->_sendForgotPasswordEmail($user['User']['id'])) {
                $this->Flash->success('Las instrucciones para restablecer tu contraseña fueron enviadas a tu correo electrónico. Tienes 24 horas para completar tu solicitud');
                $this->redirect(array('action' => 'login'));
            }
        }
    }

    /**
     * Sends password reset email to user's email address.
     * @param $id
     * @return
     */
    private function _sendForgotPasswordEmail($userId = null) {
        if (!empty($userId)) {
            $this->User->id = $userId;
            $this->User->recursive = 0;
            $User = $this->User->read();

            // Tomar configuracion de email infosdindustrialcommx
            $mailer = new CakeEmail('emailcadcam');
            $mailer->from(array('mail@mail.com.mx' => 'N035'));
            $mailer->to($User['User']['username']);
            $mailer->subject('Restablecimiento de contraseña de la cuenta de N035');
            $mailer->emailFormat('html');
            $mailer->template('reset_password_request', 'default');
            $mailer->viewVars(compact('User'));
            $mailer->send();
            return true;
        }
        return false;
    }

    /**
     * Sends password reset email to user's email address.
     * @param $id
     * @return
     */
    private function _sendPasswordChangedEmail($userId = null) {
        if (!empty($userId)) {
            $this->User->id = $userId;
            $this->User->recursive = 0;
            $User = $this->User->read();

            $mailer = new CakeEmail('emailcadcam');
            $mailer->from(array('no-reply@cadcam-mty.mx' => 'N035'));
            $mailer->to($User['User']['username']);
            $mailer->subject('La contraseña del portal N035 ha sido cambiada');
            $mailer->emailFormat('html');
            $mailer->template('password_reset_success', 'default');
            $mailer->viewVars(compact('User'));
            $mailer->send();
            return true;
        }
        return false;
    }

    /**
     * Allow user to reset password if $token is valid.
     * @return
     */
    public function reset_password_token($resetPasswordToken = null) {
        $this->layout = 'blank';
        $this->User->recursive = -1;
        if (empty($this->data)) {
            $data = $this->User->findByResetPasswordToken($resetPasswordToken);
            $this->data = $this->User->findByResetPasswordToken($resetPasswordToken);
            if ($this->ForgotPassword->validToken($data['User']['token_created_at'])) {
                $this->Session->write('resetPasswordToken', $resetPasswordToken);
            } else {
                $this->Flash->error('La solicitud para restablecer tu contraseña es inválida o ha expirado');
                $this->redirect(array('action' => 'login'));
            }
        } else {
            if ($this->data['User']['reset_password_token'] !== $this->Session->read('resetPasswordToken')) {
                $this->Flash->error('La solicitud para restablecer tu contraseña es inválida o ha expirado');
                $this->redirect(array('action' => 'login'));
            }
            $validatePassword = $this->ForgotPassword->validateStrengthPassword($this->data['User']['new_password'], $this->data['User']['confirm_password']);
            if ($validatePassword === true) {
                $user = $this->User->findByResetPasswordToken($this->data['User']['reset_password_token']);
                $user['User']['password'] = $this->data['User']['new_password'];
                if ($this->User->save($user) && $this->_sendPasswordChangedEmail($user['User']['id'])) {
                    $this->Flash->success('La contraseña ha si cambiado exitosamente');
                    $this->redirect(array('action' => 'login'));
                }
            }
            $this->Flash->success($this->ForgotPassword->errorMessages);
        }
    }

}
