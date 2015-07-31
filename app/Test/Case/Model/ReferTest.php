<?php
App::uses('Refer', 'Model');

/**
 * Refer Test Case
 *
 */
class ReferTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.refer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Refer = ClassRegistry::init('Refer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Refer);

		parent::tearDown();
	}

}
