<?php
App::uses('QuotesDetail', 'Model');

/**
 * QuotesDetail Test Case
 */
class QuotesDetailTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.quotes_detail',
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
		'app.order',
		'app.payments_type',
		'app.orders_phase',
		'app.orders_detail',
		'app.orders_details_service',
		'app.service',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->QuotesDetail = ClassRegistry::init('QuotesDetail');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->QuotesDetail);

		parent::tearDown();
	}

}
