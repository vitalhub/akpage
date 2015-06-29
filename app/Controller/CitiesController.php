<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'php-excel-reader/excel_reader2'); //import statement
/**
 * Cities Controller
 *
 * @property City $City
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
*/
class CitiesController extends AppController {

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator', 'Session');


	public function beforeFilter(){
		parent::beforeFilter();

		//$this->Auth->allow('index', 'excelUploadCities');

	}



	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->City->recursive = 0;
		$this->set('cities', $this->Paginator->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this->City->exists($id)) {
			throw new NotFoundException(__('Invalid city'));
		}
		$options = array('conditions' => array('City.' . $this->City->primaryKey => $id));
		$this->set('city', $this->City->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is('post')) {
			$this->City->create();
			if ($this->City->save($this->request->data)) {
				$this->Session->setFlash(__('The city has been saved.'), 'default', array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The city could not be saved. Please, try again.'));
			}
		}
		$states = $this->City->State->find('list');
		$this->set(compact('states'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		if (!$this->City->exists($id)) {
			throw new NotFoundException(__('Invalid city'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->City->save($this->request->data)) {
				$this->Session->setFlash(__('The city has been updated.'), 'default', array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The city could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('City.' . $this->City->primaryKey => $id));
			$this->request->data = $this->City->find('first', $options);
		}
		$states = $this->City->State->find('list');
		$this->set(compact('states'));
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		$this->City->id = $id;
		if (!$this->City->exists()) {
			throw new NotFoundException(__('Invalid city'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->City->delete()) {
			$this->Session->setFlash(__('The city has been deleted.'), 'default', array('class' => 'success'));
		} else {
			$this->Session->setFlash(__('The city could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	public function excelUploadCities() {

		//$this->layout = "defaultSearch";
		if ($this->request->is('post')) {

			/* echo "<pre>";
			 print_r($this->request->data);
			exit; */

			$excelData = $this->request->data['City'];
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
					$row['city'] = $row['2'];
					$row['state_id'] = $row['3'];
						
					$rowId = $this->City->field('id', array('City.city' => $row['city'], 'City.state_id' => $row['state_id']));

					if ($rowId) {
						$this->City->id = $rowId;
						$this->City->save($row);
					}else {

						$this->City->create();
						$this->City->save($row);

					}

				}

				$this->Session->setFlash(__("Excel file uploaded Successfully"), 'default', array('class' => 'success'));
				$this->redirect($this->referer());

			}

		}

	} // ******************** end of excelUploadCities() ************************************


} // ****************** end of CitiesController() *******************************
