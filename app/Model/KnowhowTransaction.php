<?php
App::uses('AppModel', 'Model');
/**
 * KnowhowTransaction Model
 *
 */
class KnowhowTransaction extends AppModel {

	var $name = "KnowhowTransaction";

	public $actsAs = array('Containable');
	public $primaryKey = 'cid';
	public $hasMany = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'id',
			'dependent' => false,
			'conditions' => '',
			'fields' => array('cat_name', 'id'),
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

//	public $belongsTo = array('Category');

	public function getKnowCatJoin($id){
			$listing = $this->find('all', array(
				'conditions' => array('kid' => $id),
				'fields' => array('id','cid','kid'),
				'contain' => array(
					'Category' => array(
						'conditions' => array('Category.id' => 'cid'),
						'fields' => array('cat_name')
						)
				)
			));
		//return $listing;
			
		//	$list = array();
		//	$limit = 4;
		//for($t=0; $t<=$limit; $t++){
		//	if($t == $limit-1){
	//	$list = array();
	//	foreach($listing as $r => $v)	{
	//		array_push($list, $r[$v]['Category'][$v]['cat_name']);
		//	} else {
		//	array_push($list, $listing[$t]['Category'][0]['cat_name'] . ',');
	//		}
		

		
	//	return $listing[0]['Category'][0]['cat_name'];
		return $listing;
	}


	
}
