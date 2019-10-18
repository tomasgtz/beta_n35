<?php
App::uses('Jobcenter', 'Model');

/**
 * Jobcenter Test Case
 */
class JobcenterTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.jobcenter',
		'app.company',
		'app.status',
		'app.created_user',
		'app.modified_user',
		'app.list',
		'app.lists_element',
		'app.question',
		'app.report',
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
		$this->Jobcenter = ClassRegistry::init('Jobcenter');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Jobcenter);

		parent::tearDown();
	}

}
