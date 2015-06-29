<?php
App::uses('AppController', 'Controller');
/**
 * Refers Controller
 *
 * @property Refer $Refer
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
*/
class RefersController extends AppController {

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator', 'Session');


	public function beforeFilter(){
		parent::beforeFilter();
		//$this->Auth->allow('index','view', 'add', 'edit', 'delete');
		$this->Auth->allow('add');

	}


	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->Refer->recursive = 0;
		$this->set('refers', $this->Paginator->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this->Refer->exists($id)) {
			throw new NotFoundException(__('Invalid refer'));
		}
		$options = array('conditions' => array('Refer.' . $this->Refer->primaryKey => $id));
		$this->set('refer', $this->Refer->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		
		if ($this->request->is('post')) {

			foreach ($this->request->data['Refer'] as $key => $value) {
							
					$this->request->data['Refer'][$key] = strip_tags($this->request->data['Refer'][$key]);
					$this->request->data['Refer'][$key] = trim($this->request->data['Refer'][$key]);
			
					$this->request->data['Refer'][$key] = preg_replace("/[\r\n]+/", "\n", $this->request->data['Refer'][$key]);
					$this->request->data['Refer'][$key] = preg_replace("/\s+/", " ", $this->request->data['Refer'][$key]);
									
			}
							
			if (isset($this->request->data['Refer']['referrerEmail'])) {
				if (!filter_var($this->request->data['Refer']['referrerEmail'], FILTER_VALIDATE_EMAIL)) {
					$this->Refer->invalidate('referrerEmail', __('Provide Valid Email Only'));
					return false;
				}
			}			
				
			if (!filter_var($this->request->data['Refer']['referredEmail'], FILTER_VALIDATE_EMAIL)) {
				$this->Refer->invalidate('referredEmail', __('Provide Valid Email Only'));
				return false;
			}
				
			/* echo "<pre>";
			print_r($this->request->data);
			exit; */
			
			if ($this->Session->read('Auth.User.id')) {
				$this->request->data['Refer']['referrerEmail'] = $this->Session->read('Auth.User.email');				
			}
			
			$referredId = $this->Refer->field('id', array('Refer.referredEmail' => $this->request->data['Refer']['referredEmail']));
			if ($referredId) {
				$this->Refer->invalidate('referredEmail', __('Email Already Refered. Please Provide Another.'));
				return false;
			}

			$this->Refer->create();
			
			if ($this->Refer->save($this->request->data)) {
				$this->Session->setFlash(__("Thank You For Your Reference"), 'default', array('class' => 'success'));
				$this->redirect(array('controller' => 'users', 'action' => 'home'));
			}else {
				$this->Session->setFlash(__("Problem Occured While Submitting Your Reference. Please Try Again."));
				$this->redirect($this->referer());

			}
				
		}
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		if (!$this->Refer->exists($id)) {
			throw new NotFoundException(__('Invalid refer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Refer->save($this->request->data)) {
				$this->Session->setFlash(__('The refer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The refer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Refer.' . $this->Refer->primaryKey => $id));
			$this->request->data = $this->Refer->find('first', $options);
		}
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		$this->Refer->id = $id;
		if (!$this->Refer->exists()) {
			throw new NotFoundException(__('Invalid refer'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Refer->delete()) {
			$this->Session->setFlash(__('The refer has been deleted.'));
		} else {
			$this->Session->setFlash(__('The refer could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
