<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

/**
 * User Model
 *
 * @property Status $Status
 * @property Branch $Branch
 */
class User extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'username';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'username' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'password' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'role' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'status_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Status' => array(
            'className' => 'Status',
            'foreignKey' => 'status_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Branch' => array(
            'className' => 'Branch',
            'foreignKey' => 'user_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    public function beforeSave($options = array()) {
        /**
          if (isset($this->data[$this->alias]['password'])) {
          $passwordHasher = new BlowfishPasswordHasher();
          $this->data[$this->alias]['password'] = $passwordHasher->hash(
          $this->data[$this->alias]['password']
          );
          }
          return true;
         */
        if (isset($this->data[$this->alias]['password'])) {

            if (isset($this->data[$this->alias]['id'])) {
                $id = $this->data[$this->alias]['id'];
                $user = $this->findById($id);
            } else {
                $id = false;
            }

            if (!$id || $this->data[$this->alias]['password'] != $user['User']['password']) {
                $passwordHasher = new BlowfishPasswordHasher();
                $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
            }
        }

        return true;
    }

}
