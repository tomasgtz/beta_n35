<?php
/**
 * Country Fixture
 */
class CountryFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'length' => 64, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'iso_code_2' => array('type' => 'string', 'null' => false, 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'iso_code_3' => array('type' => 'string', 'null' => false, 'length' => 3, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created_by_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false, 'key' => 'index'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified_by_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false, 'key' => 'index'),
		'status_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'created_by_id' => array('column' => 'created_by_id', 'unique' => 0),
			'modified_by_id' => array('column' => 'modified_by_id', 'unique' => 0),
			'status_id' => array('column' => 'status_id', 'unique' => 0)
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
			'name' => 'Lorem ipsum dolor sit amet',
			'iso_code_2' => '',
			'iso_code_3' => 'L',
			'created' => '2018-04-26 22:48:39',
			'created_by_id' => 1,
			'modified' => '2018-04-26 22:48:39',
			'modified_by_id' => 1,
			'status_id' => 1
		),
	);

}
