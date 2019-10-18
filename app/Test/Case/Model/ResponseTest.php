<?php
App::uses('Response', 'Model');

/**
 * Response Test Case
 */
class ResponseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.response',
		'app.jobcenter',
		'app.company',
		'app.status',
		'app.created_user',
		'app.modified_user',
		'app.list',
		'app.lists_element',
		'app.question',
		'app.report',
		'app.role',
		'app.state',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Response = ClassRegistry::init('Response');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Response);

		parent::tearDown();
	}

}
