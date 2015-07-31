<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');



/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
*/
class AppController extends Controller {

	public $components = array(
			'Acl',
			'Auth' => array(
					'authorize' => array('Actions' => array('actionPath' => 'controllers')),
	    'loginRedirect' => array('controller' => '../users', 'action' => 'home'),
	    'logoutRedirect' => array('controller' => 'users', 'action' => 'home'),
	    'userModel' => 'User',
	    'authError' => "Sorry..!. You Are Not Allowed to Access That Page",
		'authenticate' => array(
							'Form' => array(
									'userModel' => 'User',
									'fields' => array(
											'username' => 'email',
											'password'=>'password')
							)
					)
			),
			'Session',
			'RequestHandler'
	);

	public $helpers = array('Html', 'Form', 'Session','Js');

	public function isAuthorized($user) {
		// Admin can access every action
		if (isset($user['group_id']) && $user['group_id'] == 2) {
			return true;
		}

		 
		//$this->set('currentUser',$this->Session->read('Auth.User.id'));

		// Default deny
		return false;
	}

	public function beforeFilter() {

		if (isset($this->request->data['User']['password']) && !empty($this->request->data['User']['password'])) {

			$this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);

		}

		/* if (isset($this->request->data['User']['password'])) {

		$this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);

		} */

		$this->currentUser = "";

		if ($this->Session->read('Auth.User.id')) {

			$this->currentUser = $this->Session->read('Auth.User');
		}
		
		if (isset($this->currentUser['group_id'])) {
			if (in_array($this->currentUser['group_id'], array(1,2))) {
				$this->layout = 'defaultAdmins';
			}
		}

		$this->set('currentUser', $this->currentUser);
		
			


		return true;
		
		

	}


	 
} //    ************** end of App Controller ***********************************************
