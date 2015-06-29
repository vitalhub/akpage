<?php
App::uses('AppController', 'Controller');
/**
 * Feedback Controller
 *
 * @property Feedback $Feedback
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
*/
class FeedbacksController extends AppController {

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator', 'Session');


	/**
	 * index method
	 *
	 * @return void
	*/


	public function beforeFilter(){
		parent::beforeFilter();
		//$this->Auth->allow('index','view', 'add', 'edit', 'delete');
		$this->Auth->allow('add');

	}


	public function index() {
		$this->Feedback->recursive = 0;
		$this->set('feedback', $this->Paginator->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this->Feedback->exists($id)) {
			throw new NotFoundException(__('Invalid feedback'));
		}
		$options = array('conditions' => array('Feedback.' . $this->Feedback->primaryKey => $id));
		$this->set('feedback', $this->Feedback->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {

		if ($this->request->is(array('post', 'put'))){
				
			foreach ($this->request->data['Feedback'] as $key => $value) {
					
				if (in_array($key, array('name', 'email', 'otherComments', 'suggestions'))) {
					$this->request->data['Feedback'][$key] = strip_tags($this->request->data['Feedback'][$key]);
					$this->request->data['Feedback'][$key] = trim($this->request->data['Feedback'][$key]);

					$this->request->data['Feedback'][$key] = preg_replace("/[\r\n]+/", "\n", $this->request->data['Feedback'][$key]);
					$this->request->data['Feedback'][$key] = preg_replace("/\s+/", " ", $this->request->data['Feedback'][$key]);
				}
					
			}

			if (isset($this->request->data['Feedback']['name'])) {
				if ( !preg_match('/^[a-z ]+$/i', $this->request->data['Feedback']['name']) ) {
						
					$this->Feedback->invalidate('name', __('Characters only'));
					return  false;
						
				}
			}

			if (isset($this->request->data['Feedback']['otherComments'])) {
				if ( !preg_match('/^[a-z., ]{10,250}$/i', $this->request->data['Feedback']['otherComments']) ) {
					$this->Feedback->invalidate('otherComments', '10 to 250 Characters only.');
					return  false;

				}
			}
				
			if (isset($this->request->data['Feedback']['suggestions'])) {
				if ( !preg_match('/^[a-z., ]{10,250}$/i', $this->request->data['Feedback']['suggestions']) ) {
					$this->Feedback->invalidate('suggestions', '10 to 250 Characters only.');
					return  false;
						
				}
			}
				
				
			if ($this->Session->read('Auth.User.id')) {
				$this->request->data['Feedback']['name'] = $this->Session->read('Auth.User.AkpageUser.name'). " ". $this->Session->read('Auth.User.AkpageUser.surname');
				$this->request->data['Feedback']['email'] = $this->Session->read('Auth.User.email');
			}
				
			$feedbackId = $this->Feedback->field('id', array('Feedback.email' => $this->request->data['Feedback']['email']));
			if ($feedbackId) {
				$this->Feedback->invalidate('email', __('Feedback Already Submitted by This Email. Please Provide Another.'));
				return false;
			}
				
			$this->request->data['Feedback']['hearAkpage'] = json_encode($this->request->data['Feedback']['hearAkpage']);
				
				
			/* echo "<pre>";
			 print_r($this->request->data);
			exit;  */
				
			$this->Feedback->create();
			if ($this->Feedback->save($this->request->data)) {
				$this->Session->setFlash(__("Thank You For Your Feedback"), 'default', array('class' => 'success'));
				$this->redirect(array('controller' => 'users', 'action' => 'home'));
			}else {
				$this->Session->setFlash(__("Problem Occured While Submitting Your Feedback. Please Try Again."));
				$this->redirect($this->referer());

			}



		}


	} // ***************** end of add() ***************************************

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		if (!$this->Feedback->exists($id)) {
			throw new NotFoundException(__('Invalid feedback'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Feedback->save($this->request->data)) {
				$this->Session->setFlash(__('The feedback has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The feedback could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Feedback.' . $this->Feedback->primaryKey => $id));
			$this->request->data = $this->Feedback->find('first', $options);
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
		$this->Feedback->id = $id;
		if (!$this->Feedback->exists()) {
			throw new NotFoundException(__('Invalid feedback'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Feedback->delete()) {
			$this->Session->setFlash(__('The feedback has been deleted.'));
		} else {
			$this->Session->setFlash(__('The feedback could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
