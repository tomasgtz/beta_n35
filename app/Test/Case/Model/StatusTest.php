<?php
App::uses('Status', 'Model');

/**
 * Status Test Case
 */
class StatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.status',
		'app.created_user',
		'app.modified_user',
		'app.branch',
		'app.branches_payment',
		'app.country',
		'app.jewelry_store',
		'app.state',
		'app.device',
		'app.list',
		'app.lists_element',
		'app.message',
		'app.order',
		'app.quote',
		'app.payments_type',
		'app.orders_phase',
		'app.orders_detail',
		'app.orders_details_service',
		'app.quotes_detail',
		'app.service'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Status = ClassRegistry::init('Status');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Status);

		parent::tearDown();
	}

}
