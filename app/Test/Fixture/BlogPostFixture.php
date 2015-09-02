<?php
/**
 * BlogPostFixture
 *
 */
class BlogPostFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'blogPosts';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'content' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'createdOn' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'createdBy' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'modifiedOn' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modifiedBy' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'ACTIVE' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 2, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'title' => 'Lorem ipsum dolor sit amet',
			'content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'createdOn' => '2015-08-20 19:56:49',
			'createdBy' => 1,
			'modifiedOn' => '2015-08-20 19:56:49',
			'modifiedBy' => 1,
			'ACTIVE' => 1
		),
	);

}
