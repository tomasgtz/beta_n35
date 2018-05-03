<?php
App::uses('AppModel', 'Model');
/**
 * OrdersDetailsService Model
 *
 * @property Service $Service
 * @property OrdersDetail $OrdersDetail
 * @property CreatedUser $CreatedUser
 * @property ModifiedUser $ModifiedUser
 * @property Status $Status
 */
class OrdersDetailsService extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'service_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'orders_detail_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'created_user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'modified_user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
		'Service' => array(
			'className' => 'Service',
			'foreignKey' => 'service_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'OrdersDetail' => array(
			'className' => 'OrdersDetail',
			'foreignKey' => 'orders_detail_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CreatedUser' => array(
			'className' => 'CreatedUser',
			'foreignKey' => 'created_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ModifiedUser' => array(
			'className' => 'ModifiedUser',
			'foreignKey' => 'modified_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Status' => array(
			'className' => 'Status',
			'foreignKey' => 'status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
