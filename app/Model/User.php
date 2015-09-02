<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
/**
 * User Model
 *
 * @property AkpageUser $AkpageUser
 * @property MatrimonyUser $MatrimonyUser
 * @property Group $Group
 * @property News $News
*/
class User extends AppModel {

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'email';
	var $captcha = ''; //intializing captcha var

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
			'email' => array(
					'email' => array(
							'rule' => array('email'),
							'message' => 'Enter a Valid Email',
							//'allowEmpty' => false,
							//'required' => false,
							//'last' => false, // Stop validation after this rule
							//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
			),
			'password' => array(
					'notEmpty' => array(
							'rule' => array('notEmpty'),
							//'message' => 'Your custom message here',
							//'allowEmpty' => false,
							//'required' => false,
							//'last' => false, // Stop validation after this rule
							//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
					/*  'minLength' => array(
							'rule' => array('minLength', 6),
							'message' => 'Your password must be minimum 6 characters in length'
					) */
			),
			'passwordChanged' => array(
					'numeric' => array(
							'rule' => array('numeric'),
							//'message' => 'Your custom message here',
							//'allowEmpty' => false,
							//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
			),
			'group_id' => array(
				'numeric' => array(
					'rule' => array('numeric'),
					//'message' => 'Your custom message here',
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
			),
			'status' => array(
					'numeric' => array(
							'rule' => array('numeric'),
							//'message' => 'Your custom message here',
							//'allowEmpty' => false,
							//'required' => false,
							//'last' => false, // Stop validation after this rule
							//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
			),
			'captcha'=>array(
			'rule' => array('matchCaptcha'),
			'message'=>'Incorrect Captcha. Please enter captcha code correctly.'
					)

	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * hasOne associations
	 *
	 * @var array
	*/
	public $hasOne = array(
			'AkpageUser' => array(
					'className' => 'AkpageUser',
					'foreignKey' => 'user_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			),
			/*'MatrimonyUser' => array(
			 'className' => 'MatrimonyUser',
					'foreignKey' => 'user_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			)*/
	);

	/**
	 * belongsTo associations
	 *
	 * @var array
	*/
	public $belongsTo = array(
			'Group' => array(
					'className' => 'Group',
					'foreignKey' => 'group_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			)
	);

	/**
	 * hasMany associations
	 *
	 * @var array
	*/
	public $hasMany = array(
			'News' => array(
					'className' => 'News',
					'foreignKey' => 'user_id',
					'dependent' => false,
					'conditions' => '',
					'fields' => '',
					'order' => '',
					'limit' => '',
					'offset' => '',
					'exclusive' => '',
					'finderQuery' => '',
					'counterQuery' => ''
			),
			'BlogPostCreater' => array(
					'className' => 'BlogPost',
					'foreignKey' => 'createdBy',
					'dependent' => false,
					'conditions' => '',
					'fields' => '',
					'order' => '',
					'limit' => '',
					'offset' => '',
					'exclusive' => '',
					'finderQuery' => '',
					'counterQuery' => ''
			),
			'BlogPostModifier' => array(
					'className' => 'BlogPost',
					'foreignKey' => 'modifiedBy',
					'dependent' => false,
					'conditions' => '',
					'fields' => '',
					'order' => '',
					'limit' => '',
					'offset' => '',
					'exclusive' => '',
					'finderQuery' => '',
					'counterQuery' => ''
			),
			'BlogPostCommentCreater' => array(
					'className' => 'BlogPostComment',
					'foreignKey' => 'commentedBy',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			),
			'BlogPostCommentModifier' => array(
					'className' => 'BlogPostComment',
					'foreignKey' => 'modifiedBy',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			)
	);

	public function beforeSave($options = array()) {
		//parent::beforeSave($options);
	 	if (isset($this->data[$this->alias]['password']) && !empty($this->data[$this->alias]['password'])) {
			$passwordHasher = new SimplePasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
		} 
		/* if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new SimplePasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
		} */
		return true;
	}

	function matchCaptcha($inputValue)	{
		return $inputValue['captcha']==$this->getCaptcha(); //return true or false after comparing submitted value with set value of captcha
	}

	function setCaptcha($value)	{
		$this->captcha = $value; //setting captcha value
	}

	function getCaptcha()	{
		return $this->captcha; //getting captcha value
	}


	public $actsAs = array('Acl' => array('type' => 'requester', 'enabled' => false));

	public function parentNode() {
		if (!$this->id && empty($this->data)) {
			return null;
		}
		if (isset($this->data['User']['group_id'])) {
			$groupId = $this->data['User']['group_id'];
		} else {
			$groupId = $this->field('group_id');
		}
		if (!$groupId) {
			return null;
		} else {
			return array('Group' => array('id' => $groupId));
		}
	}


	public function bindNode($user) {
		return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
	}




} // *************** end of User Model  ***************************************************************************************


