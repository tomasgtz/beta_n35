<?php
App::uses('Report', 'Model');

/**
 * Report Test Case
 */
class ReportTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.report',
		'app.company',
		'app.status',
		'app.created_user',
		'app.modified_user',
		'app.jobcenter',
		'app.state',
		'app.list',
		'app.lists_element',
		'app.question',
		'app.response',
		'app.role',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Report = ClassRegistry::init('Report');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Report);

		parent::tearDown();
	}

}
