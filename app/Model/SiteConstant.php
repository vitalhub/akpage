<?php
App::uses('AppModel', 'Model');
/**
 * Siteconstant Model
 *
 */
class SiteConstant extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'siteconstant';
	
	public $useTable = 'siteConstants';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'siteconstant' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'value' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
