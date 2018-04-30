<?php
App::uses('JewelryStore', 'Model');

/**
 * JewelryStore Test Case
 */
class JewelryStoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.jewelry_store',
		'app.state',
		'app.country',
		'app.created_user',
		'app.modified_user',
		'app.status',
		'app.branch'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->JewelryStore = ClassRegistry::init('JewelryStore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->JewelryStore);

		parent::tearDown();
	}

}
