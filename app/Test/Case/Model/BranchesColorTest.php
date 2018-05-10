<?php
App::uses('BranchesColor', 'Model');

/**
 * BranchesColor Test Case
 */
class BranchesColorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.branches_color',
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
		'app.quote',
		'app.quotes_details',
		'app.payments_type',
		'app.orders_phase',
		'app.orders_detail',
		'app.orders_details_service',
		'app.quotes_detail',
		'app.user',
		'app.jewelry_store'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BranchesColor = ClassRegistry::init('BranchesColor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BranchesColor);

		parent::tearDown();
	}

}
