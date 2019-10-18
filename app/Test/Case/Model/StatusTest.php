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
		'app.company',
		'app.jobcenter',
		'app.report',
		'app.list',
		'app.lists_element',
		'app.question',
		'app.response',
		'app.role',
		'app.state',
		'app.user',
		'app.branch'
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
