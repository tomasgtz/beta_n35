<?php
App::uses('Company', 'Model');

/**
 * Company Test Case
 */
class CompanyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.company',
		'app.status',
		'app.created_user',
		'app.modified_user',
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
		'app.orders_detail',
		'app.orders_details_service',
		'app.branches_payment',
		'app.list',
		'app.lists_element',
		'app.message',
		'app.quotes_detail',
		'app.jobcenter',
		'app.report'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Company = ClassRegistry::init('Company');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Company);

		parent::tearDown();
	}

}
