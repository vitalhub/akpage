<?php
App::uses('AppController', 'Controller');
App::import('controller', 'blogPostComments');
/**
 * BlogPosts Controller
 *
 * @property BlogPost $BlogPost
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
*/
class BlogPostsController extends AppController {

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator', 'Session');


	public function beforeFilter(){

		parent::beforeFilter();
		$this->Auth->allow('latestPosts', 'view');
		//$this->Auth->allow('myPosts', 'index', 'add', 'edit', 'delete');
	}

	public function beforeRender(){
		parent::beforeRender();
		$this->layout = 'blog';
	}


	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {

		$this->BlogPost->recursive = 0;
		$this->set('blogPosts', $this->Paginator->paginate());
	}

	public function latestPosts(){

		$this->loadModel('SiteConstant');
		$pageLimit = $this->SiteConstant->field('value', array('SiteConstant.siteconstant' => 'PAGE_LIMIT'));

		$paginate = array('limit' => $pageLimit, 'conditions' => array('ACTIVE'=>1), 'order' => 'createdOn DESC', 'recursive' => 2);
		$this->Paginator->settings = $paginate;

		$this->set('latestPosts', $this->Paginator->paginate());
	}

	public function myPosts(){

		$this->loadModel('SiteConstant');
		$pageLimit = $this->SiteConstant->field('value', array('SiteConstant.siteconstant' => 'PAGE_LIMIT'));

		$paginate = array('limit' => $pageLimit, 'conditions' => array('ACTIVE' => 1, 'createdBy' => $this->Session->read('Auth.User.id')), 'order' => 'createdOn DESC', 'recursive' => -1);
		$this->Paginator->settings = $paginate;

		$this->set('myPosts', $this->Paginator->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this->BlogPost->exists($id)) {
			throw new NotFoundException(__('Invalid blog post'));
		}
		$options = array('conditions' => array('BlogPost.' . $this->BlogPost->primaryKey => $id), 'recursive' => 2);
		$blogPost = $this->BlogPost->find('first', $options);
		$this->set('blogPost', $blogPost);
		$this->set('blogPostId', $id);
		
		$blogPostComments = new BlogPostCommentsController();
		$comments = $blogPostComments->blogPostComments( $id );
		
		$this->set('comments', $comments);
		
		
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {

		if (!$this->Session->read('Auth.User.id')) {
			$this->Session->setFlash(__("Please Login To Akpage For Uploading In To AkBlog"));
			$this->redirect(array('controller' => 'users', 'action' => 'login'));
		}

		if ($this->request->is('post')) {
			
			/* echo "<pre>";
			print_r($this->request->data);
			exit; */
			
			if (!$this->request->data['BlogPost']['content']) {
				$this->BlogPost->invalidate('content', __("Content Should Not Be Empty."));
				return false;
			}

			$oldPost = $this->BlogPost->field('id', array('BlogPost.title' => $this->request->data['BlogPost']['title']));
			if ($oldPost) {
				$this->BlogPost->invalidate('title', __("Post With This Title Already Posted. Please Change The Title"));
				return false;
			}

			date_default_timezone_set('Asia/Calcutta');
			$time=date('Y-m-d H:i:s');
			$this->request->data['BlogPost']['createdOn'] = $time;
			$this->request->data['BlogPost']['createdBy'] = $this->Session->read('Auth.User.id');

			if ($this->request->data['BlogPost']['picture']['error'] <= 0) {

				$img = $this->Session->read('Auth.User.id')."-".$this->request->data['BlogPost']['picture']['name'];

				if (file_exists("../webroot/uploads/images/blogPosts/" .$img)){
					$filepath=$img;
				}else{

					move_uploaded_file($this->request->data['BlogPost']['picture']['tmp_name'], "../webroot/uploads/images/blogPosts/" .$img);
					$filepath=$img;
					chmod("../webroot/uploads/images/blogPosts/".$filepath,0777);
				}

				$this->request->data['BlogPost']['picture'] = $filepath;

			}else {
				unset($this->request->data['BlogPost']['picture']);
			}

			/* echo "<pre>";
			 print_r($this->request->data);
			exit; */

			/* if ($this->Auth->user('group_id') == 2) {
				$this->request->data['BlogPost']['status'] = 1;
			} */

			$this->BlogPost->create();
			if ($this->BlogPost->save($this->request->data)) {
				$this->Session->setFlash(__('The Post Has Been Saved.'), 'default', array('class' => 'success'));
				return $this->redirect(array('action' => 'latestPosts'));
			} else {
				$this->Session->setFlash(__('The Post Could Not Be Saved. Please, Try Again.'));
			}
		}
		//$users = $this->BlogPost->User->find('list');
		//$this->set(compact('users'));

	} // ********************* end of add() *********************************

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		$options = array('conditions' => array('BlogPost.id' => $id), 'fields' => array('title', 'picture', 'ACTIVE'), 'recursive' => -1 );
		$blogPostData = $this->BlogPost->find('first', $options);
		if (!$blogPostData) {
			throw new NotFoundException(__('Invalid Blog Post'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			if (!$this->request->data['BlogPost']['content']) {
				$this->BlogPost->invalidate('content', __("Content Should Not Be Empty."));
				return false;
			}
			
			if ($this->request->data['BlogPost']['title'] != $blogPostData['BlogPost']['title']) {
				$oldBlog = $this->BlogPost->field('id', array('title' => $this->request->data['BlogPost']['title']));
				if ($oldBlog) {
					$this->BlogPost->invalidate('title', __("Title Already Exits. Provide Another Title."));
					return false;
				}
			}
			
			
			date_default_timezone_set('Asia/Calcutta');
			$time=date('Y-m-d H:i:s');
			$this->request->data['BlogPost']['modifiedOn'] = $time;
			$this->request->data['BlogPost']['modifiedBy'] = $this->Session->read('Auth.User.id');

			if ($this->request->data['BlogPost']['picture']['error']) {
				unset($this->request->data['BlogPost']['picture']);
			}else {

				$img = $this->Session->read('Auth.User.id')."-".$this->request->data['BlogPost']['picture']['name'];

				if (file_exists("../webroot/uploads/images/blogPosts/" .$img)){
					$filepath=$img;
				}else{

					move_uploaded_file($this->request->data['BlogPost']['picture']['tmp_name'], "../webroot/uploads/images/blogPosts/" .$img);
					$filepath=$img;
					chmod("../webroot/uploads/images/blogPosts/".$filepath,0777);
					unlink("../webroot/uploads/images/blogPosts/".$blogPostData['BlogPost']['picture']);
				}

				$this->request->data['BlogPost']['picture'] = $filepath;

			}
			//unset($this->request->data['BlogPost']['created']);
			$this->BlogPost->id = $id;
			if ($this->BlogPost->save($this->request->data)) {
				$this->Session->setFlash(__('The Blog Post has been updated successfully.'), 'default', array('class' => 'success'));
				return $this->redirect(array('controller' => 'blogPosts', 'action' => 'myPosts'));
				//return $this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('The Blog Post could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BlogPost.' . $this->BlogPost->primaryKey => $id));
			$this->request->data = $this->BlogPost->find('first', $options);
		}

	} // ********************** end() **************************************

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		
		$this->BlogPost->id = $id;		
		$options = array('conditions' => array('BlogPost.' . $this->BlogPost->primaryKey => $id),'recursive'=>-1);
		$blogData = $this->BlogPost->find('first', $options);

		if (!$blogData) {
			throw new NotFoundException(__('Invalid BlogPost'));
		}

		if ($this->Auth->user('group_id') != 2) {  // not an admin.
			if (($this->Session->read('Auth.User.id') != $blogData['BlogPost']['createdBy'])) {
				$this->Session->setFlash(__('You are not allowed to Re-activate this particular Blog Post.'));
				$this->redirect($this->referer());
			}
		}

		$this->BlogPost->id = $id;
		if ($this->BlogPost->delete()) {
		//if ($this->BlogPost->saveField('ACTIVE', 2)){
		
			unlink("../webroot/uploads/images/blogPosts/". $blogData['BlogPost']['picture']);
			
			$this->Session->setFlash(__('Blog Post Deleted successfully.'), 'default', array('class' => 'success'));
		} else {
			$this->Session->setFlash(__('The Blog Post could not be deleted. Please, try again.'));
		}
		return $this->redirect($this->referer());

	}



} // ***************** end of BlogPostController() **************************
