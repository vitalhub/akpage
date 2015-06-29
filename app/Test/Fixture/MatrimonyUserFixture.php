<?php
/**
 * MatrimonyUserFixture
 *
 */
class MatrimonyUserFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'matrimonyUsers';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'profilePic' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'profileFor' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'gothra' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'city' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'state' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'address' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'qualification' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'height' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'weight' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'smoking' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'drinking' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'maritalStatus' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'unsigned' => false),
		'aboutMe' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'familyDetails' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20000, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'professionalDetails' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10000, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'educationalDetails' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 8000, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'partnerDetails' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 8000, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'recentVisitors' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 5000, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'recentlyVisited' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 5000, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'accessMode' => array('type' => 'boolean', 'null' => false, 'default' => null), 
		'registrationLevel' => array('type' => 'boolean', 'null' => false, 'default' => null),
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
			'user_id' => 1,
			'profilePic' => 'Lorem ipsum dolor sit amet',
			'profileFor' => 'Lorem ipsum dolor ',
			'gothra' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'state' => 'Lorem ipsum dolor sit amet',
			'address' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'qualification' => 'Lorem ipsum dolor sit amet',
			'height' => 1,
			'weight' => 1,
			'smoking' => 1,
			'drinking' => 1,
			'maritalStatus' => 1,
			'aboutMe' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'familyDetails' => 'Lorem ipsum dolor sit amet',
			'professionalDetails' => 'Lorem ipsum dolor sit amet',
			'educationalDetails' => 'Lorem ipsum dolor sit amet',
			'partnerDetails' => 'Lorem ipsum dolor sit amet',
			'recentVisitors' => 'Lorem ipsum dolor sit amet',
			'recentlyVisited' => 'Lorem ipsum dolor sit amet',
			'accessMode' => 1,
			'registrationLevel' => 1
		),
	);

}
