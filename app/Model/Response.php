<?php
App::uses('AppModel', 'Model');
/**
 * Response Model
 *
 * @property Jobcenter $Jobcenter
 * @property Question $Question
 * @property Status $Status
 */
class Response extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Jobcenter' => array(
			'className' => 'Jobcenter',
			'foreignKey' => 'jobcenter_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Question' => array(
			'className' => 'Question',
			'foreignKey' => 'question_id',
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
