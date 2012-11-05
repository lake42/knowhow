<?php
App::uses('AppController', 'Controller');
App::uses('Category','Model');
App::uses('KnowhowTransaction', 'Model');


/**
 * Knowhows Controller
 *
 * @property Knowhow $Knowhow
 */
class KnowhowsController extends AppController {

		
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Knowhow->recursive = 0;
		/*
		
		$cats = $this->Category->findAll();
		$this->set('cats', $cats);
		*/
		$this->set('knowhows', $this->paginate());

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
		//	$this->set('vard',$this->request->data['Knowhow']['Category']);


		$cats = $this->Category->find('list', array(
		'fields' => array('id','cat_name'),				
		));


		$this->set('cats', $cats);
/*		
	while () {
		$this->KnowhowTransaction->read(null,1);
		
		$this->KnowhowTransaction->set('kid','5');
		$this->KnowhowTransaction->set('cid','2');
		$this->KnowhowTransaction->save();
		}
*/

		if ($this->request->is('post')) {
			$this->Knowhow->create();
			if ($this->Knowhow->save($this->request->data)) {
			$tell = $this->request->data['Knowhow']['Category'];
			//var vard;
			$this->set('vard',$tell);

//			if ($this->request->data['Knowhow']['Category']){
//	while ($this->request->data['Knowhow']['Category']) {
		$this->KnowhowTransaction->create();
		$this->KnowhowTransaction->set('kid',$this->Knowhow->getInsertId());
		$this->KnowhowTransaction->set('cid',$this->request->data['Knowhow']['Category']);
		$this->KnowhowTransaction->save();
//		}
//		}

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
