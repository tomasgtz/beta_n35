<?php
/**
 * Order Fixture
 */
class OrderFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'customer_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'customer_email' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'customer_phone' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'comments' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'payment_url' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'received_by' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'estimated_delivery_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'quote_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'branch_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'payments_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'orders_phase_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6, 'unsigned' => false, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created_user_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false, 'key' => 'index'),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified_user_id' => array('type' => 'integer', 'null' => true, 'default' => '1', 'unsigned' => false, 'key' => 'index'),
		'status_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'status_id' => array('column' => 'status_id', 'unique' => 0),
			'created_user_id' => array('column' => 'created_user_id', 'unique' => 0),
			'modified_user_id' => array('column' => 'modified_user_id', 'unique' => 0),
			'quote_id' => array('column' => 'quote_id', 'unique' => 0),
			'branch_id' => array('column' => 'branch_id', 'unique' => 0),
			'id' => array('column' => 'id', 'unique' => 0),
			'orders_ibfk_7' => array('column' => 'orders_phase_id', 'unique' => 0),
			'orders_ibfk_6' => array('column' => 'payments_type_id', 'unique' => 0)
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
			'customer_name' => 'Lorem ipsum dolor sit amet',
			'customer_email' => 'Lorem ipsum dolor sit amet',
			'customer_phone' => 'Lorem ipsum dolor sit amet',
			'comments' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'payment_url' => 'Lorem ipsum dolor sit amet',
			'received_by' => 'Lorem ipsum dolor sit amet',
			'estimated_delivery_date' => '2018-04-26',
			'quote_id' => 1,
			'branch_id' => 1,
			'payments_type_id' => 1,
			'orders_phase_id' => 1,
			'created' => '2018-04-26 23:15:19',
			'created_user_id' => 1,
			'modified' => '2018-04-26 23:15:19',
			'modified_user_id' => 1,
			'status_id' => 1
		),
	);

}
