<?php
/**
 * Response Fixture
 */
class ResponseFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'jobcenter_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'no_interview' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'unsigned' => false),
		'question_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'response_value' => array('type' => 'tinyinteger', 'null' => false, 'default' => null, 'length' => 2, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'status_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'Response_unique' => array('column' => array('jobcenter_id', 'no_interview', 'question_id'), 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'jobcenter_id' => 1,
			'no_interview' => 1,
			'question_id' => 1,
			'response_value' => 1,
			'created' => '2019-10-06 16:13:45',
			'modified' => '2019-10-06 16:13:45',
			'status_id' => 1
		),
	);

}
