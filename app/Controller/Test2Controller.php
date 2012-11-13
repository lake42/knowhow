<?php
App::uses('AppController', 'Controller');
App::uses('Category', 'Model');
App::uses('KnowhowTransaction', 'Model');
App::uses('Knowhow', 'Model');
App::uses('Article', 'Model');



class Test2Controller extends AppController {

	public function index (){
			$this->loadModel('Article');
			$this->loadModel('Category');
			$this->loadModel('KnowhowTransaction');
			
			$categories = $this->Category->getCatList();
			$this->set('categories', $categories);
			
			$article = $this->Article->getArticle(3);
			$this->set('art', $article);

			$audit = $this->KnowhowTransaction->getKnowCatJoin(3);
			$this->set('list', $audit);

			if ($this->request->isPost()) {

			} else {}
				$this->set('catts', $this->request->data);
				$this->set('token', Inflector::tableize('Knowhow'));
	}

	public function add(){
			$this->loadModel('KnowhowTransaction');
			$this->KnowhowTransaction->read(null,1);
			$this->KnowhowTransaction->set();
			$this->KnowhowTransaction->save();
	}
}







