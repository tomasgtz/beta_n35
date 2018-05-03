<?php
App::uses('OrdersDetailsService', 'Model');

/**
 * OrdersDetailsService Test Case
 */
class OrdersDetailsServiceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.orders_details_service',
		'app.service',
		'app.orders_detaill',
		'app.created_user',
		'app.modified_user',
		'app.status',
		'app.branch',
		'app.state',
		'app.country',
		'app.jewelry_store',
		'app.user',
		'app.device',
		'app.order',
		'app.quote',
		'app.quotes_details',
		'app.payments_type',
		'app.orders_phase',
		'app.orders_details',
		'app.branches_payment',
		'app.list',
		'app.lists_element',
		'app.message',
		'app.orders_detail',
		'app.quotes_detail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->OrdersDetailsService = ClassRegistry::init('OrdersDetailsService');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrdersDetailsService);

		parent::tearDown();
	}

}
