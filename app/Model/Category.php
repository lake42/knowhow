<?php
App::uses('AppModel', 'Model');

/**
 * Category Model
 *
 * @property Category $CatsCap
 */
class Category extends AppModel {

    public $name = 'Category';
	//public $actsAs = array('Containable');
	public $primaryKey = 'id';
 	public $hasMany = array(

		'KnowhowTransaction' => array(
			'className' => 'KnowhowTransaction',
			'foreignKey' => 'cid',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);
/*
	public $hasMany = array(
		'Article' =>array(
			'classname' => 'Article',
			'foreignKey' => 'id'
		)

*/
		
//	);

	// We specify the join table here because Cake would expect the table to be called genres_movies from this side
/*
	$hasAndBelongsToMany = array( 'Knowhow' => 
								array( 'className' => 'Knowhow',
	                                   'joinTable' => 'knowhow_transactions'
	                                               
	                                 )
	                              );


*/
public function getCatList(){
		$cat = $this->find('list', array(
		'fields' => array('cat_name'),				
		));
		return $cat;
	}
}
