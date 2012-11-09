<?php
App::uses('AppController', 'Controller');
App::uses('Category', 'Model');
App::uses('KnowhowTransaction', 'Model');
App::uses('Knowhow', 'Model');


class Test2Controller extends AppController {

public function index (){

		$this->loadModel('Category');
		$this->loadModel('KnowhowTransaction');
		$cat = $this->Category->find('list', array(
		'fields' => array('id','cat_name'),				
		)

		
		);
//				$k = $this->request->data[''];

//		$selectedCategories = $this->request->data['Knowhow']['Type'][];
/*		
$selectedIds = array(); 
foreach($this->request->data['Knowhow'] as $primary_key_id => $is_checked) {
	debug('pkey=' . $primary_key_id . ' checked=' . $is_checked );
if ($is_checked['id']) { 
$selectedIds = $primary_key_id; 
} 
} 
*/
if ($this->request->isPost()) {

} else {
   // $this->request->data['Knowhow']['Category'] = '';
}
		$this->set('catts', $this->request->data);
//		$this->set('catts', 'yimsp');
		//		$this->set('kk', $k);
		$this->set('cats', $cat);
		$this->set('token', Inflector::tableize('Knowhow'));
}

public function add(){
//	$selectedCategories = $this->request->data['Knowhow']['Category'];
		$this->loadModel('KnowhowTransaction');
		$this->KnowhowTransaction->read(null,1);
		$this->KnowhowTransaction->set();
		$this->KnowhowTransaction->save();
}
}







