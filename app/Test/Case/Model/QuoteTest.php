<?php
App::uses('Quote', 'Model');

/**
 * Quote Test Case
 */
class QuoteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.quote',
		'app.branch',
		'app.created_user',
		'app.modified_user',
		'app.status',
		'app.order',
		'app.payments_type',
		'app.orders_phase'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Quote = ClassRegistry::init('Quote');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Quote);

		parent::tearDown();
	}

}
