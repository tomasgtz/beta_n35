<?php
/**
 * QuotesDetail Fixture
 */
class QuotesDetailFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'part_number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'quantity' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'price' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'quote_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created_user_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false, 'key' => 'index'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified_user_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false, 'key' => 'index'),
		'status_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'status_id' => array('column' => 'status_id', 'unique' => 0),
			'created_user_id' => array('column' => 'created_user_id', 'unique' => 0),
			'modified_user_id' => array('column' => 'modified_user_id', 'unique' => 0),
			'quote_id' => array('column' => 'quote_id', 'unique' => 0)
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
			'part_number' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'quantity' => 1,
			'price' => '',
			'quote_id' => 1,
			'created' => '2018-05-01 13:27:02',
			'created_user_id' => 1,
			'modified' => '2018-05-01 13:27:02',
			'modified_user_id' => 1,
			'status_id' => 1
		),
	);

}
