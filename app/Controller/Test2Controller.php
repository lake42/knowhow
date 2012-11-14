<?php
App::uses('AppController', 'Controller', 'Category', 'Model', 'KnowhowTransaction', 'Model', 'Article', 'Model', 'linkable', 'Model/Behavior');
App::uses()

class Test2Controller extends AppController {

	public function index (){
			$this->loadModel('Category');
			$this->loadModel('Article');
			$this->loadModel('KnowhowTransaction');

			any_action();
	
			$categories = $this->Category->getCatList();
			$this->set('categories', $categories);
			
			$article = $this->Article->getArticle(2);
			$this->set('article', $article);

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

function any_action() {
    $aro = $this->Acl->Aro;

    // Here's all of our group info in an array we can iterate through
    $groups = array(
        0 => array(
            'alias' => 'warriors'
        ),
        1 => array(
            'alias' => 'wizards'
        ),
        2 => array(
            'alias' => 'hobbits'
        ),
        3 => array(
            'alias' => 'visitors'
        ),
    );

    // Iterate and create ARO groups
    foreach ($groups as $data) {
        // Remember to call create() when saving in loops...
        $aro->create();

        // Save data
        $aro->save($data);
    }

    // Other action logic goes here...
}







