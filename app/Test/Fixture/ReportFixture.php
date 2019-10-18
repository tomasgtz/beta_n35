<?php
/**
 * Report Fixture
 */
class ReportFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'company_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'jobcenter_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'law_code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'law_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'verifier_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'verification_date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'results_date_valid' => array('type' => 'date', 'null' => false, 'default' => null),
		'issued_place' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'issued_date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'SCTPS_number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'method' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'result_category' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'result_domain' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'result_dimension' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'status_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'company_id' => 1,
			'jobcenter_id' => 1,
			'law_code' => 'Lorem ipsum dolor ',
			'law_name' => 'Lorem ipsum dolor sit amet',
			'verifier_name' => 'Lorem ipsum dolor sit amet',
			'verification_date' => '2019-10-10 03:45:27',
			'results_date_valid' => '2019-10-10',
			'issued_place' => 'Lorem ipsum dolor sit amet',
			'issued_date' => '2019-10-10 03:45:27',
			'SCTPS_number' => 'Lorem ipsum dolor sit amet',
			'method' => 'Lorem ipsum dolor sit amet',
			'result_category' => 1,
			'result_domain' => 1,
			'result_dimension' => 1,
			'created' => '2019-10-10 03:45:27',
			'modified' => '2019-10-10 03:45:27',
			'status_id' => 1
		),
	);

}
