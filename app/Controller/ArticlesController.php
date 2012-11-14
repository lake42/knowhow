<?php
App::uses('AppController', 'Controller');
App::uses('Category','Model');
App::uses('KnowhowTransaction', 'Model');
/**
 * Articles Controller
 *
 * @property Article $Article
 */
class ArticlesController extends AppController {

public $components = array('Acl');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Article->recursive = 0;
		$this->set('articles', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->loadModel('Category');
	//	$this->loadModel('Article');
		$this->loadModel('KnowhowTransaction');

		$audit = $this->KnowhowTransaction->getKnowCatJoin($id);
		$this->set('list', $audit);


		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		$this->set('article', $this->Article->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->loadModel('Category');
		$this->loadModel('KnowhowTransaction');
		
		// get category list for the dropdown menu
		$cats = $this->Category->getCatList();
		$this->set('cats', $cats);

		//check to see if we are posting, then ..
		if ($this->request->is('post')) {
			$this->Article->create();
			if ($this->Article->save($this->request->data)) {
			$tell = $this->request->data['Article']['type'];

			foreach($tell as $y => $g){
				$this->Transaction->create();
				$this->Transaction->set('article_id',$this->Article->getInsertId());
				$this->Transaction->set('cat_id',$g);
				$this->Transaction->save();
			}

				$this->Session->setFlash(__('This new knowledge has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The knowhow could not be saved. Please, try again.'));
			}
		}
	}



///	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Article->save($this->request->data)) {
				$this->Session->setFlash(__('The article has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The article could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Article->read(null, $id);
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
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException(__('Invalid article'));
		}
		if ($this->Article->delete()) {
			$this->Session->setFlash(__('Article deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Article was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
