<?php
App::uses('AppController', 'Controller');
App::uses('Category','Model');
App::uses('Transaction', 'Model');
App::uses('Knowhow', 'Model');



/**
 * Knowhows Controller
 *
 * @property Knowhow $Knowhow
 */
class TransactionsController extends AppController {
		
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Transaction->recursive = 0;
		$this->set('transactions', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Knowhow->id = $id;
		if (!$this->Knowhow->exists()) {
			throw new NotFoundException(__('Invalid knowhow'));
		}
		$this->set('knowhow', $this->Knowhow->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->loadModel('Category');
		$this->loadModel('KnowhowTransaction');
		$this->set('knowhows', $this->paginate());
		// getting the category values to build the dropdown
		$cats = $this->Category->find('list', array(
		'fields' => array('id','cat_name'),				
		));
		// sending this to the view
		$this->set('cats', $cats);
		//we got the data - now put into the database
		if ($this->request->is('post')) {
			$this->Knowhow->create();
			if ($this->Knowhow->save($this->request->data)) {
			$tell = $this->request->data['Knowhow']['type'];

			foreach($tell as $y => $g){
				$this->KnowhowTransaction->create();
				$this->KnowhowTransaction->set('article_id',$this->Knowhow->getInsertId());
				$this->KnowhowTransaction->set('cat_id',$g);
				$this->KnowhowTransaction->save();
			}

				$this->Session->setFlash(__('This new knowledge has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The knowhow could not be saved. Please, try again.'));
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
		$this->Knowhow->id = $id;
		if (!$this->Knowhow->exists()) {
			throw new NotFoundException(__('Invalid knowhow'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Knowhow->save($this->request->data)) {
				
				$this->Session->setFlash(__('The knowhow has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The knowhow could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Knowhow->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->loadModel('KnowhowTransaction');
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Knowhow->id = $id;
		if (!$this->Knowhow->exists()) {
			throw new NotFoundException(__('Invalid knowhow'));
		}
		if ($this->Knowhow->delete()) {
			$this->Session->setFlash(__('Knowhow deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Knowhow was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
