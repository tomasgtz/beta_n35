<?php

App::uses('AppController', 'Controller');

/**
 * Quotes Controller
 *
 * @property Quote $Quote
 * @property PaginatorComponent $Paginator
 */
class QuotesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    // public $components = array('Paginator');
    public $components = array('RequestHandler');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Quote->recursive = 0;
        $this->set('quotes', $this->Quote->find("all"));
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
      if (!$this->Quote->exists($id)) {
      throw new NotFoundException(__('Invalid quote'));
      }
      $options = array('conditions' => array('Quote.' . $this->Quote->primaryKey => $id));
      $this->set('quote', $this->Quote->find('first', $options));
      }
     */

    /**
     * add method
     *
     * @return void
     */
    public function add() {

        $this->loadModel('Device');
        $this->Device->recursive = -1;

        $this->loadModel('Message');
        $this->Message->recursive = -1;

        if ($this->request->data['Quote']['device_name'] == null) {
            $this->request->data['Quote']['device_name'] = '';
        }

        if ($this->request->data['Quote']['customer_name'] == null) {
            $this->request->data['Quote']['customer_name'] = '';
        }

        if ($this->request->data['Quote']['customer_email'] == null) {
            $this->request->data['Quote']['customer_email'] = '';
        }

        if ($this->request->data['Quote']['customer_phone'] == null) {
            $this->request->data['Quote']['customer_phone'] = 'Sin teléfono';
        }

        if ($this->request->data['Quote']['comments'] == null) {
            $this->request->data['Quote']['comments'] = 'Sin comentarios';
        }

        $dataSource = $this->Quote->getDataSource();

        $dataSource->begin($this->Quote);

        if ($this->request->is('post') && !empty($this->request->data['Quote']['customer_name']) && !empty($this->request->data['Quote']['customer_email']) && !empty($this->request->data['Quote']['device_name'])) {

            $device = $this->Device->findByName($this->request->data['Quote']['device_name']);
            $this->request->data['Quote']['branch_id'] = $device['Device']['branch_id'];

            $this->Quote->create();
            if ($this->Quote->save($this->request->data)) {
                $this->loadModel('QuotesDetail');
                $this->QuotesDetail->recursive = -1;

                if ($this->request->data['QuotesDetail']['part_number'] == null) {
                    $this->request->data['QuotesDetail']['part_number'] = '';
                }

                if ($this->request->data['QuotesDetail']['description'] == null) {
                    $this->request->data['QuotesDetail']['description'] = 'Sin descripción';
                }

                if ($this->request->data['QuotesDetail']['quantity'] == null) {
                    $this->request->data['QuotesDetail']['quantity'] = 0;
                }

                if ($this->request->data['QuotesDetail']['price'] == null) {
                    $this->request->data['QuotesDetail']['price'] = '0';
                }

                $this->request->data['QuotesDetail']['quote_id'] = $this->Quote->getLastInsertId();

                if (!empty($this->request->data['QuotesDetail']['part_number']) && $this->request->data['QuotesDetail']['quantity'] > 0 && $this->request->data['QuotesDetail']['price'] > 0) {
                    $this->QuotesDetail->create();
                    if ($this->QuotesDetail->save($this->request->data)) {
                        $this->Message->id = 1;
                        $dataSource->commit($this->Quote);
                    } else {
                        $this->Message->id = 2;
                        $dataSource->rollback($this->Quote);
                    }
                } else {
                    $this->Message->id = 2;
                    $dataSource->rollback($this->Quote);
                }
            } else {
                $this->Message->id = 2;
            }
        } else {
            $this->Message->id = 2;
        }


        //debug($this->Quote->getDataSource()->showLog());

        $options = array(
            'response' => $this->Message->findById($this->Message->id),
            '_serialize' => array('response')
        );
        $this->set($options);
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    /**
      public function edit($id = null) {
      if (!$this->Quote->exists($id)) {
      throw new NotFoundException(__('Invalid quote'));
      }
      if ($this->request->is(array('post', 'put'))) {
      if ($this->Quote->save($this->request->data)) {
      $this->Flash->success(__('The quote has been saved.'));
      return $this->redirect(array('action' => 'index'));
      } else {
      $this->Flash->error(__('The quote could not be saved. Please, try again.'));
      }
      } else {
      $options = array('conditions' => array('Quote.' . $this->Quote->primaryKey => $id));
      $this->request->data = $this->Quote->find('first', $options);
      }
      $branches = $this->Quote->Branch->find('list');
      $createdUsers = $this->Quote->CreatedUser->find('list');
      $modifiedUsers = $this->Quote->ModifiedUser->find('list');
      $statuses = $this->Quote->Status->find('list');
      $this->set(compact('branches', 'createdUsers', 'modifiedUsers', 'statuses'));
      }
     */
    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */

    /**
      public function delete($id = null) {
      $this->Quote->id = $id;
      if (!$this->Quote->exists()) {
      throw new NotFoundException(__('Invalid quote'));
      }
      $this->request->allowMethod('post', 'delete');
      if ($this->Quote->delete()) {
      $this->Flash->success(__('The quote has been deleted.'));
      } else {
      $this->Flash->error(__('The quote could not be deleted. Please, try again.'));
      }
      return $this->redirect(array('action' => 'index'));
      }
     */
    public function isAuthorized($user) {
        // Admin can access every action
        if (isset($user['role'])) {
            return true;
        }
        // Default deny
        return parent::isAuthorized($user);
    }

}
