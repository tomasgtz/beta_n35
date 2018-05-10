<?php
/**
 * BranchesColor Fixture
 */
class BranchesColorFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'url_logo' => array('type' => 'string', 'null' => true, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'text1' => array('type' => 'string', 'null' => true, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'color1' => array('type' => 'string', 'null' => true, 'length' => 7, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'text2' => array('type' => 'string', 'null' => true, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'color2' => array('type' => 'string', 'null' => true, 'length' => 7, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'text3' => array('type' => 'string', 'null' => true, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'color3' => array('type' => 'string', 'null' => true, 'length' => 7, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'branch_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created_user_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false, 'key' => 'index'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified_user_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false, 'key' => 'index'),
		'status_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'branch_id-status_id' => array('column' => array('branch_id', 'status_id'), 'unique' => 1),
			'status_id' => array('column' => 'status_id', 'unique' => 0),
			'created_user_id' => array('column' => 'created_user_id', 'unique' => 0),
			'modified_user_id' => array('column' => 'modified_user_id', 'unique' => 0)
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
			'url_logo' => 'Lorem ipsum dolor sit amet',
			'text1' => 'Lorem ipsum dolor sit amet',
			'color1' => 'Lorem',
			'text2' => 'Lorem ipsum dolor sit amet',
			'color2' => 'Lorem',
			'text3' => 'Lorem ipsum dolor sit amet',
			'color3' => 'Lorem',
			'branch_id' => 1,
			'created' => '2018-05-10 18:57:42',
			'created_user_id' => 1,
			'modified' => '2018-05-10 18:57:42',
			'modified_user_id' => 1,
			'status_id' => 1
		),
	);

}
