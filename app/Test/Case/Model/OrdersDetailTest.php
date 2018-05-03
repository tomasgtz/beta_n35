<?php
App::uses('OrdersDetail', 'Model');

/**
 * OrdersDetail Test Case
 */
class OrdersDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.orders_detail',
		'app.order',
		'app.quote',
		'app.branch',
		'app.state',
		'app.country',
		'app.created_user',
		'app.modified_user',
		'app.status',
		'app.branches_payment',
		'app.device',
		'app.jewelry_store',
		'app.list',
		'app.lists_element',
		'app.message',
		'app.orders_details_service',
		'app.orders_phase',
		'app.payments_type',
		'app.quotes_detail',
		'app.service',
		'app.user',
		'app.quotes_details'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OrdersDetail = ClassRegistry::init('OrdersDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrdersDetail);

		parent::tearDown();
	}

}
