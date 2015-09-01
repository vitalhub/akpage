<?php
App::uses('AppModel', 'Model');
/**
 * BlogPostComment Model
 *
 * @property BlogPost $BlogPost
 * @property BlogPostComment $BlogPostCommentCreater
 * @property BlogPostComment $BlogPostCommentModifier
 */
class BlogPostComment extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'blogPostComments';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'blogPostComment';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'blogPostComment' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'blogPost_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'commentedBy' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'commentedOn' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ACTIVE' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'BlogPost' => array(
			'className' => 'BlogPost',
			'foreignKey' => 'blogPost_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'BlogPostCommentCreater' => array(
			'className' => 'User',
			'foreignKey' => 'commentedBy',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'BlogPostCommentModifier' => array(
			'className' => 'User',
			'foreignKey' => 'modifiedBy',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public function parentNode() {
		return  null;
	}
	
}
