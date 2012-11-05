<?php
App::uses('AppController', 'Controller');
App::uses('Category', 'Model');
App::uses('KnowhowTransaction', 'Model');

class Test2Controller extends AppController {

public function index (){

		$this->loadModel('Category');
		$this->loadModel('KnowhowTransaction');
		$cat = $this->Category->find('list', array(
		'fields' => array('id','cat_name'),				
		)
		
		
		
		);
//				$k = $this->request->data[''];

		
//		$this->set('kk', $k);
		$this->set('cats', $cat);
		$this->set('token',Inflector::tableize('Knowhow'));
}

public function add(){
		$this->loadModel('KnowhowTransaction');
		$this->KnowhowTransaction->read(null,1);
		$this->KnowhowTransaction->set();
		$this->KnowhowTransaction->save();
}





}