<?php
/**
 * BlogPostCommentFixture
 *
 */
class BlogPostCommentFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'blogPostComments';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'blogPostComment' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'blogPost_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'commentedBy' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'commentedOn' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modifiedBy' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'modifiedOn' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'ACTIVE' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 2, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'blogPost_id' => array('column' => 'blogPost_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'blogPostComment' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'blogPost_id' => 1,
			'commentedBy' => 1,
			'commentedOn' => '2015-08-25 22:18:33',
			'modifiedBy' => 1,
			'modifiedOn' => '2015-08-25 22:18:33',
			'ACTIVE' => 1
		),
	);

}
