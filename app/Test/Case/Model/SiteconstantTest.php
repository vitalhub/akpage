<?php
App::uses('Siteconstant', 'Model');

/**
 * Siteconstant Test Case
 *
 */
class SiteconstantTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.siteconstant'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Siteconstant = ClassRegistry::init('Siteconstant');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Siteconstant);

		parent::tearDown();
	}

}
