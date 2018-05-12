<?php
/**
 * Branch Fixture
 */
class BranchFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'due_date' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'phone' => array('type' => 'string', 'null' => false, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'access' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'manager' => array('type' => 'string', 'null' => false, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'shopping_mall' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'store_number' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 5, 'unsigned' => false),
		'rfc' => array('type' => 'string', 'null' => false, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'street' => array('type' => 'string', 'null' => false, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'suburb' => array('type' => 'string', 'null' => false, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'postcode' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'city' => array('type' => 'string', 'null' => false, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'state_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'country_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'shipping_street' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'shipping_suburb' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'shipping_postcode' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'shipping_city' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'shipping_state_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'shipping_country_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false, 'key' => 'unique'),
		'jewelrystore_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created_user_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false, 'key' => 'index'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified_user_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false, 'key' => 'index'),
		'status_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'user_id' => array('column' => 'user_id', 'unique' => 1),
			'state_id' => array('column' => 'state_id', 'unique' => 0),
			'status_id' => array('column' => 'status_id', 'unique' => 0),
			'created_user_id' => array('column' => 'created_user_id', 'unique' => 0),
			'modified_user_id' => array('column' => 'modified_user_id', 'unique' => 0),
			'country_id' => array('column' => 'country_id', 'unique' => 0),
			'branches_ibfk_6' => array('column' => 'shipping_state_id', 'unique' => 0),
			'branches_ibfk_7' => array('column' => 'shipping_country_id', 'unique' => 0)
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
			'due_date' => '2018-05-12 02:21:49',
			'phone' => 'Lorem ipsum dolor sit amet',
			'access' => 1,
			'manager' => 'Lorem ipsum dolor sit amet',
			'shopping_mall' => 'Lorem ipsum dolor sit amet',
			'store_number' => 1,
			'rfc' => 'Lorem ipsum dolor sit amet',
			'street' => 'Lorem ipsum dolor sit amet',
			'suburb' => 'Lorem ipsum dolor sit amet',
			'postcode' => 1,
			'city' => 'Lorem ipsum dolor sit amet',
			'state_id' => 1,
			'country_id' => 1,
			'shipping_street' => 'Lorem ipsum dolor sit amet',
			'shipping_suburb' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'shipping_postcode' => 1,
			'shipping_city' => 1,
			'shipping_state_id' => 1,
			'shipping_country_id' => 1,
			'user_id' => 1,
			'jewelrystore_id' => 1,
			'created' => '2018-05-12 02:21:49',
			'created_user_id' => 1,
			'modified' => '2018-05-12 02:21:49',
			'modified_user_id' => 1,
			'status_id' => 1
		),
	);

}
