<?php
App::uses('BlogPostComment', 'Model');

/**
 * BlogPostComment Test Case
 *
 */
class BlogPostCommentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.blog_post_comment',
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
		$this->BlogPostComment = ClassRegistry::init('BlogPostComment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BlogPostComment);

		parent::tearDown();
	}

}
