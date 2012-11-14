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
		$t = $this->params['form'];
		$this->set('knowhows', $this->paginate());
		$this->set('tell', $t);
		
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
		$this->loadModel('Category');
		$this->loadModel('KnowhowTransaction');
		if (!$this->Knowhow->exists()) {
			throw new NotFoundException(__('Invalid knowhow'));
		}
		$this->set('knowhow', $this->Knowhow->read(null, $id));

		$markers = $this->Knowhow->query('SELECT `*` FROM `knowhows`
inner join `knowhow_transactions` on `knowhow_transactions.kid` = `knowhows.id`
inner join `categories` on `categories.id` = `knowhow_transactions.cid`');
		/*
		$markers = $this->Knowhow->find('all', 
			array('joins' => array( 
		        array( 
		            'table' => 'knowhow_transactions', 
		            'alias' => 'knowhowx', 
		            'type' => 'inner', 
		            'foreignKey' => false, 
		            'conditions'=> array('knowhowx.kid =' . $id) 
		        ), 
		        array( 
		            'table' => 'categories', 
		            'alias' => 'categoriesX', 
		            'type' => 'inner', 
		            'foreignKey' => false, 
		            'conditions'=> array('categoriesX.id =' . $id) 
        		) 
    		), 'fields' => array('categoriesX.cat_name'),

    	*/	

    	//return $markers;	

			 

		$this->set('catlist', $markers);
	
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
		$cats = $this->Category->getCatList();
		// sending this to the view
		$this->set('cats', $cats);
		//we got the data - now put into the database
		if ($this->request->is('post')) {
			$this->Knowhow->create();
			if ($this->Knowhow->save($this->request->data)) {
			$tell = $this->request->data['Knowhow']['type'];

			foreach($tell as $y => $g){
				$this->KnowhowTransaction->create();
				$this->KnowhowTransaction->set('kid',$this->Knowhow->getInsertId());
				$this->KnowhowTransaction->set('cid',$g);
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

	public function getCatList($id){
		$this->loadModel('Category');
		$this->loadModel('KnowhowTransaction');

		$markers = $this->Knowhow->find('all', 
			array('joins' => array( 
		        array( 
		            'table' => 'knowhow_transaction', 
		            'alias' => '', 
		            'type' => 'inner', 
		            'foreignKey' => false, 
		            'conditions'=> array('knowhow_transactions.kid = knowhows.id') 
		        ), 
		        array( 
		            'table' => 'categories', 
		            'alias' => '', 
		            'type' => 'inner', 
		            'foreignKey' => false, 
		            'conditions'=> array('categories.id = knowhow_transactions.cid') 
        		) 
    		), 'fields' => array('categories.cat_name'),

    		)

    	//return $markers;	

			); 

		$this->set('markers', $markers);	


	}

}
