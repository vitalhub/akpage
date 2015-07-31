<?php
App::uses('AppModel', 'Model');
/**
 * Refer Model
 *
 */
class Refer extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'referredEmail';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'referrerEmail' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Valid Email Only',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'referredEmail' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Valid Email Only',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
