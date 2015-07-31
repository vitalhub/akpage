<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'php-excel-reader/excel_reader2'); //import statement
/**
 * States Controller
 *
 * @property State $State
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
*/
class StatesController extends AppController {

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator', 'Session');

	public function beforeFilter(){
		parent::beforeFilter();

		//$this->Auth->allow('index', 'excelUploadStates');

	}


	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->State->recursive = 0;
		$this->set('states', $this->Paginator->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this->State->exists($id)) {
			throw new NotFoundException(__('Invalid state'));
		}
		$options = array('conditions' => array('State.' . $this->State->primaryKey => $id));
		$this->set('state', $this->State->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is('post')) {
			$this->State->create();
			if ($this->State->save($this->request->data)) {
				$this->Session->setFlash(__('The state has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The state could not be saved. Please, try again.'));
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
		if (!$this->State->exists($id)) {
			throw new NotFoundException(__('Invalid state'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->State->save($this->request->data)) {
				$this->Session->setFlash(__('The state has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The state could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('State.' . $this->State->primaryKey => $id));
			$this->request->data = $this->State->find('first', $options);
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
		$this->State->id = $id;
		if (!$this->State->exists()) {
			throw new NotFoundException(__('Invalid state'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->State->delete()) {
			$this->Session->setFlash(__('The state has been deleted.'));
		} else {
			$this->Session->setFlash(__('The state could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	public function excelUploadStates() {

		//$this->layout = "defaultSearch";
		if ($this->request->is('post')) {

			/* echo "<pre>";
			 print_r($this->request->data);
			exit; */

			$excelData = $this->request->data['State'];
			if(!$excelData['excelFile']['error']){

					
				$data = new Spreadsheet_Excel_Reader($excelData['excelFile']['tmp_name'], true);
				$temp = $data->dumptoarray();
				//$this->log($temp, 'debug');
				/* echo "<pre>";
				print_r($temp);
				exit; */

				foreach ($temp as $row) {

					if ($row['1'] == 'id') {
						continue;
					}

					/* echo "<pre>";
					 print_r($row);
					exit; */

					$row['id'] = $row['1'];
					$row['state'] = $row['2'];
					
					$rowId = $this->State->field('id', array('State.state' => $row['state']));

					if ($rowId) {
						$this->State->id = $rowId;
						$this->State->save($row);
					}else {

						$this->State->create();
						$this->State->save($row);

					}

				}

				$this->Session->setFlash("Excel file uploaded Successfully");
				$this->redirect($this->referer());

			}

		}

	} // ******************** end of excelUploadStates() ************************************



} // ***************** end of StatesController() **********************************
