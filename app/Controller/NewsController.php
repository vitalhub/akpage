<?php
App::uses('AppController', 'Controller');
/**
 * News Controller
 *
 * @property News $News
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
*/
class NewsController extends AppController {

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator', 'Session');

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('view', 'latestNews');

	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {

		
		$groupId = $this->Auth->user('group_id');
		$this->set('groupId', $groupId);
		
		$paginate1 = array('limit' => 2, 'recursive' => 0); // for admin all news populated.
		$paginate2 = array('limit' => 2, 
							'conditions' => array('OR' => array('News.status' => 1,
											array('News.status' => 0, 'user_id'=> $this->Session->read('Auth.User.id')
											)
										)
								),
							'recursive' => 0
					);
		$paginate3 = array('limit' => 2, 'conditions' => array('News.status' => 1),'recursive' => 0);
		
		if (!$groupId) { // non-logged in users
			$this->Paginator->settings = $paginate3;
		}elseif ($groupId == 2){ // admin
			$this->Paginator->settings = $paginate1;
		}else { // other logged-in users
			$this->Paginator->settings = $paginate2;
		}
		
		//$this->Paginator->settings = $paginate;
		//$this->News->recursive = 0;
		$this->set('news', $this->Paginator->paginate());
		/* if ($this->Session->read('Auth.User.id')) {
			$this->set('groupId', $this->Auth->user('group_id'));
		} */
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Invalid news'));
		}
		$options = array('conditions' => array('News.id' => $id));
		$this->set('news', $this->News->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		
		if ($this->request->is('post')) {
			date_default_timezone_set('Asia/Calcutta');
			$time=date('Y-m-d H:i:s');
			$this->request->data['News']['created'] = $this->request->data['News']['modified'] = $time;
			$this->request->data['News']['user_id'] = $this->Session->read('Auth.User.id');

			if ($this->request->data['News']['picture']['error'] <= 0) {

				$img = $this->Session->read('Auth.User.id')."-".$this->request->data['News']['picture']['name'];

				if (file_exists("../webroot/uploads/images/news/" .$img)){
					$filepath=$img;
				}else{

					move_uploaded_file($this->request->data['News']['picture']['tmp_name'], "../webroot/uploads/images/news/" .$img);
					$filepath=$img;
					chmod("../webroot/uploads/images/news/".$filepath,0777);
				}

				$this->request->data['News']['picture'] = $filepath;

			}
				
			if ($this->Auth->user('group_id') == 2) {
				$this->request->data['News']['status'] = 1;
			}

			$this->News->create();
			if ($this->News->save($this->request->data)) {
				$this->Session->setFlash(__('The news has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The news could not be saved. Please, try again.'));
			}
		}
		//$users = $this->News->User->find('list');
		//$this->set(compact('users'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {

		$this->set('id',$id);
		if (!$id) {

			$paginate = array('limit' => 2, 'recursive' =>0);
			$this->Paginator->settings = $paginate;
			$this->set('news', $this->Paginator->paginate());
		}else {
			/* if (!$this->News->exists($id)) {
				throw new NotFoundException(__('Invalid news'));
			} */
			
			$options = array('conditions' => array('News.id' => $id), 'fields' => array('picture', 'status'), 'recursive' => -1 );
			$newsData = $this->News->find('first', $options);
			if (!$newsData) {
				throw new NotFoundException(__('Invalid news'));
			}
			if ($this->request->is(array('post', 'put'))) {

				date_default_timezone_set('Asia/Calcutta');
				$time=date('Y-m-d H:i:s');
				$this->request->data['News']['modified'] = $time;
				if ($this->request->data['News']['picture']['error']) {
					unset($this->request->data['News']['picture']);
				}else {

					$img = $this->Session->read('Auth.User.id')."-".$this->request->data['News']['picture']['name'];

					if (file_exists("../webroot/uploads/images/news/" .$img)){
						$filepath=$img;
					}else{

						move_uploaded_file($this->request->data['News']['picture']['tmp_name'], "../webroot/uploads/images/news/" .$img);
						$filepath=$img;
						chmod("../webroot/uploads/images/news/".$filepath,0777);
						unlink("../webroot/uploads/images/news/".$newsData['News']['picture']);
					}

					$this->request->data['News']['picture'] = $filepath;

				}
				//unset($this->request->data['News']['created']);
				$this->News->id = $id;
				if ($this->News->save($this->request->data)) {
					$this->Session->setFlash(__('The news has been edited successfully.'));
					//return $this->redirect(array('action' => 'edit'));
					return $this->redirect($this->referer());
				} else {
					$this->Session->setFlash(__('The news could not be saved. Please, try again.'));
				}
			} else {
				$options = array('conditions' => array('News.' . $this->News->primaryKey => $id),'recursive'=>-1);
				$newsData = $this->News->find('first', $options);
				//pr($this->Session->read('Auth.User.id'));
				//pr($newsData['News']['user_id']);
				if ($this->Auth->user('group_id') != 2) {  // not an admin
					if ($this->Session->read('Auth.User.id') != $newsData['News']['user_id'] || $newsData['News']['status'] != 0) { // not posted by him.
						$this->Session->setFlash(__('You are not allowed to edit this particular news.'));
						$this->redirect($this->referer());
					}
				}
				$this->request->data = $newsData;
			}
			//$users = $this->News->User->find('list');
			//$this->set(compact('users'));
		}


	} // *****************end of edit() ********************************************

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		
		if (!$id) {

			$paginate = array('limit' => 2, 'conditions' => array('News.status' => array(0,1)), 'recursive' =>0);
			$this->Paginator->settings = $paginate;
			$this->set('news', $this->Paginator->paginate());
		}else {

			$this->News->id = $id;
			/* if (!$this->News->exists()) {
				throw new NotFoundException(__('Invalid News'));
			} */
			$options = array('conditions' => array('News.' . $this->News->primaryKey => $id),'recursive'=>-1);
			$newsData = $this->News->find('first', $options);

			if (!$newsData) {
				throw new NotFoundException(__('Invalid News'));
			}

			if ($this->Auth->user('group_id') != 2) {  // not an admin.
				if (($this->Session->read('Auth.User.id') != $newsData['News']['user_id']) || $newsData['News']['status'] == 1) {
					$this->Session->setFlash(__('You are not allowed to Re-activate this particular news.'));
					$this->redirect($this->referer());
				}
			}

			//$this->request->allowMethod('post', 'delete');
			$this->News->id = $id;
			//if ($this->News->delete()) {
			if ($this->News->saveField('status', 2)){
				$this->Session->setFlash(__('News Deleted successfully.'));
			} else {
				$this->Session->setFlash(__('The news could not be deleted. Please, try again.'));
			}
			return $this->redirect($this->referer());
			//return $this->redirect(array('action' => 'reActivate'));

		}

	} // ************** end of delete() *********************************


	public function approve( $id = null){

		$this->set('currentUser',$this->Session->read('Auth.User.id'));
		if (!$id) {

			$paginate = array('limit' => 2, 'conditions' => array('News.status' => 0), 'recursive' =>0);
			$this->Paginator->settings = $paginate;
			$this->set('news', $this->Paginator->paginate());
		}else {

			$this->News->id = $id;
			if (!$this->News->exists()) {
				throw new NotFoundException(__('Invalid News'));
			}

			if ($this->Auth->user('group_id') != 2) {  // not an admin.
				$this->Session->setFlash(__('You are not allowed to approve this particular news.'));
				$this->redirect($this->referer());
			}else{

				//$this->request->allowMethod('post', 'delete');
				$this->News->id = $id;
				//if ($this->News->delete()) {
				if ($this->News->saveField('status', 1)){
					$this->Session->setFlash(__('News approved successfully.'), 'default', array('class' => 'success'));
				} else {
					$this->Session->setFlash(__('The news could not be approved. Please, try again.'));
				}
				return $this->redirect($this->referer());
				//return $this->redirect(array('action' => 'approve'));

			}
		}


	} // **************** end of approve() **********************************


	public function reActivate( $id = null){
		
		if (!$id) {

			$paginate = array('limit' => 2, 'conditions' => array('News.status' => 2), 'recursive' =>0);
			$this->Paginator->settings = $paginate;
			$this->set('news', $this->Paginator->paginate());
		}else {

			$this->News->id = $id;
			if (!$this->News->exists()) {
				throw new NotFoundException(__('Invalid News'));
			}

			if ($this->Auth->user('group_id') != 2) {  // not an admin.
				$this->Session->setFlash(__('You are not allowed to Re-activate this particular news.'));
				$this->redirect($this->referer());
			}else{

				//$this->request->allowMethod('post', 'delete');
				$this->News->id = $id;
				//if ($this->News->delete()) {
				if ($this->News->saveField('status', 1)){
					$this->Session->setFlash(__('News Re-activated successfully.'), 'default', array('class' => 'success'));
				} else {
					$this->Session->setFlash(__('The news could not be re-activated. Please, try again.'));
				}
				return $this->redirect($this->referer());
				//return $this->redirect(array('action' => 'reActivate'));

			}
		}

	} // ******************* end of reActivate() **************************************
	
	
	public function latestNews(){
		
		$this->loadModel('SiteConstant');
		$pageLimit = $this->SiteConstant->field('value', array('SiteConstant.siteconstant' => 'PAGE_LIMIT'));
		$pageLimit =1;
		
		$paginate = array('limit' => $pageLimit, 'conditions' => array('status'=>1), 'order' => 'created DESC', 'recursive' => -1);
		$this->Paginator->settings = $paginate;
		
		$this->set('latestNews', $this->Paginator->paginate());
		
	}





} // ************************ end of NewsController ***********************************
