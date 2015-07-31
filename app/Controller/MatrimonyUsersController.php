<?php
App::uses('AppController', 'Controller');
/**
 * MatrimonyUsers Controller
 *
 * @property MatrimonyUser $MatrimonyUser
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
*/
class MatrimonyUsersController extends AppController{

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator', 'Session');

	public function beforeFilter(){
		parent::beforeFilter();
		//$this->Auth->allow('register','logout');
		//$this->Auth->allow('index','view','register','register0','register1','register2','matchingProfiles');
		//$this->Auth->allow('index','edit', 'matrimonyHome', 'register', 'searchBasic', 'ajaxStateCities', 'searchById');
		//$this->Auth->allow('requestAjaxHandler','uploadPhotos','changeProfilePic','deletePhotos', 'changeAccessMode', 'requestHandler', 'payment');
		//$this->Auth->allow('searchById','searchBasic','requestHandler','tempRequests','changeAccessMode');
		if (!$this->currentUser) {
			//$this->Auth->allow('register');
		}else {
			$this->Auth->allow('requestAjaxHandler');
		}

		$this->Auth->allow('view', 'register', 'searchById','searchBasic', 'matrimonyHome', 'ajaxStateCities');


	}

	public function beforeRender(){

		//$this->layout = 'matrimony';

		/* echo "<pre>";
		 print_r($this->Session->read('Auth.User.AkpageUser.id'));
		exit; */

		//$registrationLevel = $this->MatrimonyUser->field('registrationLevel', array('MatrimonyUser.Id' => $matrimonyUser['MatrimonyUser']['id']));

		$matrimonyUser = $this->MatrimonyUser->find('first', array('conditions' => array('MatrimonyUser.akpageUser_id' => $this->Session->read('Auth.User.AkpageUser.id')), 'fields' => array('MatrimonyUser.id', 'MatrimonyUser.registrationLevel', 'MatrimonyUser.profilePic'), 'recursive' => -1));

		if ($matrimonyUser) {

			if ($matrimonyUser['MatrimonyUser']['registrationLevel'] == 3) {
				$profilePic = "../uploads/images/".$this->Session->read('Auth.User.AkpageUser.id')."/".$matrimonyUser['MatrimonyUser']['profilePic'];
				$this->set('profilePic', $profilePic);

			}

		}

		$this->loadModel('AkpageUser');
		if (!$this->Session->read('Auth.User.AkpageUser.gender')) {  // i.e for grooms show brides

			$recentMembers = $this->AkpageUser->find('all', array('conditions' => array(
					'AkpageUser.gender' => 1,
					'Usr.status' => 1,
					'Usr.group_id' => array(3,4)
			),
					'joins' => array(
							array('table' => 'users',
									'alias' => 'Usr',
									'type' => 'INNER',
									'conditions' => array(
											'Usr.id = AkpageUser.user_id',
									)
							)
					),
					'order' => 'AkpageUser.created DESC',
					'limit' => 3,
					'recursive' => 0
			));


			//$recentBrides = $this->User->find('all', array('conditions' => array('User.status' => 1, 'User.gender' => 1, 'User.group_id' => array(3,4)), 'order' => 'User.created DESC', 'limit' => 5, 'recursive' => 0));
			/* echo "<pre>";
			print_r($recentBrides);
			exit;  */
			$this->set('recentHeader', 'Recent Brides');
		}else {

			$recentMembers = $this->AkpageUser->find('all', array('conditions' => array(
					'AkpageUser.gender' => 0,
					'Usr.status' => 1,
					'Usr.group_id' => array(3,4)
			),
					'joins' => array(
							array('table' => 'users',
									'alias' => 'Usr',
									'type' => 'INNER',
									'conditions' => array(
											'Usr.id = AkpageUser.user_id',
									)
							)
					),'order' => 'AkpageUser.created DESC',
					'limit' => 3,
					'recursive' => 0
			));

			$this->set('recentHeader', 'Recent Grooms');
		}

		for($i=0;$i<count($recentMembers);$i++){
			//array_push($match, 'age');
			$recentMembers[$i]['AkpageUser']['age']=$this->agecalc($recentMembers[$i]['AkpageUser']['dob']);
		}

		$this->set('recentMembers', $recentMembers);

	}


	public function register(){

		$this->layout = 'default';

		if($this->currentUser){
			
			$this->loadModel('AkpageUser');
			$akpageUserId = $this->AkpageUser->find('first',array('conditions'=>array('AkpageUser.user_id'=> $this->Session->read('Auth.User.id')),'fields' =>array('AkpageUser.id')));

			if ($akpageUserId) {
				
				$options = array('conditions' => array('MatrimonyUser.akpageUser_id' => $akpageUserId['AkpageUser']['id']), 'fields' => array('MatrimonyUser.id'));
				$matrimonyUser = $this->MatrimonyUser->find('first', $options);
			}

			if(isset($matrimonyUser) && $matrimonyUser){				

				$registrationLevel = $this->MatrimonyUser->field('registrationLevel', array('MatrimonyUser.Id' => $matrimonyUser['MatrimonyUser']['id']));

					if($registrationLevel == 3){// registration steps completed
						$this->redirect(array('controller' => 'matrimonyUsers', 'action' => 'matchingProfiles'));
					}
					else{
						$this->redirect(array('controller' => 'matrimonyUsers', 'action' => 'register'.++$registrationLevel));
					}
				
			}else if ($akpageUserId) {
				
				$this->redirect(array('controller' => 'matrimonyUsers', 'action' => 'register1'));
			}
			else{
				$this->loadModel('User');
				$groupId = $this->User->field('group_id', array('User.id' => $this->currentUser['id']));
				$this->Session->write('Auth.User.group_id', $groupId);
				
				if($groupId == 5){
					$this->redirect(array('controller' => 'matrimonyUsers', 'action' => 'matrimonyHome'));
				}else{
					$this->redirect(array('controller' => 'matrimonyUsers', 'action' => 'register0'));
				}
			}
		}else{

			$this->redirect(array('controller' => 'matrimonyUsers', 'action' => 'matrimonyHome'));
		}


	} // ********************** end of register() *********************



	public function register0(){

		if($this->request->is('post')){


			foreach ($this->request->data['AkpageUser'] as $key => $value) {
					
				if (!in_array($key, array('dob', 'gender'))) {
					$this->request->data['AkpageUser'][$key] = strip_tags($this->request->data['AkpageUser'][$key]);
					$this->request->data['AkpageUser'][$key] = trim($this->request->data['AkpageUser'][$key]);

					$this->request->data['AkpageUser'][$key] = preg_replace("/[\r\n]+/", "\n", $this->request->data['AkpageUser'][$key]);
					$this->request->data['AkpageUser'][$key] = preg_replace("/\s+/", " ", $this->request->data['AkpageUser'][$key]);
				}
					
			}

			$this->loadModel('AkpageUser');

			if ( !preg_match('/^[a-z ]+$/i', $this->request->data['AkpageUser']['name']) ) {

				$this->AkpageUser->invalidate('name', 'Characters only');
				return  false;
					
			}

			if ( !preg_match('/^[a-z ]+$/i', $this->request->data['AkpageUser']['surname']) ) {
				$this->AkpageUser->invalidate('surname', 'Characters only');
				return  false;
					
			}

			if ( !preg_match('/^[0-9]{10}$/i', $this->request->data['AkpageUser']['phone']) ) {
				$this->AkpageUser->invalidate('phone', 'Enter 10 digits only.');
				return  false;
					
			}

			date_default_timezone_set('Asia/Calcutta');
			$time=date('Y-m-d H:i:s');
			$this->request->data['AkpageUser']['user_id'] = $this->Session->read('Auth.User.id');
			$this->request->data['AkpageUser']['created'] = $this->request->data['AkpageUser']['modified'] = $time;

			$this->loadModel('AkpageUser');
			$this->AkpageUser->create();
			if($this->AkpageUser->save($this->request->data['AkpageUser'])){
				$this->Session->setFlash(__("Your details stored successfully"), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'register1'));
			}else
				$this->Session->setFlash("problem storing your details. please enter details correctly.");
		}


	} // ***************** end of register0() ************************************


	public function register1(){


		$states = $this->MatrimonyUser->State->find('list');
		$this->set(compact('states'));

		if($this->request->is('post')){
			//echo "<pre>";
			//print_r($this->request->data['MatrimonyUser']);
			//exit;

			if (isset($this->request->data['MatrimonyUser']['state_id'])) {
				$cities = $this->MatrimonyUser->City->find('list', array('conditions' => array('City.state_id' => $this->request->data['MatrimonyUser']['state_id'])));
				$this->set(compact('cities'));
			}


			foreach ($this->request->data['MatrimonyUser'] as $key => $value) {
					
				if (in_array($key, array('gothra', 'address', 'aboutMe'))) {
					$this->request->data['MatrimonyUser'][$key] = strip_tags($this->request->data['MatrimonyUser'][$key]);
					$this->request->data['MatrimonyUser'][$key] = trim($this->request->data['MatrimonyUser'][$key]);

					$this->request->data['MatrimonyUser'][$key] = preg_replace("/[\r\n]+/", "\n", $this->request->data['MatrimonyUser'][$key]);
					$this->request->data['MatrimonyUser'][$key] = preg_replace("/\s+/", " ", $this->request->data['MatrimonyUser'][$key]);
				}
					
			}


			if ( !preg_match('/^[a-z ]+$/i', $this->request->data['MatrimonyUser']['gothra']) ) {
					
				$this->MatrimonyUser->invalidate('gothra', __('Characters only'));
				return  false;
					
			}

			if ( !preg_match('/^[a-z0-9-#\/,:\. ]+$/i', $this->request->data['MatrimonyUser']['address']) ) {
				$this->MatrimonyUser->invalidate('address', __('Special Symbols Not Allowed'));
				return  false;
					
			}

			if ( !preg_match('/^[a-z., ]{10,250}$/i', $this->request->data['MatrimonyUser']['aboutMe']) ) {
				$this->MatrimonyUser->invalidate('aboutMe', 'Maximum 250 Characters only.');
				return  false;
					
			}

			$data = $this->request->data['MatrimonyUser'];
			/*$json = json_encode($data);
			 $json = json_decode($json,true);
			unset($json['accessMode']);
			unset($json['profilePic']);
			$data['otherDetails'] = json_encode($json);*/
			$this->loadModel('AkpageUser');
			$akpageUserId = $this->AkpageUser->find('first',array('conditions'=>array('AkpageUser.user_id'=> $this->Session->read('Auth.User.id')),'fields' =>array('AkpageUser.id')));

			$userId = $data['akpageUser_id'] = $akpageUserId['AkpageUser']['id'];
			$data['registrationLevel'] = 1;
			$data['matrimonyId'] = rand(10,99).time();


			//echo "<pre>";
			//print_r($this->request->data['MatrimonyUser']);
			//exit;

			if(!is_dir("../webroot/uploads/images/".$userId)){
				if(!(mkdir("../webroot/uploads/images/".$userId,0777)))
					die("failed to create directory");
			}
			$filepath="";
			$img=$data['profilePic']['name'];

			if (file_exists("../webroot/uploads/images/$userId/" .$img)){
				$filepath=$img;
			}else{

				move_uploaded_file($data['profilePic']['tmp_name'], "../webroot/uploads/images/$userId/" . $img);
				$filepath=$img;
				chmod("../webroot/uploads/images/$userId/".$filepath,0777);
			}

			$data['profilePic'] = $filepath;

			$this->MatrimonyUser->create();
			if($this->MatrimonyUser->save($data)){
				$this->Session->setFlash(__("Your details stored successfully. Fill step-3 details."), 'default', array('class' => 'success'));
				$this->redirect(array('controller' => 'MatrimonyUsers', 'action' => 'register2'));
			}else
				$this->Session->setFlash("problem storing your details. please enter details correctly.");
		}


	}// ***************** end of register1() ************************************


	public function register2(){


		if($this->request->is('post')){


			foreach ($this->request->data['MatrimonyUser'] as $key => $value) {
					
				if (!in_array($key, array('brothers', 'sisters', 'familyStatus', 'familyType', 'employedIn', 'totalAnnualIncome'))) {
					$this->request->data['MatrimonyUser'][$key] = strip_tags($this->request->data['MatrimonyUser'][$key]);
					$this->request->data['MatrimonyUser'][$key] = trim($this->request->data['MatrimonyUser'][$key]);

					$this->request->data['MatrimonyUser'][$key] = preg_replace("/[\r\n]+/", "\n", $this->request->data['MatrimonyUser'][$key]);
					$this->request->data['MatrimonyUser'][$key] = preg_replace("/\s+/", " ", $this->request->data['MatrimonyUser'][$key]);
				}
					
			}


			if ( !preg_match('/^[a-z ]+$/i', $this->request->data['MatrimonyUser']['fatherName']) ) {
					
				$this->MatrimonyUser->invalidate('fatherName', __('Characters only'));
				return  false;
					
			}

			if ( !preg_match('/^[a-z ]+$/i', $this->request->data['MatrimonyUser']['motherName']) ) {
					
				$this->MatrimonyUser->invalidate('motherName', __('Characters only'));
				return  false;
					
			}

			if ( !preg_match('/^[a-z ]+$/i', $this->request->data['MatrimonyUser']['occupation']) ) {
					
				$this->MatrimonyUser->invalidate('occupation', __('Characters only'));
				return  false;
					
			}


			if ($this->request->data['MatrimonyUser']['company']) {

					
				if ( !preg_match('/^[a-z ]+$/i', $this->request->data['MatrimonyUser']['company']) ) {

					$this->MatrimonyUser->invalidate('company', __('Characters only'));
					return  false;

				}
			}

			if ($this->request->data['MatrimonyUser']['designation']) {
				if ( !preg_match('/^[a-z ]+$/i', $this->request->data['MatrimonyUser']['designation']) ) {

					$this->MatrimonyUser->invalidate('designation', __('Characters only'));
					return  false;

				}
			}

			if ($this->request->data['MatrimonyUser']['businessName']) {
				if ( !preg_match('/^[a-z ]+$/i', $this->request->data['MatrimonyUser']['businessName']) ) {

					$this->MatrimonyUser->invalidate('businessName', __('Characters only'));
					return  false;

				}
			}

			if ( !preg_match('/^[a-z\/. ]+$/i', $this->request->data['MatrimonyUser']['qualification']) ) {
					
				$this->MatrimonyUser->invalidate('qualification', __('Characters only'));
				return  false;
					
			}

			if ( !preg_match('/^[a-z. ]+$/i', $this->request->data['MatrimonyUser']['collegeName']) ) {
					
				$this->MatrimonyUser->invalidate('collegeName', __('Characters only'));
				return  false;
					
			}


			if ( !preg_match('/^[a-z. ]+$/i', $this->request->data['MatrimonyUser']['university']) ) {
					
				$this->MatrimonyUser->invalidate('university', __('Characters only'));
				return  false;
					
			}


			if ( !preg_match('/^[a-z0-9., ]{10,250}$/i', $this->request->data['MatrimonyUser']['achievements']) ) {
				$this->MatrimonyUser->invalidate('achievements', 'Minimum 10 and Maximum 250 Characters only.');
				return  false;
					
			}




			$family = $profession = $education = $this->request->data['MatrimonyUser'];

			$family = array('fatherName'=>$family['fatherName'], 'motherName'=>$family['motherName'], 'brothers'=>$family['brothers'], 'sisters'=>$family['sisters'], 'familyStatus'=>$family['familyStatus'], 'familyType'=>$family['familyType']);

			$profession = array('employedIn'=>$profession['employedIn'], 'occupation'=>$profession['occupation'], 'company'=>$profession['company'], 'designation'=>$profession['designation'], 'businessName'=>$profession['businessName'], 'totalAnnualIncome'=>$profession['totalAnnualIncome']);

			//$education = array('qualification'=>$education['qualification'], 'collegeName'=>$education['collegeName'], 'university'=>$education['university'], 'achievements'=>$education['achievements']);
			$education = array('collegeName'=>$education['collegeName'], 'university'=>$education['university'], 'achievements'=>$education['achievements']);


			//$this->request->data['MatrimonyUser']['familyDetails'] = json_encode($family);
			//$this->request->data['MatrimonyUser']['professionalDetails'] = json_encode($proffession);
			//$this->request->data['MatrimonyUser']['educationalDetails'] = json_encode($education);
			//$this->request->data['MatrimonyUser']['user_id'] = $this->Session->read('Auth.User.id');
			//$this->request->data['MatrimonyUser']['registrationLevel'] = 2;

			$family = json_encode($family);
			$profession = json_encode($profession);
			$education = json_encode($education);

			$this->loadModel('AkpageUser');
			$akpageUserId = $this->AkpageUser->find('first',array('conditions'=>array('AkpageUser.user_id'=> $this->Session->read('Auth.User.id')),'fields' =>array('AkpageUser.id')));

			/*echo "<pre>";
			 print_r($this->request->data['MatrimonyUser']);
			echo "<pre>";
			print_r($family);
			echo "<pre>";
			print_r($profession);
			echo "<pre>";
			print_r($education);
			exit;	*/
			//$this->MatrimonyUser->create();
			$fields = array('MatrimonyUser.familyDetails'=>"'".$family."'",'MatrimonyUser.professionalDetails'=>"'".$profession."'",'MatrimonyUser.educationalDetails'=>"'".$education."'",'MatrimonyUser.registrationLevel'=>'2', 'MatrimonyUser.qualification'=> "'".$this->request->data['MatrimonyUser']['qualification']."'");
			if($this->MatrimonyUser->updateAll($fields,array('MatrimonyUser.akpageUser_id'=>$akpageUserId['AkpageUser']['id']))){
				$this->Session->setFlash(__("Your details stored successfully. Fill final step details."), 'default', array('class' => 'success'));
				$this->redirect(array('controller' => 'MatrimonyUsers', 'action' => 'register3'));
			}else
				$this->Session->setFlash("problem storing your details. please enter details correctly.");
		}


	}// ***************** end of register2() ************************************


	public function register3(){

		$partnerStates = $this->MatrimonyUser->State->find('list');
		$this->set(compact('partnerStates'));

		if($this->request->is('post')){

			if (isset($this->request->data['MatrimonyUser']['state_id'])) {
				$cities = $this->MatrimonyUser->City->find('list', array('conditions' => array('City.state_id' => $this->request->data['MatrimonyUser']['state_id'])));
				$this->set(compact('cities'));
			}

			foreach ($this->request->data['MatrimonyUser'] as $key => $value) {
					
				if (in_array($key, array('partnerQualification', 'aboutPartner'))) {
					$this->request->data['MatrimonyUser'][$key] = strip_tags($this->request->data['MatrimonyUser'][$key]);
					$this->request->data['MatrimonyUser'][$key] = trim($this->request->data['MatrimonyUser'][$key]);

					$this->request->data['MatrimonyUser'][$key] = preg_replace("/[\r\n]+/", "\n", $this->request->data['MatrimonyUser'][$key]);
					$this->request->data['MatrimonyUser'][$key] = preg_replace("/\s+/", " ", $this->request->data['MatrimonyUser'][$key]);
				}
					
			}


			if ( !preg_match('/^[a-z. ]+$/i', $this->request->data['MatrimonyUser']['partnerQualification']) ) {
					
				$this->MatrimonyUser->invalidate('partnerQualification', __('Characters only'));
				return  false;
					
			}


			if ( !preg_match('/^[a-z0-9., ]{10,250}$/i', $this->request->data['MatrimonyUser']['aboutPartner']) ) {
				$this->MatrimonyUser->invalidate('aboutPartner', 'Minimum 10 and Maximum 250 Characters only.');
				return  false;
					
			}

			$this->loadModel('AkpageUser');
			$akpageUserId = $this->AkpageUser->find('first',array('conditions'=>array('AkpageUser.user_id'=> $this->Session->read('Auth.User.id')),'fields' =>array('AkpageUser.id')));

			$partner = json_encode($this->request->data['MatrimonyUser']);
			//$this->request->data['MatrimonyUser']['akpageuser_id'] = $akpageUserId['AkpageUser']['id'];

			$fields = array('MatrimonyUser.partnerDetails'=>"'".$partner."'",'MatrimonyUser.registrationLevel'=>'3');
			if($this->MatrimonyUser->updateAll($fields,array('MatrimonyUser.akpageUser_id'=>$akpageUserId['AkpageUser']['id']))){
				$this->Session->setFlash(__("Details stored successfully. Thank you for providing details."), 'default', array('class' => 'success'));
				$this->redirect(array('controller' => 'matrimonyUsers', 'action' => 'matchingProfiles'));
			}else
				$this->Session->setFlash("problem storing your details. please enter details correctly.");
		}


	}// ***************** end of register3() ************************************


	public function matchingProfiles(){

		$this->layout = 'matrimony';

		//$this->set('currentUser',$this->Session->read('Auth.User.id'));
		if($this->Session->read('Auth.User.id')){

			$this->loadModel('AkpageUser');
			$akpageUser = $this->AkpageUser->find('first',array('conditions'=>array('AkpageUser.user_id'=> $this->Session->read('Auth.User.id')),'fields' =>array('AkpageUser.id','AkpageUser.gender'),'recursive'=>2));
			//$gender=$this->AkpageUser->find('first',array ("conditions" => array("AkpageUser.user_id" => $this->Session->read('Auth.User.id')),"fields" => array("AkpageUser.gender")));

			$partnerDetails = $this->MatrimonyUser->find('first', array ("conditions" => array("MatrimonyUser.akpageUser_id" => $akpageUser['AkpageUser']['id']),"fields" => array("MatrimonyUser.partnerDetails")));
			$partnerDetails = json_decode($partnerDetails['MatrimonyUser']['partnerDetails'],true);

			$partnerDetails['gender']=$akpageUser['AkpageUser']['gender'];


			$partnerDetails['fromAge']=$this->datecalc($partnerDetails['fromAge']);
			$partnerDetails['toAge']=$this->datecalc($partnerDetails['toAge']);

			//$this->MatrimonyUser->recursive = -1;

			$this->loadModel('SiteConstant');
			$pageLimit = $this->SiteConstant->field('value', array('SiteConstant.siteconstant' => 'PAGE_LIMIT'));

			/* echo "<pre>";
			 print_r($pageLimit);
			exit; */
			//$pageLimit = 1;

			$paginate = array(
					'limit' => $pageLimit,
					'conditions' => array(
							"MatrimonyUser.qualification" => $partnerDetails['partnerQualification'],
							"AkpgUser.gender !=" =>$partnerDetails['gender'],
							"MatrimonyUser.height >" => "'".$partnerDetails['partnerHeight']."'",
							"MatrimonyUser.city_id" => $partnerDetails['partnerCity_id'],
							"MatrimonyUser.state_id" => $partnerDetails['partnerState_id'],
							"MatrimonyUser.smoking" => $partnerDetails['partnerSmoking'],
							"MatrimonyUser.drinking" => $partnerDetails['partnerDrinking'],
							"MatrimonyUser.aboutMe LIKE" => '%'. $partnerDetails['aboutPartner'] . '%',
							array('AkpgUser.dob <=' => $partnerDetails['fromAge'], 'AkpgUser.dob >=' => $partnerDetails['toAge'])
					),
					'joins' => array(
							array('table' => 'akpageUsers',
									'alias' => 'AkpgUser',
									'type' => 'INNER',
									'conditions' => array(
											'AkpgUser.id = MatrimonyUser.akpageUser_id',
									)
							)
					)

			);

			/* $matches=$this->MatrimonyUser->find('all', array('conditions' => array(
			 "MatrimonyUser.qualification" => $partnerDetails['qualification'],
					"AkpgUser.gender !=" =>$partnerDetails['gender'],
					"MatrimonyUser.height >" => "'".$partnerDetails['height']."'",
					"MatrimonyUser.city_id" => $partnerDetails['city_id'],
					"MatrimonyUser.smoking" => $partnerDetails['smoking'],
					"MatrimonyUser.drinking" => $partnerDetails['drinking'],
					"MatrimonyUser.aboutMe LIKE" => '%'. $partnerDetails['aboutPartner'] . '%',
					array('AkpgUser.dob <=' => $partnerDetails['fromAge'], 'AkpgUser.dob >=' => $partnerDetails['toAge'])
			),
					'joins' => array(
							array('table' => 'akpageUsers',
									'alias' => 'AkpgUser',
									'type' => 'INNER',
									'conditions' => array(
											'AkpgUser.id = MatrimonyUser.akpageUser_id',
									)
							)
					)
			)); */
			/*echo "<pre>";
			 print_r($matches);
			exit;*/
			//pr($matches);exit;

			//$this->set('matches',$matches);

			$this->Paginator->settings = $paginate;
			$matches = $this->Paginator->paginate();

			if($matches){
					
				//$this->Session->setFlash('Perfect matching profiles for you', 'default', array('class' => 'success'));
				$msg = "Matching Profiles";

			}else{

				$paginate = array('limit' => $pageLimit, 'conditions' => array(
						"or"=>array("MatrimonyUser.qualification" => $partnerDetails['partnerQualification'],
								"MatrimonyUser.height >" => "'".$partnerDetails['partnerHeight']."'",
								"MatrimonyUser.city_id" => $partnerDetails['partnerCity_id'],
								"MatrimonyUser.state_id" => $partnerDetails['partnerState_id'],
								"MatrimonyUser.smoking" => $partnerDetails['partnerSmoking'],
								"MatrimonyUser.drinking" => $partnerDetails['partnerDrinking'],
								"MatrimonyUser.aboutMe LIKE" => '%'. $partnerDetails['aboutPartner'] . '%',
								array('AkpgUser.dob <=' => $partnerDetails['fromAge'], 'AkpgUser.dob >=' => $partnerDetails['toAge'])),
						"AkpgUser.gender !=" =>$partnerDetails['gender'])
						,'joins' => array(
								array('table' => 'akpageUsers',
										'alias' => 'AkpgUser',
										'type' => 'INNER',
										'conditions' => array(
								    'AkpgUser.id = MatrimonyUser.akpageUser_id',
										)
								)
						)
				);

				/* $matches=$this->MatrimonyUser->find('all', array('conditions' => array(
				 "or"=>array("MatrimonyUser.qualification" => $partnerDetails['qualification'],
				 		"MatrimonyUser.height >" => "'".$partnerDetails['height']."'",
				 		"MatrimonyUser.city_id" => $partnerDetails['city_id'],
				 		"MatrimonyUser.smoking" => $partnerDetails['smoking'],
				 		"MatrimonyUser.drinking" => $partnerDetails['drinking'],
				 		"MatrimonyUser.aboutMe LIKE" => '%'. $partnerDetails['aboutPartner'] . '%',
				 		array('AkpgUser.dob <=' => $partnerDetails['fromAge'], 'AkpgUser.dob >=' => $partnerDetails['toAge'])),
						"AkpgUser.gender !=" =>$partnerDetails['gender']),
						'joins' => array(
								array('table' => 'akpageUsers',
										'alias' => 'AkpgUser',
										'type' => 'INNER',
										'conditions' => array(
								    'AkpgUser.id = MatrimonyUser.akpageUser_id',
										)
								)
						)
				)); */
				//$this->set('matches',$matches);

				$this->Paginator->settings = $paginate;
				$matches = $this->Paginator->paginate();

				if($matches)
					//$this->Session->setFlash('profiles recommended for you', 'default', array('class' => 'success'));
					$msg = "Recommended Profiles";
				else
					//$this->Session->setFlash('No matches for you');
					$msg = "No Matches";

			}

			$this->set('msg', $msg);

			//pr($matches); exit;

			for($i=0;$i<count($matches);$i++){
				//array_push($match, 'age');
				$matches[$i]['AkpageUser']['age']=$this->agecalc($matches[$i]['AkpageUser']['dob']);
			}

			$this->set('matches',$matches);
			//$this->set('matches', $this->Paginator->paginate());


			// ***** finding names of recent visitors by using their ids. better to have STORED PROCEDURE ********

			$options = array('conditions' => array('MatrimonyUser.id' => $akpageUser['MatrimonyUser']['id']),'recursive' => -1);
			$matrimonyUser = $this->MatrimonyUser->find('first', $options);
			//$this->set('matrimonyUser', $matrimonyUser);


			$recentVisitorsStr = $matrimonyUser['MatrimonyUser']['recentVisitors'];
			$this->set('recentVisitorsStr', $recentVisitorsStr);

			if(!empty($recentVisitorsStr)){
				$recentVisitorsArr = explode(",",$recentVisitorsStr);
				//pr($recentVisitorsArr);exit;
					
				for($i=0; $i<count($recentVisitorsArr); $i++){
					$options = array('conditions'=>array('MatrimonyUser.id'=>$recentVisitorsArr[$i]),'recursive'=>1);
					$visitorName = $this->MatrimonyUser->find('first',$options);
					//pr($visitorName);exit;
					$visitorIds[$i] = $visitorName['MatrimonyUser']['id'];
					$visitorNames[$i] = $visitorName['AkpageUser']['name'];
				}
					
				$this->set('visitorNames', $visitorNames);
				$this->set('visitorIds', $visitorIds);
			}

			$recentVisitedStr = $matrimonyUser['MatrimonyUser']['recentVisited'];
			$this->set('recentVisitedStr', $recentVisitedStr);


			if(!empty($recentVisitedStr)){
				$recentVisitedArr = explode(",",$recentVisitedStr);

				/* echo "<pre>";
				 print_r($recentVisitedStr);
				exit;  */

				for($i=0; $i<count($recentVisitedArr); $i++){
					$options = array('conditions'=>array('MatrimonyUser.id'=>$recentVisitedArr[$i]),'recursive'=>1);
					$visitedName = $this->MatrimonyUser->find('first',$options);

					$visitedIds[$i] = $visitedName['MatrimonyUser']['id'];
					$visitedNames[$i] = $visitedName['AkpageUser']['name'];
				}

				$this->set('visitedNames', $visitedNames);
				$this->set('visitedIds', $visitedIds);
			}

		}


	}// ***************** end of matchingProfiles() ************************************


	public function datecalc($age) {
		//pr($dob);exit;

		//list($y,$m,$d) = explode('-', $dob);
		$y=date('Y')-$age;//echo $y;exit;
		$m=date('m');
		$d=date('d');
			
		return $y."-".$m."-".$d;
			
	}

	public function agecalc($dob) {
		//pr($dob);exit;

		list($y,$m,$d) = explode('-', $dob);
		/*$y=$dob['year'];
		 pr($y);exit;
		$m=$dob['month'];
		$d=$dob['day'];*/
		if (($m = (date('m') - $m)) < 0) {
			$y++;
		} elseif ($m == 0 && (date('d') - $d) < 0) {
			$y++;
		}
			
		return date('Y') - $y;
			
	}


	public function index() {

		$this->loadModel('SiteConstant');
		$pageLimit = $this->SiteConstant->field('value', array('SiteConstant.siteconstant' => 'PAGE_LIMIT'));

		$paginate = array('limit' => $pageLimit);
		if ($this->Auth->user('group_id') == 2) {
			$this->Paginator->settings = $paginate;
		}
		//$this->Paginator->settings = $this->paginate;
		//$this->User->recursive = 1;
		$this->set('matrimonyUsers', $this->Paginator->paginate());


	} // ***************** end of index() ************************************

	public function view($id = null){

		if ($this->Session->read('Auth.User.group_id') == 2 ) {
			$this->layout = 'defaultAdmins';
		}else if (!$this->Session->read('Auth.User.id')) {
			return $this->redirect(array('controller' => 'users', 'action' => 'login'));
		}else {
			$this->layout = 'matrimony';
		}
		
		if ($this->Session->read('Auth.User.group_id') == 5 ) {
			$this->Session->setFlash(__("You Need To Complete Your Registration To View Details."));
			$this->redirect(array('controller' => 'users', 'action' => 'emailVerify'));
		}

		// ****** checking login users groupId
		if($this->Session->read('Auth.User.id')){
			if ($this->Session->read('Auth.User.group_id') != 2) {
				$loggedUser = $this->MatrimonyUser->find('first', array('conditions' => array(
						'Usr.id' => $this->Session->read('Auth.User.id')
				),
						'joins' => array(
								array('table' => 'akpageUsers',
										'alias' => 'AkpgUser',
										'type' => 'INNER',
										'conditions' => array(
												'AkpgUser.id = MatrimonyUser.akpageUser_id',
										)
								),
								array('table' => 'users',
										'alias' => 'Usr',
										'type' => 'INNER',
										'conditions' => array(
												'Usr.id = AkpgUser.user_id',
										)
								)
						),
						'fields' => array('Usr.group_id','MatrimonyUser.id','MatrimonyUser.recentVisited', 'MatrimonyUser.recentVisitors')
				)
				);

			}
			//pr($loggedUser);exit;


			//$viewedUser = $this->MatrimonyUser->find('first', array('conditions' => array('MatrimonyUser.id' => $id), 'recursive' => 0));

			$viewedUser = $this->MatrimonyUser->find('first', array('conditions' => array(
					'MatrimonyUser.id' => $id
			),
					'joins' => array(
							array('table' => 'akpageUsers',
									'alias' => 'AkpgUser',
									'type' => 'INNER',
									'conditions' => array(
											'AkpgUser.id = MatrimonyUser.akpageUser_id',
									)
							),
							array('table' => 'users',
									'alias' => 'Usr',
									'type' => 'INNER',
									'conditions' => array(
											'Usr.id = AkpgUser.user_id',
									)
							),
							array('table' => 'states',
									'alias' => 'Stats',
									'type' => 'INNER',
									'conditions' => array(
											'Stats.id = MatrimonyUser.state_id',
									)
							),
							array('table' => 'cities',
									'alias' => 'Cits',
									'type' => 'INNER',
									'conditions' => array(
									'Cits.id = MatrimonyUser.city_id',
									)
									)
					),
					'fields' => array('Usr.email','MatrimonyUser.*','AkpgUser.*', 'Stats.state', 'Cits.city')

			)
			);
			//pr($viewedUser);exit;
			$this->set('viewedUser',$viewedUser);
			
			$partnerDetails = json_decode($viewedUser['MatrimonyUser']['partnerDetails'],true);
			$partnerDetails['partnerState'] = $this->MatrimonyUser->State->field('state', array('State.id' => $partnerDetails['partnerState_id']));
			$partnerDetails['partnerCity'] = $this->MatrimonyUser->City->field('city', array('City.id' => $partnerDetails['partnerCity_id']));
			
			$this->set('partnerDetails', $partnerDetails);			

			if ($this->Session->read('Auth.User.group_id') != 2) {

				$this->set('loggedUser',$loggedUser);
				$this->set('groupId',$loggedUser['Usr']['group_id']);

				$options = array('conditions' => array('requester'=>$loggedUser['MatrimonyUser']['id'], 'responder'=>$viewedUser['MatrimonyUser']['id']),'fields'=>array('Request.id','Request.response'));
				$this->loadModel('Request');
				$requestOld = $this->Request->find('first',$options);
				$this->set('requestOld', $requestOld);

					
				$recentVisitorsStr = $viewedUser['MatrimonyUser']['recentVisitors'];
				if(!empty($recentVisitorsStr))
					$recentVisitorsArr = explode(",",$recentVisitorsStr);
				else
					$recentVisitorsArr = array();


				$recentVisitedStr = $loggedUser['MatrimonyUser']['recentVisited'];
				if(!empty($recentVisitedStr))
					$recentVisitedArr = explode(",",$recentVisitedStr);
				else
					$recentVisitedArr = array();


				/*pr(count($recentVisitorsArr));
				 pr(count($recentVisitedArr));
				exit;
				pr($id);
				pr($loggedUser['MatrimonyUser']['id']);
				exit;*/

				if($id != $loggedUser['MatrimonyUser']['id']){


					// ***** if cureent viewed profile not in RECENT VISITORS list ********
					if(!in_array($loggedUser['MatrimonyUser']['id'],$recentVisitorsArr)){
						$this->loadModel('SiteConstant');
						$options = array('conditions'=>array('SiteConstant.siteconstant'=>'maxVisitors'),'fields'=>array('SiteConstant.value'),'recursive'=>-1);
						$visitorsCount = $this->SiteConstant->find('first',$options);
						$visitorsCount = $visitorsCount['SiteConstant']['value'];


						if(count($recentVisitorsArr) == 0){
							$recentVisitorsStr = $loggedUser['MatrimonyUser']['id'];
						}else if(count($recentVisitorsArr) < $visitorsCount){
							$recentVisitorsStr = $loggedUser['MatrimonyUser']['id'].",".$recentVisitorsStr;
						}else{
							$recentVisitorsStr = $loggedUser['MatrimonyUser']['id'].",".$recentVisitorsStr;
							$recentVisitorsArr = explode(",",$recentVisitorsStr);
							unset($recentVisitorsArr[$visitorsCount]);
							$recentVisitorsStr = implode(",",$recentVisitorsArr);
						}


					}
					// ***** if cureent viewed profile is in recent visitors list then bring it to first ********
					else{

						array_splice($recentVisitorsArr, array_search($loggedUser['MatrimonyUser']['id'],$recentVisitorsArr), 1);
						array_splice($recentVisitorsArr, 0, 0, $loggedUser['MatrimonyUser']['id']);
						$recentVisitorsStr = implode(",",$recentVisitorsArr);


					}

					if($loggedUser['Usr']['group_id'] !=2){

						$this->MatrimonyUser->id = $viewedUser['MatrimonyUser']['id'];
						$saveData = array('MatrimonyUser.recentVisitors' => $recentVisitorsStr);
						$this->MatrimonyUser->save($saveData);

					}

					// ***** if cureent viewed profile not in RECENT VISITED list ********
					if(!in_array($id,$recentVisitedArr)){
						$this->loadModel('SiteConstant');
						$options = array('conditions'=>array('SiteConstant.siteconstant'=>'maxVisited'),'fields'=>array('SiteConstant.value'),'recursive'=>-1);
						$visitedCount = $this->SiteConstant->find('first',$options);
						$visitedCount = $visitedCount['SiteConstant']['value'];

						if(count($recentVisitedArr) == 0){
							$recentVisitedStr = $id;
						}else if(count($recentVisitedArr) < $visitedCount){
							$recentVisitedStr = $id.",".$recentVisitedStr;
						}else{
							$recentVisitedStr = $id.",".$recentVisitedStr;
							$recentVisitedArr = explode(",",$recentVisitedStr);
							unset($recentVisitedArr[$visitedCount]);
							$recentVisitedStr = implode(",",$recentVisitedArr);
						}


					}
					// ***** if cureent viewed profile is in recent visitors list then bring it to first ********
					else{
						//$out = array_search($id,$recentVisitedArr);
						array_splice($recentVisitedArr, array_search($id,$recentVisitedArr), 1);
						array_splice($recentVisitedArr, 0, 0, $viewedUser['MatrimonyUser']['id']);
						$recentVisitedStr = implode(",",$recentVisitedArr);
						//pr($recentVisitedStr);exit;

					}


					if($loggedUser['Usr']['group_id'] != 2){

						$this->MatrimonyUser->id = $loggedUser['MatrimonyUser']['id'];
						$saveData = array('MatrimonyUser.recentVisited' => $recentVisitedStr);
						$this->MatrimonyUser->save($saveData);
						//$this->MatrimonyUser->saveField('recentVisited',$recentVisitedStr);

					}
				}
			}
		}


	}   // *********************** end of View() ******************************************************************


	public function requestAjaxHandler($userId, $viewedUserId, $type, $request){

		if ($this->RequestHandler->isAjax()) {

			if($type == 1){
				$options = array('conditions' => array('requester'=>$viewedUserId, 'responder'=>$userId),'fields'=>array('Request.id','Request.response'));
					
			}else if($type == 2){
				$options = array('conditions' => array('requester'=>$userId, 'responder'=>$viewedUserId),'fields'=>array('Request.id','Request.response'));
					
			}

			$this->loadModel('Request');
			$match = $this->Request->find('first',$options);
			//pr($match);exit;

			date_default_timezone_set('Asia/Calcutta');
			$time=date('Y-m-d H:i:s');

			if($match){
					
				switch($request){

					case 'request':{

						$saveData = array('response'=>0, 'modified'=>$time);
						$msg = "Request Sent";
						break;
					}

					case 'accept':{

						$saveData = array('response'=>1, 'modified'=>$time);
						$msg = "Accepted";
						break;
					}

					case 'decline':{
							
						$saveData = array('response'=>2, 'modified'=>$time);
						$msg = "Declined";
						break;
					}

					case 'delete':{
							
						if($this->Request->delete($match['Request']['id'],TRUE)){

							echo "Deleted";
							exit;
						}

						break;
					}

				}   // end of switch

				//$saveData = array('response'=>1, 'modified'=>$time);
				$this->Request->id = $match['Request']['id'];
				if($this->Request->save($saveData)){
					echo "<span>".$msg."</span>";
					exit;

				}
					
			}else{

				if($type == 1){
					$saveData = array('requester'=>$viewedUserId, 'responder'=>$userId, 'response'=>0, 'created'=>$time, 'modified'=>$time);

				}else if($type ==2){
					$saveData = array('requester'=>$userId, 'responder'=>$viewedUserId, 'response'=>0, 'created'=>$time, 'modified'=>$time);

				}

				if($this->Request->save($saveData)){
					echo "<h4> Request Sent </h4>";
					exit;

				}
				$this->Request->save($saveData);
					
			}

		}
	} // ************************* end of requestAjaxHandler() ****************************************************************


	public function uploadPhotos(){

		$this->layout = 'matrimony';

		if($this->Session->read('Auth.User.id')){

			$this->loadModel('SiteConstant');
			$options = array('conditions' => array('SiteConstant'=>'maxPhotos'),'fields'=>array('SiteConstant.value'));
			$maxPhotos = $this->SiteConstant->find('first',$options);
			$maxPhotos = $maxPhotos['SiteConstant']['value'];
			$this->set('maxPhotos',$maxPhotos);

			$this->loadModel('SiteConstant');
			$options = array('conditions' => array('SiteConstant'=>'maxPhotoSize'),'fields'=>array('SiteConstant.value'));
			$maxPhotoSize = $this->SiteConstant->find('first',$options);
			$maxPhotoSize = $maxPhotoSize['SiteConstant']['value'];
			$this->set('maxPhotoSize',$maxPhotoSize);

			$this->loadModel('AkpageUser');
			$options = array('conditions'=>array('AkpageUser.user_id'=>$this->Session->read('Auth.User.id')),'fields'=>array('AkpageUser.id'),'recursive'=> -1);
			$akpageUser = $this->AkpageUser->find('first',$options);
			$userId = $akpageUser['AkpageUser']['id'];

			$dir="uploads/images/".$userId."/";
			$images = glob($dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
			$this->set('photoCount',count($images));

			if ($this->request->is('post')) {
				$filepath="";
				$str1=$str2="";
				$str3="";
				$pics=$this->request->data['MatrimonyUser']['photos'];
				//pr($pics);exit;
				foreach($pics as $photo){
					if (!$photo['error']) {
							
						$img=$photo['name'];
						if (file_exists("../webroot/uploads/images/$userId/" .$img)){
							$str1 .= $img. " ";
							//pr($str);exit;
							$filepath="uploads/images/$userId/" . $img;
						}else{
							$allowedExts = array("gif", "jpeg", "jpg", "png");
							$temp = explode(".", $photo["name"]);
							$extension = end($temp);

							if ((($photo["type"] == "image/gif") || ($photo["type"] == "image/jpeg") || ($photo["type"] == "image/jpg") || ($photo["type"] == "image/pjpeg") || ($photo["type"] == "image/x-png") || ($photo["type"] == "image/png")) && ($photo["size"] < $maxPhotoSize*1024) && in_array($extension, $allowedExts))
							{
								move_uploaded_file($photo['tmp_name'], "../webroot/uploads/images/$userId/" . $img);
								$filepath="uploads/images/$userId/" . $img;
								chmod($filepath,0777);
								$str2 .= $img;
							}else{
								$str3 .= $img. " ";

							}

						}
					}
				}if($str3){

					if($str1){
						$this->Session->setFlash($str1. " image already existing. Upload different image.</br>"
								.$str3. ' image not uploaded. please check image size(<'.$maxPhotoSize.'kb) & extentions ("jpg,jpeg,gif,png" only).');
					}else{
						$this->Session->setFlash($str3. ' image not uploaded. please check image size(<'.$maxPhotoSize.'kb) & extentions ("jpg,jpeg,gif,png" only).');
					}

					$this->redirect(array('action' => 'uploadPhotos'));
				}


				if(!empty($str1)){
					//echo $str. " image already existing.";
					if(empty($str2))
						$this->Session->setFlash($str1. ' image already existing. Upload different image.');
					else{
						$str4 = explode(" ",$str1);
						if(count($str4) == 1)
							$this->Session->setFlash(__($str1. ' Image Already Existing. Remaining Photos Uploaded Successfully.'), 'default' , array('class' => 'notice'));
						else
							$this->Session->setFlash($str1. ' Images Already Existing. Remaining Photos Uploaded Successfully','default' , array('class' => 'notice'));
					}

					$this->redirect(array('action' => 'uploadPhotos'));
				}else{
					
					$this->Session->setFlash(__('Photos Uploaded Successfully'), 'default' , array('class' => 'success'));
					$this->redirect($this->referer());
				}
			}

		}


	} // ********* end of uploadPhotos() **************


	public function changeProfilePic(){

		$this->layout = 'matrimony';

		if($this->Session->read('Auth.User.id')){

			//$this->loadModel('AkpageUser');
			$userDetails = $this->MatrimonyUser->find('first', array('conditions' => array(
					'AkpgUser.user_id' => $this->Session->read('Auth.User.id')
			),
					'joins' => array(
							array('table' => 'akpageUsers',
									'alias' => 'AkpgUser',
									'type' => 'INNER',
									'conditions' => array(
											'AkpgUser.id = MatrimonyUser.akpageUser_id',
									)
							)
					),
					'fields' => array('AkpgUser.id','MatrimonyUser.id')

			)
			);
			//$userId = $this->MatrimonyUser->find('first',$options);
			//pr($userId);exit;
			$userId = $userDetails['AkpgUser']['id'];
			$matrimonyUserId = $userDetails['MatrimonyUser']['id'];
			$this->set('userId',$userId);
			$dir = "uploads/images/".$userId."/";
			//$images = glob($dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
			$images = scandir($dir, 1);
			for($i=0,$j=0; $i<count($images); $i++){
				if (!in_array($images[$i],array(".",".."))){
					$pics[$j] = $images[$i];
					$j++;
				}
			}


			/*$dir = new DirectoryIterator("uploads/images/".$userId."/");
			 $i = 0;
			foreach ($dir as $fileinfo) {
			$images[$i] = $fileinfo->getFilename();
			$i++;
			}*/

			//pr($pics);exit;
			$this->set('pics',$pics);
			if($this->request->is('post')){
					
				$data = $this->request->data['MatrimonyUser'];
				//pr($data);exit;
				$profilePic = $pics[$data['photos']];
				$this->MatrimonyUser->id = $matrimonyUserId;
				if($this->MatrimonyUser->saveField('profilePic',$profilePic)){
					$this->Session->setFlash(__('Your profile picture changed successfully.'), 'default', array('class' => 'success'));
					$this->redirect($this->referer());
				}else{
					$this->Session->setFlash('Problem occured while changing profile pic. Please try again.');
				}
				//pr($profilePic);exit;


			}
		}

	} // ********* end of changeProfilePic() **************


	public function deletePhotos(){

		$this->layout = 'matrimony';

		if($this->Session->read('Auth.User.id')){

			/*$this->loadModel('AkpageUser');
			 $options = array('conditions'=>array('AkpageUser.user_id'=>$this->Session->read('Auth.User.id')),'fields'=>array('AkpageUser.id'),'recursive'=> -1);
			$akpageUser = $this->AkpageUser->find('first',$options);
			$userId = $akpageUser['AkpageUser']['id'];*/
			$userDetails = $this->MatrimonyUser->find('first',array(
					'conditions'=> array(
							'AkpgUser.user_id' => $this->Session->read('Auth.User.id')
					),
					'joins' => array(
							array(
									'table'=>'akpageUsers',
									'alias'=>'AkpgUser',
									'type'=>'INNER',
									'conditions'=>array(
											'AkpgUser.id = MatrimonyUser.akpageUser_id'
									)
							)
					),
					'fields' => array('AkpgUser.id','MatrimonyUser.id')
			)
			);
			//pr($userDetails);exit;
			$userId = $userDetails['AkpgUser']['id'];
			$matrimonyUserId = $userDetails['MatrimonyUser']['id'];
			$this->set('userId',$userId);


			$dir = "uploads/images/".$userId."/";
			$images = scandir($dir, 1);
			for($i=0,$j=0; $i<count($images); $i++){
				if (!in_array($images[$i],array(".",".."))){
					$pics[$j] = $images[$i];
					$j++;
				}
			}
			//pr($pics);exit;
			$this->set('pics',$pics);


			if($this->request->is('post')){
				$data = $this->request->data['MatrimonyUser'];
				//pr($data);exit;
				for($i=0;$i<count($data['photos']);$i++){

					$deletePhotos[$i] = $pics[$data['photos'][$i]];
				}

				$options = array('conditions'=>array('MatrimonyUser.id'=>$matrimonyUserId),'fields'=>array('MatrimonyUser.profilePic'),'recursive'=> -1);
				$profilePic1 = $this->MatrimonyUser->find('first',$options);
				$profilePic1 = $profilePic1['MatrimonyUser']['profilePic'];

				if(in_array($profilePic1,$deletePhotos)){

					$this->Session->setFlash('Deleting photos contains your profile pic. First change your profile pic in order to delete it.');
					//$this->('picError',1);

					Router::connect(
					'/changeProfiePic',
					array('controller' => 'MatrimonyUsers', 'action' => 'changeProfiePic')
					);

					/* echo $this->Html->link('Change Profie Pic', array('controller'=>'MatrimonyUsers',
					 'action' => 'changeProfiePic')); */

					$this->redirect(array('action'=>'deletePhotos'));
				}else{

					for($i=0;$i<count($deletePhotos);$i++){
						unlink($dir."/".$deletePhotos[$i]);
					}

					$this->Session->setFlash(__('Photos deleted successfully.'), 'default', array('class' => 'success'));
				}

				$this->redirect($this->referer());


			}

		}

	} // ********* end of deletePhotos() **************



	public function searchById(){

		if ($this->Session->read('Auth.User.id')) {

			$this->layout = 'matrimony';
		}

		//if($this->request->is('post')){
		$data = $this->params->query;

		if( isset($data['matrimonyId']) ){
			$data['matrimonyId'] = strip_tags($data['matrimonyId']);
			$data['matrimonyId'] = trim($data['matrimonyId']);
			$data['matrimonyId'] = preg_replace("/\s+/", "", $data['matrimonyId']);

			//$data = $this->request->data['MatrimonyUser'];
			$data['matrimonyId'] = str_ireplace("AKPG", "", $data['matrimonyId']);
			//pr($data['matrimonyId']);exit;
			$options = array('conditions' => array('MatrimonyUser.matrimonyId'=>$data['matrimonyId'], 'MatrimonyUser.registrationLevel' => 3), 'recursive' => 0);
			$searchedUser = $this->MatrimonyUser->find('first',$options);

			if ($searchedUser) {
				$searchedUser['AkpageUser']['age']=$this->agecalc($searchedUser['AkpageUser']['dob']);
			}


			$this->set('searchedUser', $searchedUser);

		}

		//}

	} // **************  end of searchById()  ******************************************************************************


	public function searchBasic(){

		if ($this->Session->read('Auth.User.id')) {

			$this->layout = 'matrimony';
		}


		//if ($this->request->is(array('post', 'put'))) {

		//$data = $this->request->data['MatrimonyUser'];
		$data = $this->params->query;

		/* echo "<pre>";
		 print_r($data);
		exit; */
			
			
		if ($data['fromAge'] > $data['toAge']) {

			$data['fromAge'] = $data['fromAge'] + $data['toAge'];
			$data['toAge'] = $data['fromAge'] - $data['toAge'];
			$data['fromAge'] = $data['fromAge'] - $data['toAge'];

		}
			
		//pr($data);exit;
		$data['fromAge'] = $this->datecalc($data['fromAge']);
		$data['toAge'] = $this->datecalc($data['toAge']);

		$this->loadModel('SiteConstant');
		$pageLimit = $this->SiteConstant->field('value', array('SiteConstant.siteconstant' => 'PAGE_LIMIT'));
		//$pageLimit = 1;

		$paginate = array(
				'limit' => $pageLimit,
				'conditions' => array(
						'MatrimonyUser.registrationLevel' => 3,
						'AkpgUser.gender'=>$data['gender'],
						'AkpgUser.dob <=' => $data['fromAge'], 'AkpgUser.dob >=' => $data['toAge']
				),
				'joins' => array(
						array(
								'table' =>'akpageUsers',
								'alias' => 'AkpgUser',
								'type' => 'INNER',
								'conditions' => array(
										'AkpgUser.id = MatrimonyUser.akpageUser_id'
								)
						)
				),
				'fields' => array('MatrimonyUser.id', 'MatrimonyUser.profilePic', 'AkpageUser.id', 'AkpageUser.name', 'AkpageUser.gender', 'AkpageUser.dob')

		);

		$this->Paginator->settings = $paginate;
		$searchResults = $this->Paginator->paginate();



		/* $options = array('conditions' => array(
		 'AkpgUser.gender'=>$data['gender'],
				'AkpgUser.dob <=' => $data['fromAge'], 'AkpgUser.dob >=' => $data['toAge']
		),
				'joins' => array(
						array(
								'table' =>'akpageUsers',
								'alias' => 'AkpgUser',
								'type' => 'INNER',
								'conditions' => array(
										'AkpgUser.id = MatrimonyUser.akpageUser_id'
								)
						)
				),
				'fields' => array('MatrimonyUser.id','AkpgUser.id', 'AkpgUser.name', 'AkpgUser.gender', 'AkpgUser.dob')
		); */

		//$searchResults = $this->MatrimonyUser->find('all',$options);
		$count = count($searchResults);
		for($i=0; $i<$count; $i++){
			//array_push($match, 'age');
			$searchResults[$i]['AkpageUser']['age']=$this->agecalc($searchResults[$i]['AkpageUser']['dob']);
		}
		$this->set('searchResults',$searchResults);

		//pr($searchResults);exit;


		//}

	} // **************  end of searchBasic()  ******************************************************************************



	public function  requestHandler($type, $request){  // for handling different types of requests i.e Requests For You and Requests By You

		$this->layout = 'matrimony';

		if($this->Session->read('Auth.User.id')){

			$userDetails = $this->MatrimonyUser->find('first',array(
					'conditions'=> array(
							'AkpgUser.user_id' => $this->Session->read('Auth.User.id')
					),
					'joins' => array(
							array(
									'table'=>'akpageUsers',
									'alias'=>'AkpgUser',
									'type'=>'INNER',
									'conditions'=>array(
											'AkpgUser.id = MatrimonyUser.akpageUser_id'
									)
							)
					),
					'fields' => array('AkpgUser.id','MatrimonyUser.id')
			)
			);
			//pr($userDetails);exit;
			$akpageUserId = $userDetails['AkpgUser']['id'];
			$userId = $userDetails['MatrimonyUser']['id'];
			$this->set('userId',$userId);

			$options = $matches = '';

			if($type == 1){  // type = 1 for requests coming for you
					
				switch($request){

					case 'pending':{

						$options = array('conditions'=>array('responder'=> $userId, 'response' => 0),
								'fields'=>array('requester'),
								'order' => array('Request.modified DESC')
						);

						break;
					}

					case 'accepted':{
							
						$options = array('conditions'=>array('responder'=> $userId, 'response' => 1),
								'fields'=>array('requester'),
								'order' => array('Request.modified DESC')
						);

						break;
					}

					case 'declined':{
							
						$options = array('conditions'=>array('responder'=> $userId, 'response' => 2),
								'fields'=>array('requester'),
								'order' => array('Request.modified DESC')
						);
							
						break;

					}

					default:{
							
						echo "Invalid Input. Please provide Valid input parameters";
						exit;
					}

				}   // end of switch

				$this->loadModel('Request');
				$totalRequests = $this->Request->find('all', $options);
				//pr($totalRequests);exit;
					
				if($totalRequests){
					$count = count($totalRequests);
					for($i=0; $i<$count; $i++){
							
						$matrimonyIds[$i] = $totalRequests[$i]['Request']['requester'];
					}
					//pr($matrimonyIds);exit;
					$count = count($matrimonyIds);
					for($i=0; $i<$count; $i++){

						$options = array('conditions' => array(
								'MatrimonyUser.id'=>$matrimonyIds[$i],
						),
								'joins' => array(
										array(
												'table' =>'akpageUsers',
												'alias' => 'AkpgUser',
												'type' => 'INNER',
												'conditions' => array(
														'AkpgUser.id = MatrimonyUser.akpageUser_id'
												)
										)
								),
								'fields' => array('MatrimonyUser.id','AkpgUser.id', 'AkpgUser.name', 'AkpgUser.gender', 'AkpgUser.dob')
						);

						$matches[$i] = $this->MatrimonyUser->find('first',$options);
						$matches[$i]['AkpgUser']['age']=$this->agecalc($matches[$i]['AkpgUser']['dob']);
					}

					//$this->set('matches',$matches);

					//pr($matches);exit;
				}

			}else if($type == 2){

				switch($request){

					case 'pending':{

						$options = array('conditions'=>array('requester'=> $userId, 'response' => 0),
								'fields'=>array('responder'),
								'order' => array('Request.modified DESC')
						);

						break;
					}

					case 'accepted':{
							
						$options = array('conditions'=>array('requester'=> $userId, 'response' => 1),
								'fields'=>array('responder'),
								'order' => array('Request.modified DESC')
						);

						break;
					}

					case 'declined':{
							
						$options = array('conditions'=>array('requester'=> $userId, 'response' => 2),
								'fields'=>array('responder'),
								'order' => array('Request.modified DESC')
						);

						break;
							
					}
				} // end of switch

				$this->loadModel('Request');
				$totalRequests = $this->Request->find('all', $options);
				//pr($totalRequests);exit;
					
				if($totalRequests){
					$count = count($totalRequests);
					for($i=0; $i<$count; $i++){
							
						$matrimonyIds[$i] = $totalRequests[$i]['Request']['responder'];
					}
					//pr($matrimonyIds);exit;
					$count = count($matrimonyIds);
					for($i=0; $i<$count; $i++){

						$options = array('conditions' => array(
								'MatrimonyUser.id'=>$matrimonyIds[$i],
						),
								'joins' => array(
										array(
												'table' =>'akpageUsers',
												'alias' => 'AkpgUser',
												'type' => 'INNER',
												'conditions' => array(
														'AkpgUser.id = MatrimonyUser.akpageUser_id'
												)
										)
								),
								'fields' => array('MatrimonyUser.id','AkpgUser.id', 'AkpgUser.name', 'AkpgUser.gender', 'AkpgUser.dob')
						);

						$matches[$i] = $this->MatrimonyUser->find('first',$options);
						$matches[$i]['AkpgUser']['age']=$this->agecalc($matches[$i]['AkpgUser']['dob']);
					}

					//$this->set('matches',$matches);

					//pr($matches);exit;
				}

			}

			$this->set('matches',$matches);
			$this->set('request',$request);
			$this->set('type',$type);

		}

	} // ********************************** end of requestHandler() **********************************************************


	public function changeAccessMode($id = null){

		if (!in_array($this->Session->read('Auth.User.group_id'), array(1,2))) {
			$this->layout = 'matrimony';
		}


		$this->set('id', $id);
		if (!$id) {

			$this->loadModel('SiteConstant');
			$pageLimit = $this->SiteConstant->field('value', array('SiteConstant.siteconstant' => 'PAGE_LIMIT'));

			$paginate = array('limit' => $pageLimit, 'recursive' =>  0);
			$this->Paginator->settings = $paginate;

			$this->set('matrimonyUsers', $this->Paginator->paginate());


		}else {
			/* $this->loadModel('User');
			 $this->User->id = $id;
			if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid User'));
			} */
			if (($this->Auth->user('group_id') == 2) || ($this->Session->read('Auth.User.id') == $id)) {


				$options = array('conditions' => array(
						'AkpgUser.user_id' => $id
				),
						'joins' => array(
								array(
										'table' => 'akpageUsers',
										'alias' => 'AkpgUser',
										'Type' => 'INNER',
										'conditions' => array(
												'AkpgUser.id = MatrimonyUser.akpageUser_id'
										)
								)
						),
						'fields' => array('MatrimonyUser.id','MatrimonyUser.accessMode'),
				);
				$matrimonyDetails = $this->MatrimonyUser->find('first',$options);
				$this->set('accessMode',$matrimonyDetails['MatrimonyUser']['accessMode']);

				if(!$matrimonyDetails){

					throw new NotFoundException(__('Invalid User'));
				}

				if ($this->request->is(array('post','put'))) {

					$this->MatrimonyUser->id = $matrimonyDetails['MatrimonyUser']['id'];

					if($this->MatrimonyUser->saveField('accessMode', $this->request->data['MatrimonyUser']['accessMode'])){

						$this->Session->setFlash(__('Access Mode Changed Successfully'), 'default', array('class' => 'success'));
						if ($this->Session->read('Auth.User.group_id') == 2) {
							$this->redirect(array('controller' => 'matrimonyUsers', 'action' => 'changeAccessMode'));
						}else {
							$this->redirect(array('controller' => 'matrimonyUsers', 'action' => 'matchingProfiles'));
						}


					}else{
						$this->Session->setFlash('problem occured while changing access mode. Please try again.');
					}

				}else{
					// nothing here
				}

			}else{

				$this->Session->setFlash("You are not allowed to edit the details.");
				$this->redirect($this->referer());
			}



		}

	} // ********************************* end of changeAccessMode() ********************************************************


	public function edit( $id = null ){
			
		if ($this->Session->read('Auth.User.group_id') == 2 ) {
			$this->layout = 'defaultAdmins';
		}else {
			$this->layout = 'matrimony';
		}


		$editUser = $this->MatrimonyUser->find('first', array('conditions' => array(
				'MatrimonyUser.akpageUser_id' => $id
		),
				'joins' => array(
						array('table' => 'akpageUsers',
								'alias' => 'AkpgUser',
								'type' => 'INNER',
								'conditions' => array(
										'AkpgUser.id = MatrimonyUser.akpageUser_id',
								)
						),
						array('table' => 'users',
								'alias' => 'Usr',
								'type' => 'INNER',
								'conditions' => array(
										'Usr.id = AkpgUser.user_id',
								)
						),
						array('table' => 'states',
								'alias' => 'Stats',
								'type' => 'INNER',
								'conditions' => array(
										'Stats.id = MatrimonyUser.state_id',
								)
						),
						array('table' => 'cities',
								'alias' => 'Cits',
								'type' => 'INNER',
								'conditions' => array(
										'Cits.id = MatrimonyUser.city_id',
								)
						)
				),
				'fields' => array('Usr.id', 'Usr.email','MatrimonyUser.*','AkpgUser.*', 'Stats.state', 'Cits.city')

		)
		);

		//pr($this->Session->read('Auth.User.AkpageUser.id')); exit;

		if (!in_array($this->Auth->user('group_id'), array(2)) && $this->Session->read('Auth.User.AkpageUser.id') != $id) {

			$this->Session->setFlash("Sorry...!. You are not Allowed to Edit Details of Others.");
			$this->redirect(array('controller' => 'users', 'action' => 'home'));
				
		}else{
				
			$editTab = 1;

			if ($this->request->is(array('post','put'))) {


				/* if (isset($this->request->data['User'])) {

				$this->request->data['User']['email'] = strip_tags($this->request->data['User']['email']);
				$this->request->data['User']['email'] = trim($this->request->data['User']['email']);

				$this->request->data['User']['email'] = preg_replace("/[\r\n]+/", "\n", $this->request->data['User']['email']);
				$this->request->data['User']['email'] = preg_replace("/\s+/", " ", $this->request->data['User']['email']);
					
					
				} */


				if (isset($this->request->data['AkpageUser'])) {

					foreach ($this->request->data['AkpageUser'] as $key => $value) {

						if (!in_array($key, array('dob'))) {
							$this->request->data['AkpageUser'][$key] = strip_tags($this->request->data['AkpageUser'][$key]);
							$this->request->data['AkpageUser'][$key] = trim($this->request->data['AkpageUser'][$key]);

							$this->request->data['AkpageUser'][$key] = preg_replace("/[\r\n]+/", "\n", $this->request->data['AkpageUser'][$key]);
							$this->request->data['AkpageUser'][$key] = preg_replace("/\s+/", " ", $this->request->data['AkpageUser'][$key]);
						}

					}
				}

				foreach ($this->request->data['MatrimonyUser'] as $key => $value) {

					if (!in_array($key, array('profileFor', 'maritalStatus', 'smoking', 'drinking', 'height', 'weight', 'employedIn', 'totalAnnualIncome', 'brothers', 'sisters', 'familyStatus', 'familyType', 'state_id', 'city_id', 'partnerQualification', 'partnerHeight', 'fromAge', 'toAge', 'partnerState_id', 'partnerCity_id', 'partnerSmoking', 'partnerDrinking'))) {
						$this->request->data['MatrimonyUser'][$key] = strip_tags($this->request->data['MatrimonyUser'][$key]);
						$this->request->data['MatrimonyUser'][$key] = trim($this->request->data['MatrimonyUser'][$key]);

						$this->request->data['MatrimonyUser'][$key] = preg_replace("/[\r\n]+/", "\n", $this->request->data['MatrimonyUser'][$key]);
						$this->request->data['MatrimonyUser'][$key] = preg_replace("/\s+/", " ", $this->request->data['MatrimonyUser'][$key]);
					}

				}


				/* $this->loadModel('User');
				 if ( isset($this->request->data['User']['email']) ) {

				$email = $this->User->field('email', array('User.email' => $this->request->data['User']['email'], 'User.id' => $editUser['Usr']['id']));
				if ($email) {
				$this->MatrimonyUser->AkpageUser->User->invalidate('email', __('Email Already Existing.'));
				return  false;
				}
					

				} */


				$editTab = $this->request->data['MatrimonyUser']['editTab'];
				$this->set('editTab', $editTab);

				$this->loadModel('AkpageUser');

				if ( isset($this->request->data['AkpageUser']['name']) && !preg_match('/^[a-z ]+$/i', $this->request->data['AkpageUser']['name']) ) {

					$this->AkpageUser->invalidate('name', 'Characters only');
					return  false;

				}

				if ( isset($this->request->data['AkpageUser']['surname']) && !preg_match('/^[a-z ]+$/i', $this->request->data['AkpageUser']['surname']) ) {
					$this->AkpageUser->invalidate('surname', 'Characters only');
					return  false;

				}

				if ( isset($this->request->data['MatrimonyUser']['qualification']) && !preg_match('/^[a-z\/. ]+$/i', $this->request->data['MatrimonyUser']['qualification']) ) {

					$this->MatrimonyUser->invalidate('qualification', __('Characters only'));
					return  false;

				}

				if ( isset($this->request->data['MatrimonyUser']['collegeName']) && !preg_match('/^[a-z. ]+$/i', $this->request->data['MatrimonyUser']['collegeName']) ) {

					$this->MatrimonyUser->invalidate('collegeName', __('Characters only'));
					return  false;

				}


				if ( isset($this->request->data['MatrimonyUser']['university']) && !preg_match('/^[a-z. ]+$/i', $this->request->data['MatrimonyUser']['university']) ) {

					$this->MatrimonyUser->invalidate('university', __('Characters only'));
					return  false;

				}


				if ( isset($this->request->data['MatrimonyUser']['achievements']) && !preg_match('/^[a-z0-9., ]{10,250}$/i', $this->request->data['MatrimonyUser']['achievements']) ) {
					$this->MatrimonyUser->invalidate('achievements', 'Minimum 10 and Maximum 250 Characters only.');
					return  false;

				}

				if ( isset($this->request->data['MatrimonyUser']['occupation']) && !preg_match('/^[a-z ]+$/i', $this->request->data['MatrimonyUser']['occupation']) ) {

					$this->MatrimonyUser->invalidate('occupation', __('Characters only'));
					return  false;

				}


				if (isset($this->request->data['MatrimonyUser']['company']) && $this->request->data['MatrimonyUser']['company']) {


					if ( !preg_match('/^[a-z ]+$/i', $this->request->data['MatrimonyUser']['company']) ) {

						$this->MatrimonyUser->invalidate('company', __('Characters only'));
						return  false;

					}
				}

				if (isset($this->request->data['MatrimonyUser']['designation']) && $this->request->data['MatrimonyUser']['designation']) {
					if ( !preg_match('/^[a-z ]+$/i', $this->request->data['MatrimonyUser']['designation']) ) {

						$this->MatrimonyUser->invalidate('designation', __('Characters only'));
						return  false;

					}
				}

				if (isset($this->request->data['MatrimonyUser']['businessName'])&& $this->request->data['MatrimonyUser']['businessName']) {
					if ( !preg_match('/^[a-z ]+$/i', $this->request->data['MatrimonyUser']['businessName']) ) {

						$this->MatrimonyUser->invalidate('businessName', __('Characters only'));
						return  false;

					}
				}


				if ( isset($this->request->data['MatrimonyUser']['fatherName']) && !preg_match('/^[a-z ]+$/i', $this->request->data['MatrimonyUser']['fatherName']) ) {

					$this->MatrimonyUser->invalidate('fatherName', __('Characters only'));
					return  false;

				}

				if ( isset($this->request->data['MatrimonyUser']['motherName']) && !preg_match('/^[a-z ]+$/i', $this->request->data['MatrimonyUser']['motherName']) ) {

					$this->MatrimonyUser->invalidate('motherName', __('Characters only'));
					return  false;

				}

				if ( isset($this->request->data['AkpageUser']['phone']) && !preg_match('/^[0-9]{10}$/i', $this->request->data['AkpageUser']['phone']) ) {
					$this->AkpageUser->invalidate('phone', 'Enter 10 digits only.');
					return  false;

				}

				if ( isset($this->request->data['MatrimonyUser']['address']) && !preg_match('/^[a-z0-9-#\/,: ]+$/i', $this->request->data['MatrimonyUser']['address']) ) {
					$this->MatrimonyUser->invalidate('address', __('Special Symbols Not Allowed'));
					return  false;

				}

				if ( isset($this->request->data['MatrimonyUser']['partnerQualification']) && !preg_match('/^[a-z\/. ]+$/i', $this->request->data['MatrimonyUser']['partnerQualification']) ) {

					$this->MatrimonyUser->invalidate('partnerQualification', __('Characters only'));
					return  false;

				}


				if ( isset($this->request->data['MatrimonyUser']['aboutPartner']) && !preg_match('/^[a-z0-9., ]{10,250}$/i', $this->request->data['MatrimonyUser']['aboutPartner']) ) {
					$this->MatrimonyUser->invalidate('aboutPartner', 'Minimum 10 and Maximum 250 Characters only.');
					return  false;

				}

					




				$family = $profession = $education = $partner = $this->request->data['MatrimonyUser'];

				if (isset($family['fatherName'])) {

					$family = array('fatherName'=>$family['fatherName'], 'motherName'=>$family['motherName'], 'brothers'=>$family['brothers'], 'sisters'=>$family['sisters'], 'familyStatus'=>$family['familyStatus'], 'familyType'=>$family['familyType']);
					$family = json_encode($family);
					$this->request->data['MatrimonyUser']['familyDetails'] = $family;
				}

				if (isset($profession['employedIn'])) {

					$profession = array('employedIn'=>$profession['employedIn'], 'occupation'=>$profession['occupation'], 'company'=>$profession['company'], 'designation'=>$profession['designation'], 'businessName'=>$profession['businessName'], 'totalAnnualIncome'=>$profession['totalAnnualIncome']);
					$profession = json_encode($profession);
					$this->request->data['MatrimonyUser']['professionalDetails'] = $profession;
				}

				if (isset($education['collegeName'])) {
					$education = array('collegeName'=>$education['collegeName'], 'university'=>$education['university'], 'achievements'=>$education['achievements']);
					$education = json_encode($education);
					$this->request->data['MatrimonyUser']['educationalDetails'] = $education;
				}

				if (isset($partner['partnerQualification'])) {
					$partner = array('partnerQualification'=>$partner['partnerQualification'], 'partnerHeight'=>$partner['partnerHeight'], 'fromAge'=>$partner['fromAge'], 'toAge'=>$partner['toAge'], 'partnerState_id'=>$partner['partnerState_id'], 'partnerCity_id'=>$partner['partnerCity_id'], 'partnerSmoking'=>$partner['partnerSmoking'], 'partnerDrinking'=>$partner['partnerDrinking'], 'aboutPartner'=>$partner['aboutPartner']);
					$partner = json_encode($partner);
					$this->request->data['MatrimonyUser']['partnerDetails'] = $partner;
				}
					
				//$fields = array('MatrimonyUser.familyDetails'=>"'".$family."'",'MatrimonyUser.professionalDetails'=>"'".$profession."'",'MatrimonyUser.educationalDetails'=>"'".$education."'",'MatrimonyUser.registrationLevel'=>'2', 'MatrimonyUser.qualification'=> "'".$this->request->data['MatrimonyUser']['qualification']."'");


				if (isset($this->request->data['AkpageUser'])) {
					$this->MatrimonyUser->AkpageUser->id = $editUser['AkpgUser']['id'];
					if ($this->MatrimonyUser->AkpageUser->save($this->request->data['AkpageUser'])) {
						// NOTHING
					}else {
						$this->Session->setFlash("Problem occured while storing updated details. please try again.");
						$this->redirect($this->referer());
					}
				}

				$this->MatrimonyUser->id = $editUser['MatrimonyUser']['id'];
				if ($this->MatrimonyUser->save($this->request->data['MatrimonyUser'])) {

					$this->Session->setFlash(__("Details updated successfully"), 'default', array('class' => 'success'));

					if ($this->Session->read('Auth.User.group_id') == 2) {
						$this->redirect(array('controller' => 'matrimonyUsers', 'action' => 'index'));
					}else {
						$this->redirect(array('controller' => 'matrimonyUsers', 'action' => 'matchingProfiles'));
					}
				}
				else{
					$this->Session->setFlash(__("Problem Occured While Storing Updated Details. Please Try Again."));
					$this->redirect($this->referer());
				}

			} else{

				$this->request->data = $editUser;
				$this->request->data['User'] = $editUser['Usr'];
				$this->request->data['AkpageUser'] = $editUser['AkpgUser'];

				/* echo "<pre>";
				 print_r($this->request->data['MatrimonyUser']);
				exit; */

				$educationalDetails = json_decode($editUser['MatrimonyUser']['educationalDetails'],true);
				foreach ($educationalDetails as $key => $value) {
					$this->request->data['MatrimonyUser'][$key] = $value;
				}

				$professionalDetails = json_decode($editUser['MatrimonyUser']['professionalDetails'],true);
				foreach ($professionalDetails as $key => $value) {
					$this->request->data['MatrimonyUser'][$key] = $value;
				}

				$familyDetails = json_decode($editUser['MatrimonyUser']['familyDetails'],true);
				foreach ($familyDetails as $key => $value) {
					$this->request->data['MatrimonyUser'][$key] = $value;
				}

				$partnerDetails = json_decode($editUser['MatrimonyUser']['partnerDetails'],true);
				foreach ($partnerDetails as $key => $value) {
					$this->request->data['MatrimonyUser'][$key] = $value;
				}

				$states = $partnerStates = $this->MatrimonyUser->State->find('list');
				$this->set(compact('states', 'partnerStates'));

				if (isset($this->request->data['MatrimonyUser']['state_id'])) {
					$cities = $this->MatrimonyUser->City->find('list', array('conditions' => array('City.state_id' => $this->request->data['MatrimonyUser']['state_id'])));
					$this->set(compact('cities'));
				}

				if (isset($this->request->data['MatrimonyUser']['partnerState_id'])) {
					$partnerCities = $this->MatrimonyUser->City->find('list', array('conditions' => array('City.state_id' => $this->request->data['MatrimonyUser']['partnerState_id'])));
					$this->set(compact('partnerCities'));
				}

			}
				
			$this->set('editTab', $editTab);
		}


	} // ****************** end of edit() ***************************************


	public function matrimonyHome(){
		$this->layout = 'matrimony_home';
	}

	public function payment(){
		$this->layout = 'matrimony';
	}


	public function ajaxStateCities() {

		if ($this->RequestHandler->isAjax()) {

			//$this->loadModel('Subcategory');
			//echo "hai"; exit;

			if ($this->data['MatrimonyUser']['state_id']) {
				$this->set('cities',
						$this->MatrimonyUser->City->find('all',
								array(
										'conditions' => array(
												'City.state_id' => $this->data['MatrimonyUser']['state_id'],
												'City.ACTIVE' => 1
										),
										'recursive' => -1
								)
						)
				);
					
			}

			if ($this->data['MatrimonyUser']['partnerState_id']) {

				$this->set('partnerCities',
						$this->MatrimonyUser->City->find('all',
								array(
										'conditions' => array(
												'City.state_id' => $this->data['MatrimonyUser']['partnerState_id'],
												'City.ACTIVE' => 1
										),
										'recursive' => -1
								)
						)
				);
					
			}

		}



	} // ************* end of ajaxAddCities() ***************************************





}     // ************************************** end of Matrimony Controller ******************************************************
