<?php
App::uses('Question', 'Model');

/**
 * Question Test Case
 */
class QuestionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.question',
		'app.status',
		'app.created_user',
		'app.modified_user',
		'app.company',
		'app.jobcenter',
		'app.state',
		'app.report',
		'app.list',
		'app.lists_element',
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
		$this->Question = ClassRegistry::init('Question');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Question);

		parent::tearDown();
	}

}
