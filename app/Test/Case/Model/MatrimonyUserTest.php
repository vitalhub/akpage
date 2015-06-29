<?php
App::uses('MatrimonyUser', 'Model');

/**
 * MatrimonyUser Test Case
 *
 */
class MatrimonyUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.matrimony_user',
		'app.user',
		'app.akpage_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MatrimonyUser = ClassRegistry::init('MatrimonyUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MatrimonyUser);

		parent::tearDown();
	}

}
