<?php
App::uses('BlogPost', 'Model');

/**
 * BlogPost Test Case
 *
 */
class BlogPostTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.blog_post',
		'app.user',
		'app.group',
		'app.akpage_user',
		'app.matrimony_user',
		'app.state',
		'app.city',
		'app.news'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BlogPost = ClassRegistry::init('BlogPost');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BlogPost);

		parent::tearDown();
	}

}
