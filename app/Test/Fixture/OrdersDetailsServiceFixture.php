<?php
/**
 * OrdersDetailsService Fixture
 */
class OrdersDetailsServiceFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'service_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'orders_detaill_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created_user_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false, 'key' => 'index'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified_user_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false, 'key' => 'index'),
		'status_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'created_user_id' => array('column' => 'created_user_id', 'unique' => 0),
			'modified_user_id' => array('column' => 'modified_user_id', 'unique' => 0),
			'status_id' => array('column' => 'status_id', 'unique' => 0),
			'orders_detaill_id' => array('column' => 'orders_detaill_id', 'unique' => 0),
			'service_id' => array('column' => 'service_id', 'unique' => 0)
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
			'service_id' => 1,
			'orders_detaill_id' => 1,
			'created' => '2018-05-01 15:05:53',
			'created_user_id' => 1,
			'modified' => '2018-05-01 15:05:53',
			'modified_user_id' => 1,
			'status_id' => 1
		),
	);

}
