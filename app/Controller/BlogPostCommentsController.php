<?php
App::uses('AppController', 'Controller');
/**
 * BlogPostComments Controller
 *
 * @property BlogPostComment $BlogPostComment
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BlogPostCommentsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('blogPostComments');
		//$this->Auth->allow('index', 'add', 'edit', 'view', 'delete');
	
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BlogPostComment->recursive = 0;
		$this->set('blogPostComments', $this->Paginator->paginate());
	}
	
	public function blogPostComments( $blogPostId = null ){
	
		/* $this->loadModel('SiteConstant');
		$pageLimit = $this->SiteConstant->field('value', array('SiteConstant.siteconstant' => 'PAGE_LIMIT'));
	
		$paginate = array('limit' => $pageLimit, 'conditions' => array('ACTIVE' => 1, 'blogPost_id' => $blogPostId), 'order' => 'createdOn DESC', 'recursive' => 0);
		$this->Paginator->settings = $paginate; */
		
		$postComments = $this->BlogPostComment->find('all', array('conditions' => array('BlogPostComment.blogPost_id' => $blogPostId, 'BlogPostComment.ACTIVE' => 1), 'order' => array('commentedOn DESC'), 'recursive' => 2));
			
		return $postComments;		
		//$this->set('comments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BlogPostComment->exists($id)) {
			throw new NotFoundException(__('Invalid blog post comment'));
		}
		$options = array('conditions' => array('BlogPostComment.' . $this->BlogPostComment->primaryKey => $id));
		$this->set('blogPostComment', $this->BlogPostComment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add( $blogPostId = null ) {
				
		if (!$this->Session->read('Auth.User.id')) {
			$this->Session->setFlash(__("Please Login To Akpage To Comment"));
			$this->redirect(array('controller' => 'users', 'action' => 'login'));
		}
		
		if (!$this->BlogPostComment->BlogPost->field('id', array('id' => $blogPostId))) {
			$this->Session->setFlash(__("Invalid Blog Post"));
			$this->redirect($this->referer());
		}
		
		if ($this->request->is('post')) {
				
			/* echo "<pre>";
			 print_r($this->request->data);
			exit; */
				
			if (!$this->request->data['BlogPostComment']['blogPostComment']) {
				$this->BlogPostComment->invalidate('blogPostComment', __("Comment Should Not Be Empty."));
				return false;
			}			
		
			date_default_timezone_set('Asia/Calcutta');
			$time=date('Y-m-d H:i:s');
			$this->request->data['BlogPostComment']['commentedOn'] = $time;
			$this->request->data['BlogPostComment']['commentedBy'] = $this->Session->read('Auth.User.id');
			
			$this->request->data['BlogPostComment']['blogPost_id'] = $blogPostId;
					
			/* echo "<pre>";
			 print_r($this->request->data);
			exit; */
		
			/* if ($this->Auth->user('group_id') == 2) {
			 $this->request->data['BlogPost']['status'] = 1;
			} */
		
			$this->BlogPostComment->create();
			if ($this->BlogPostComment->save($this->request->data)) {
				$this->Session->setFlash(__('Thank You For Your Comment'), 'default', array('class' => 'success'));
				return $this->redirect(array('controller' => 'blogPosts', 'action' => 'view', $blogPostId));
			} else {
				$this->Session->setFlash(__('The Comment Could Not Be Saved. Please, Try Again.'));
			}
		}
						
	} // ******************* End of add() **********************************

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BlogPostComment->exists($id)) {
			throw new NotFoundException(__('Invalid blog post comment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BlogPostComment->save($this->request->data)) {
				$this->Session->setFlash(__('The blog post comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The blog post comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BlogPostComment.' . $this->BlogPostComment->primaryKey => $id));
			$this->request->data = $this->BlogPostComment->find('first', $options);
		}
		$blogPosts = $this->BlogPostComment->BlogPost->find('list');
		$blogPostCommentCreaters = $this->BlogPostComment->BlogPostCommentCreater->find('list');
		$blogPostCommentModifiers = $this->BlogPostComment->BlogPostCommentModifier->find('list');
		$this->set(compact('blogPosts', 'blogPostCommentCreaters', 'blogPostCommentModifiers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->BlogPostComment->id = $id;
		if (!$this->BlogPostComment->exists()) {
			throw new NotFoundException(__('Invalid blog post comment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->BlogPostComment->delete()) {
			$this->Session->setFlash(__('The blog post comment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The blog post comment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
