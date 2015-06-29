<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
*/
class UsersController extends AppController {

	public $components = array('Paginator', 'Session','Captcha');


	public function beforeFilter(){
		parent::beforeFilter();
		//$this->Auth->allow('login', 'register','logout','captcha','initDB');
		//$this->Auth->allow('forgotPassword');
		//$this->Auth->allow('home', 'view', 'edit');

		$this->Auth->allow('initDB');
		
		/* echo "<pre>";
		print_r($this->currentUser);
		exit; */
		
		if (!$this->currentUser) {
			$this->Auth->allow('login', 'forgotPassword', 'register');
		}else {
			$this->Auth->allow('logout');
		}
		
		//$this->Auth->allow('login', 'logout', 'forgotPassword', 'home', 'register');
		$this->Auth->allow('home');

		$this->Auth->allow('termsAndConditions', 'aboutUs', 'privacyPolicy', 'disclaimer', 'advertizeWithUs');
		$this->Auth->allow('astrology', 'news', 'jobs', 'movies', 'wellness', 'familyTree', 'games', 'mobileApp', 'akblog');

	}

	public function initDB(){

		$group = $this->User->Group;


		$group->id = 1;
		$this->Acl->deny($group, 'controllers');

		$this->Acl->allow($group, 'controllers/Groups');

		$this->Acl->allow($group, 'controllers/Users/register');
		$this->Acl->allow($group, 'controllers/Users/changePassword');
		$this->Acl->allow($group, 'controllers/Users/index');
		$this->Acl->allow($group, 'controllers/Users/view');
		$this->Acl->allow($group, 'controllers/Users/delete');
		$this->Acl->allow($group, 'controllers/Users/reActivate');



		$group->id = 2;
		$this->Acl->allow($group, 'controllers');

		$this->Acl->deny($group, 'controllers/Groups');

		$this->Acl->deny($group, 'controllers/Users/index');
		$this->Acl->deny($group, 'controllers/Users/view');
		$this->Acl->deny($group, 'controllers/Users/delete');
		$this->Acl->deny($group, 'controllers/Users/reActivate');



		$group->id = 3;
		$this->Acl->deny($group, 'controllers');

		$this->Acl->allow($group, 'controllers/Users/changePassword');

		$this->Acl->allow($group, 'controllers/MatrimonyUsers/register');
		$this->Acl->allow($group, 'controllers/MatrimonyUsers/register0');
		$this->Acl->allow($group, 'controllers/MatrimonyUsers/register1');
		$this->Acl->allow($group, 'controllers/MatrimonyUsers/register2');
		$this->Acl->allow($group, 'controllers/MatrimonyUsers/register3');
		$this->Acl->allow($group, 'controllers/MatrimonyUsers/matchingProfiles');
		$this->Acl->allow($group, 'controllers/MatrimonyUsers/view');
		$this->Acl->allow($group, 'controllers/MatrimonyUsers/uploadPhotos');
		$this->Acl->allow($group, 'controllers/MatrimonyUsers/changeProfilePic');
		$this->Acl->allow($group, 'controllers/MatrimonyUsers/deletePhotos');
		$this->Acl->allow($group, 'controllers/MatrimonyUsers/requestHandler');
		$this->Acl->allow($group, 'controllers/MatrimonyUsers/changeAccessMode');
		$this->Acl->allow($group, 'controllers/MatrimonyUsers/edit');
		$this->Acl->allow($group, 'controllers/MatrimonyUsers/payment');
			


		$group->id = 4;
		$this->Acl->deny($group, 'controllers');

		$this->Acl->allow($group, 'controllers/Users/changePassword');

		$this->Acl->allow($group, 'controllers/MatrimonyUsers/register');
		$this->Acl->allow($group, 'controllers/MatrimonyUsers/register0');
		$this->Acl->allow($group, 'controllers/MatrimonyUsers/register1');
		$this->Acl->allow($group, 'controllers/MatrimonyUsers/register2');
		$this->Acl->allow($group, 'controllers/MatrimonyUsers/register3');
		$this->Acl->allow($group, 'controllers/MatrimonyUsers/matchingProfiles');
		$this->Acl->allow($group, 'controllers/MatrimonyUsers/view');
		$this->Acl->allow($group, 'controllers/MatrimonyUsers/uploadPhotos');
		$this->Acl->allow($group, 'controllers/MatrimonyUsers/changeProfilePic');
		$this->Acl->allow($group, 'controllers/MatrimonyUsers/deletePhotos');
		$this->Acl->allow($group, 'controllers/MatrimonyUsers/requestHandler');
		$this->Acl->allow($group, 'controllers/MatrimonyUsers/changeAccessMode');
		$this->Acl->allow($group, 'controllers/MatrimonyUsers/edit');
		
		
		
		$group->id = 5;
		$this->Acl->deny($group, 'controllers');
		
		$this->Acl->allow($group, 'controllers/Users/emailVerify');

		
		// we add an exit to avoid an ugly "missing views" error message
		echo "all done";
		exit;
		
	}


	public function register(){

		$groupId = '';
		if ($this->Session->read('Auth.User.id')) {
			$groupId = $this->Auth->user('group_id');
		}
		$this->set('groupId', $groupId);


		if($this->request->is('post')){

			foreach ($this->request->data['User'] as $key => $value) {
					
				$this->request->data['User'][$key] = strip_tags($this->request->data['User'][$key]);
				$this->request->data['User'][$key] = trim($this->request->data['User'][$key]);
					
				$this->request->data['User'][$key] = preg_replace("/[\r\n]+/", "\n", $this->request->data['User'][$key]);
				$this->request->data['User'][$key] = preg_replace("/\s+/", "", $this->request->data['User'][$key]);
					
			}

			if (!filter_var($this->request->data['User']['email'], FILTER_VALIDATE_EMAIL)) {
				$this->User->invalidate('email', __('Provide Valid Email Only'));
				return false;
			}

			/* if ( !preg_match('/^.{6,}$/i', $this->request->data['User']['password']) ) {
				$this->User->invalidate('password', '6 to 20 Characters only.');
			return  false;

			} */



			$flag = 0;
			if ($groupId == 1) {
				$flag = 1;
				$this->request->data['User']['group_id'] = 2;
			}elseif ($groupId == 2) {
				$flag = 2;
				$this->request->data['User']['group_id'] = 5;  // group_id = 5 for Partial Registered Users
			}elseif ($this->request->data['User']['termsConditions']){
				$flag = 3;
				$this->request->data['User']['group_id'] = 5;  // group_id = 5 for Partial Registered Users
			}

			if ($flag) { // i.e user accepted terms & conditions

				$verificationCode = "AKPG".time().$this->request->data['User']['password'];
					
				$userId = $this->User->find('first',array('conditions'=>array('email'=>$this->request->data['User']['email']),'fields'=>array('id')));
				if($userId){
					$this->Session->setFlash('Email already registered. please provide another email.');
				}else{

					$this->User->create();
					if($this->User->save($this->request->data)){
							
						if (in_array($flag, array(2,3))) {  // i.e email has to forwarded if user created by admin or directly user registers.

							$serverType = Configure::read('serverType');

							$mailSend = false;

							if ($serverType) { // i.e production server
									
								/* ****** cakephp email sending ************  */

								//$message = "Your Confirmation code is ".$verificationCode.", Please login in to Ak page again and complete your registration.";
									
								$Email = new CakeEmail();
									
								$Email->template('registration', 'akpageMail');
									
								$Email->viewVars(array('verificationCode' => $verificationCode));
								$Email->emailFormat('html');
									
								$Email->from(array('admin@akpage.com' => 'www.akpage.com'));
								$Email->to($this->request->data['User']['email']);
								//$Email->bcc('narsing.php@gmail.com');
									
								$Email->subject('Akpage Registration Confirmation');
									
								if($Email->send()){

									$mailSend = true;

									/* $this->Session->setFlash("Confirmation Mail send to your email. please verify");
									 $this->redirect(array('controller' => 'users', 'action' => 'login')); */
								}
								else{
									$mailSend = false;
									//$this->Session->setFlash('Error occured while sending email. Please try again.');
								}
									
							}else { // i.e local system
									
								$mailSend = true;
									
							}

							if ($mailSend) { // i.e email forwaded

								$this->User->saveField('verificationCode',$verificationCode);

								if ($flag != 2) { // i.e for user who register directly

									$this->Session->setFlash(__("Confirmation Mail Sent To Your Email. Please Check Your Inbox If Not Received Check Your Spam Also."), 'default', array('class' => 'success'));
									$this->redirect(array('controller' => 'users', 'action' => 'login'));

								}else {
									$this->Session->setFlash(__("Confirmation Mail Sent to User Email"), 'default', array('class' => 'success'));
									$this->redirect(array('controller' => 'matrimonyUsers', 'action' => 'index'));

								}

							}else { // i.e email not forwarded

								$this->Session->setFlash(__('Error occured while sending email. Please try again.'));
							}
						}elseif ($flag == 1){
							$this->Session->setFlash(__("Admin Created Successfully."), 'default', array('class' => 'success'));
							$this->redirect(array('controller' => 'users', 'action' => 'index'));
						}

					}else {
						$this->Session->setFlash("Problem occured in registration. please try again");
					}

				}

			}else {
				$this->Session->setFlash('Please accept Terms & Conditions of Akpage.');
			}

		}

	} // *************************** end of register() *********************************************************


	public function login() {
		if ($this->request->is('post')) {
			/* echo "<pre>";
			 print_r($this->Auth->user);
			exit; */
			//debug($this->Auth->login()); die();

			if ($this->Auth->login()) {

				if ($this->Auth->user('status') == 2) {  // deleted person

					$this->Session->destroy();
					$this->Session->setFlash("Yoar account de-activated. please contact us to activate your account.");

					//$this->redirect($this->referer());

				}else {

					if($this->Auth->user('group_id') == 1){
						$this->redirect(array('controller' => 'users', 'action'=>'index'));
					}elseif ($this->Auth->user('group_id') == 2){
						$this->redirect(array('controller' => 'matrimonyUsers', 'action'=>'index'));
					}else{

						if( $this->Auth->user('group_id') == 5 ){ // group_id = 5 for Partial Registered Users
							$this->redirect(array('action'=>'emailVerify'));
						}else{

							if($this->Auth->user('passwordChanged') == 0){
								$this->Session->setFlash('Please Change your password first.');
								$this->redirect(array('action'=>'changePassword'));
							}

							$this->redirect($this->referer());

						}
					}
				}

			} else {
				$this->Session->setFlash('Invalid username or password, try again');
			}
		}
	}

	public function logout() {
		//$id = $this->Auth->user('id');
		//$this->User->updateAll(array('User.online'=>0),array('User.id'=>$id));
		$this->Session->destroy();
		$this->redirect($this->Auth->logout());
	}

	public function emailVerify() {
		if ($this->request->is(array('post', 'put'))) {

			$this->request->data['User']['verificationCode'] = strip_tags($this->request->data['User']['verificationCode']);
			$this->request->data['User']['verificationCode'] = trim($this->request->data['User']['verificationCode']);
			$this->request->data['User']['verificationCode'] = preg_replace("/\s+/", "", $this->request->data['User']['verificationCode']);

			$userDetails = $this->request->data;

			if($userDetails['submit'] == 'Verify Code'){
				$this->User->id = $this->Session->read('Auth.User.id');
				$verificationCode = $this->User->field('verificationCode');
					
				if($userDetails['User']['verificationCode'] == $verificationCode){

					$this->User->saveField('group_id',3); // group_id = 3 for Registered User

					$this->Session->setFlash(__('Registration Completed Successfully.'), 'default', array('class' => 'success'));
					if (!$this->Auth->user('passwordChanged')) {
						return $this->redirect(array('action' => 'changePassword'));
					}

					return $this->redirect(array('action' => 'home'));
				}elseif (!$userDetails['User']['verificationCode']){
					$this->Session->setFlash('please enter the verification code');
					$this->User->invalidate( 'verificationCode', "Verification code can't be empty" );
				}else {
					$this->Session->setFlash('Invalid verification code, try again');
					$this->User->invalidate( 'verificationCode', "Incorrect verification code" );
				}
			}elseif ($userDetails['submit'] == 'Send Code Again'){
				$verificationCode = "AKPG".time();
				$receiverEmail = $this->Session->read('Auth.User.email');

				$serverType = Configure::read('serverType');
				$mailSend = false;
					
				if ($serverType) { // i.e production server

					$Email = new CakeEmail();

					$Email->template('verificationcode', 'akpageMail');

					$Email->viewVars(array('verificationCode' => $verificationCode));
					$Email->emailFormat('html');

					$Email->from(array('admin@akpage.com' => 'www.akpage.com'));
					$Email->to($receiverEmail);

					$Email->subject('Akpage Registration - New Verification Code');

					if($Email->send()){
						$mailSend = true;
					}else {
						$mailSend = false;
					}

				}else {
					$mailSend = true;
				}
					
				if ($mailSend) {
					$this->User->id = $this->Session->read('Auth.User.id');

					if ($this->User->saveField('verificationCode', $verificationCode)) {
						$this->Session->setFlash(__('Verification Code Sent Again To Your Email. Please Check It In Your Inbox Or Else In Spam'), 'default', array('class' => 'success'));
						$this->redirect(array('controller' => 'users', 'action' => 'emailVerify'));
					}else {
						$this->Session->setFlash('problem occured while saving verification code. please try again');
					}

				}else{
					$this->Session->setFlash('Error occured while sending email. Please try again.');
				}
					
			}
		}
			
	} // ********************** end of verifyEmail() **********************************


	public function changePassword( $id = null ){

		/* if (!in_array($this->Session->read('Auth.User.group_id'), array(1,2))) {
			$this->layout = 'matrimony';
		} */


		if($this->request->is('post')){

			foreach ($this->request->data['User'] as $key => $value) {
					
				$this->request->data['User'][$key] = strip_tags($this->request->data['User'][$key]);
				$this->request->data['User'][$key] = trim($this->request->data['User'][$key]);
					
				$this->request->data['User'][$key] = preg_replace("/[\r\n]+/", "\n", $this->request->data['User'][$key]);
				$this->request->data['User'][$key] = preg_replace("/\s+/", "", $this->request->data['User'][$key]);
					
			}


			$data = $this->request->data['User'];
			if (isset($data['password1'])) {
				$data['password1'] = AuthComponent::password($data['password1']);
			}
			//echo "<pre>";pr($data);exit;
			if($data['password'] == $data['password1'])
			{
				$this->User->id = $this->Session->read('Auth.User.id');
				$saveData = array('password' => $data['password'], 'passwordChanged' => 1);
				if($this->User->save($saveData)){
					$this->Session->setFlash(__('Password changed successfully'), 'default', array('class' => 'success'));
					$this->redirect($this->referer());
				}else{
					$this->Session->setFlash('problem occured while changing password. please try again.');
				}
			}else{
				$this->Session->setFlash('passwords mis-match. please enter same password in both fields.');
			}

		}

	} // *********** end of changePassword() ************************

	/*
	 public function changeEmail(){

	$this->set('currentUser',$this->Session->read('Auth.User.id'));
	if($this->request->is('post')){
	//$data = $this->request->data['User'];

	$userId = $this->User->find('first',array('conditions'=>array('email'=>$this->request->data['User']['email']),'fields'=>array('id')));
	if($userId){
	$this->Session->setFlash('Email already registered. please provide another email.');
	}else{
	$this->User->id = $this->Session->read('Auth.User.id');

	//$userId = $userId['User']['id'];

	if($this->User->save($this->request->data)){
	$this->Session->setFlash('Your Email changed successfully');
	$this->redirect($this->referer());
	}else{
	$this->Session->setFlash('problem occured while changing email. please try again.');
	}
	}
	}

	} // *********** end of changeEmail() ************************

	*/
	public function forgotPassword(){
			
		if($this->request->is('post')){

			$userDetails = $this->User->find('first',array('conditions'=>array('email'=>$this->request->data['User']['email']),'fields'=>array('id')));
			if ($userDetails) {
				$userId = $userDetails['User']['id'];
			}


			if(isset($userId)){

				$serverType = Configure::read('serverType');

				if ($serverType) { // i.e production server
					$password = 'AKPG'.time().$userId;
				}else {
					$password = 'abc123';
				}

				$this->request->data['User']['password'] = AuthComponent::password($password);
				$saveData = array('password' => $this->request->data['User']['password'], 'passwordChanged' => 0);  // saving multiple fields.
				$this->User->id = $userId;
				if($this->User->save($saveData)){

					$mailSent = false;

					if ($serverType) { // i.e production server

						/* ****** cakephp email sending ************  */

						$Email = new CakeEmail();

						$Email->template('forgotpassword', 'akpageMail');

						$Email->viewVars(array('password' => $password));
						$Email->emailFormat('html');

						$Email->from(array('admin@akpage.com' => 'www.akpage.com'));
						$Email->to($this->request->data['User']['email']);

						$Email->subject('Akpage Login Password');
						if($Email->send()){
							$mailSent = true;
						}else{
							$mailSent = false;
						}

					}else{
						$mailSent = true;
					}

					if($mailSent){
						$this->Session->setFlash(__('New Password Sent To Your Registered Mail Successfully. Please Check It In Your Inbox Or Else In Spam'), 'default', array('class' => 'success'));
						//pr($password);exit;
						$this->redirect(array('action' => 'login'));
					}else{
						$this->Session->setFlash('problem occured while sending password. please try again.');
					}

				}else{
					$this->Session->setFlash('problem occured while saving password. please try again.');
				}


			}else{
				$this->Session->setFlash('Incorrect Email. please enter your registered email only.');
			}
		}

	} // ************ end of forgotPassword() *********************************


	/*
	 public function captcha(){
	$this->autoRender = false;
	$this->layout='ajax';
	if(!isset($this->Captcha))	{ //if Component was not loaded throug $components array()
	$this->Captcha = $this->Components->load('Captcha', array(
			'width' => 150,
			'height' => 50,
			'theme' => 'random', //possible values : default, random ; No value means 'default'
	)); //load it
	}
	$this->Captcha->create();

	} // ***************** end of captcha() ****************************

	*/

	public function index() {

		$this->loadModel('SiteConstant');
		$pageLimit = $this->SiteConstant->field('value', array('SiteConstant.siteconstant' => 'PAGE_LIMIT'));

		$paginate1 = array('limit' => $pageLimit, 'conditions' => array('group_id'=>2, 'status'=>1));
		$paginate2 = array('limit' => $pageLimit, 'conditions' => array('group_id'=> array(3,4), 'status'=>1));
		if ($this->Auth->user('group_id') == 1) {
			$this->Paginator->settings = $paginate1;
		}else if ($this->Auth->user('group_id') == 2) {
			$this->Paginator->settings = $paginate2;
		}
		//$this->Paginator->settings = $this->paginate;
		//$this->User->recursive = 1;
		$this->set('users', $this->Paginator->paginate());

	} // ******************* end of index() *********************************

	public function view( $id=null ){

		$user = $this->User->find('first', array('conditions' => array('User.id' => $id), 'recursive' => 0));
		$this->set('user', $user);
	}


	/*

	public function edit($id = null){

	$this->set('id', $id);
	if (!$id) {
	$paginate1 = array('limit' => 2, 'conditions' => array('group_id'=>2, 'status'=>1));
	$paginate2 = array('limit' => 2, 'conditions' => array('group_id'=>3, 'status'=>1));
	if ($this->Auth->user('group_id') == 1) {
	$this->Paginator->settings = $paginate1;
	}else if ($this->Auth->user('group_id') == 2) {
	$this->Paginator->settings = $paginate2;
	}

	$this->User->recursive = 0;
	$this->set('users', $this->Paginator->paginate());

	}else {

	$this->User->id = $id;
	if (!in_array($this->Auth->user('group_id'), array(1,2)) ){
	if( $this->Session->read('Auth.User.id') != $id ) {
	$this->Session->setFlash("You are not allowed to edit the details.");
	}
	}else{
	if ($this->request->is(array('post','put'))) {
	if (!$this->request->data['User']['password']) {
	unset($this->request->data['User']['password']);
	}

	if ($this->User->save($this->request->data)) {
	$this->Session->setFlash("Details updated successfully");
	$this->redirect($this->referer());
	}else{
	$this->Session->setFlash("Problem occured while storing updated details. please try again.");
	}

	}else{
	$options = array('conditions' => array('User.' . $this->User->primaryKey => $id), 'fields'=> array('email'), 'recursive'=>0);
	$userDetails = $this->User->find('first',$options);
	$this->request->data = $userDetails;

	}

	}

	}

	} // ************ end of edit() *****************************************

	*/
	public function delete( $id = null ){

		if (!$id) {
			$paginate1 = array('limit' => 2, 'conditions' => array('group_id'=>2, 'status'=>1));
			$paginate2 = array('limit' => 2, 'conditions' => array('group_id'=>3, 'status'=>1));
			if ($this->Auth->user('group_id') == 1) {
				$this->Paginator->settings = $paginate1;
			}else if ($this->Auth->user('group_id') == 2) {
				$this->Paginator->settings = $paginate2;
			}

			$this->User->recursive = 0;
			$this->set('users', $this->Paginator->paginate());

		}else {

			$this->User->id = $id;
			if (!$this->User->exists()) {
				throw new NotFoundException(__('Invalid User'));
			}
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id),'recursive'=>-1);
			$userData = $this->User->find('first', $options);


			if (!in_array($this->Auth->user('group_id'), array(1,2)) ) {  // not an admin and super-admin.
				if ($this->Session->read('Auth.User.id') == $userData['User']['id']) { // self-delete not allowed.
					$this->Session->setFlash(__('You are not allowed to delete this particular person.'));
					$this->redirect($this->referer());
				}
			}

			//$this->request->allowMethod('post', 'delete');
			$this->User->id = $id;
			//if ($this->News->delete()) {
			if ($this->User->saveField('status', 2)){
				$this->Session->setFlash(__('The person has been deleted.'));
			} else {
				$this->Session->setFlash(__('The person could not be deleted. Please, try again.'));
			}
			return $this->redirect($this->referer());

		}

	} // ******************* end of delete() *******************************



	public function reActivate( $id = null){

		if (!$id) {
			$paginate1 = array('limit' => 2, 'conditions' => array('group_id'=>2, 'status'=>2));
			$paginate2 = array('limit' => 2, 'conditions' => array('group_id'=>3, 'status'=>2));
			if ($this->Auth->user('group_id') == 1) {
				$this->Paginator->settings = $paginate1;
			}else if ($this->Auth->user('group_id') == 2) {
				$this->Paginator->settings = $paginate2;
			}

			$this->User->recursive = 0;
			$this->set('users', $this->Paginator->paginate());

		}else {

			$this->User->id = $id;
			if (!$this->User->exists()) {
				throw new NotFoundException(__('Invalid User'));
			}
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id),'recursive'=>-1);
			$userData = $this->User->find('first', $options);


			if (in_array($this->Auth->user('group_id'), array(1,2)) ) {  // not an admin and super-admin.
				if ($this->Session->read('Auth.User.id') == $userData['User']['id']) {
					$this->Session->setFlash(__('You are not allowed to re-activate this particular person.'));
					$this->redirect($this->referer());
				}
			}

			//$this->request->allowMethod('post');
			$this->User->id = $id;
			//if ($this->News->delete()) {
			if ($this->User->saveField('status', 1)){
				$this->Session->setFlash(__('The person has been activated successfully.'));
			} else {
				$this->Session->setFlash(__('The person could not be activated. Please, try again.'));
			}
			return $this->redirect($this->referer());

		}


	}// ********* end of reActivate() *************************************


	public function changeMembership($id = null){

		if (!$id) {

			$this->loadModel('SiteConstant');
			$pageLimit = $this->SiteConstant->field('value', array('SiteConstant.siteconstant' => 'PAGE_LIMIT'));

			$paginate = array('limit' => $pageLimit, 'conditions' => array('group_id'=>array(3,4), 'status'=>1));
			$this->Paginator->settings = $paginate;

			$this->User->recursive = 0;
			$this->set('users', $this->Paginator->paginate());

		}else {

			$this->set('id', $id);

			$this->User->id = $id;
			if (!$this->User->exists()) {
				throw new NotFoundException(__('Invalid User'));
			}
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id),'recursive'=>-1);
			$userData = $this->User->find('first', $options);
			$this->set('groupId',$userData['User']['group_id']);

			if ($this->Auth->user('group_id') != 2 ) {  // not an admin.
				//if ($this->Session->read('Auth.User.id') == $userData['User']['id']) { // self-delete not allowed.
				$this->Session->setFlash(__('You are not allowed to change membership of this particular person.'));
				$this->redirect($this->referer());
				//}
			}else {
				if ($this->request->is(array('post','put'))) {

					$this->User->id = $id;
					if ($this->User->saveField('group_id', $this->request->data['User']['membership'])){
						$this->Session->setFlash(__('Membership changed successfully.'), 'default', array('class' => 'success'));
						$this->redirect(array('controller' => 'users', 'action' => 'changeMembership'));
					} else {
						$this->Session->setFlash(__('Membership couldn\'t be changed. Please, try again.'));
					}
					return $this->redirect($this->referer());
				}
			}

		}

	} // ********************************* end of changeMembership() ********************************************************


	public function home(){

		$this->layout = 'default';

		$latestNews = $this->User->News->find('all', array('conditions' => array('News.status' => 1), 'order' => 'News.created DESC', 'limit' => 5, 'recursive' => 0));
		/* echo "<pre>";
		 print_r($latestNews);
		exit; */
		$this->set('latestNews', $latestNews);
	}

	/* yogi code begin */


	public function termsAndConditions() {

	}

	public function aboutUs() {

	}

	public function privacyPolicy() {

	}

	public function advertizeWithUs() {

	}

	public function astrology() {

	}

	public function news() {

	}

	public function jobs() {

	}

	public function movies() {

	}

	public function wellness() {

	}

	public function familyTree() {

	}

	public function games() {

	}

	public function mobileApp() {

	}

	public function akblog() {

	}

	public function disclaimer() {

	}

	/* yogi code ended */



} // ************* end of UsersController ***********************************

?>
