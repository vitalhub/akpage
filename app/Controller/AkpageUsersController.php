<?php
App::uses('AppController', 'Controller');
/**
 * AkpageUsers Controller
 *
 * @property AkpageUser $AkpageUser
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AkpageUsersController extends AppController {

	
/* 	
 	public $components = array('Paginator', 'Session');
	
	public function beforeFilter(){
		parent::beforeFilter();
		//$this->Auth->allow('register');
		//$this->Auth->allow('index');
	}


	public function index($controller = null) {
		
		$this->loadModel('SiteConstant');
		$pageLimit = $this->SiteConstant->field('value', array('SiteConstant.siteconstant' => 'PAGE_LIMIT'));
				
		$paginate = array('limit' => $pageLimit);
		if ($this->Auth->user('group_id') == 2) {
			$this->Paginator->settings = $paginate;
		}
		//$this->Paginator->settings = $this->paginate;
		//$this->User->recursive = 1;
		$this->set('users', $this->Paginator->paginate());
		
	}
	

	public function start(){}
	
	
	public function register($controller = null){
		//echo "hai"; exit;
	
		if($this->request->is('post')){
			date_default_timezone_set('Asia/Calcutta');
			$time=date('Y-m-d H:i:s');
			$this->request->data['AkpageUser']['user_id'] = $this->Session->read('Auth.User.id');
			$this->request->data['AkpageUser']['created'] = $this->request->data['AkpageUser']['modified'] = $time;
			
			$this->AkpageUser->create();
			if($this->AkpageUser->save($this->request->data['AkpageUser'])){
				$this->Session->setFlash("Your details stored successfully");
				$this->redirect(array('controller' => $controller, 'action' => 'register'));
			}else
   			 	$this->Session->setFlash("problem storing your details. please enter details correctly.");
		}
	}

 */

} // ************** end of AkpageUsersController *************************
