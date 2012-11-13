<?php
App::uses('AppModel', 'Model');
/**
 * KnowhowTransaction Model
 *
 */
class KnowhowTransaction extends AppModel {

	 var $name = "KnowhowTransaction";

	public $actsAs = array('Containable');

	public $hasMany = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'id',
			'dependent' => false,
			'conditions' => '',
			'fields' => array('cat_name'),
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	public function getKnowCatJoin($id){
			$listing = $this->find('all', array(
			'conditions' => array('KnowhowTransaction.kid' => $id),
			//'fields' => array('id','title', 'content', 'code', 'slug'),
			'contain' => array(
				'Category' => array(
					'conditions' => array( 'Category.id' => 'KnowhowTransaction.cid'),
					'fields' => array('cat_name')
				)
			)
		));
		return $listing;
	}


	
}
