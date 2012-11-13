<?php
App::uses('AppModel', 'Model');
/**
 * Article Model
 *
 * @property Transaction $Transaction
 */
class Article extends AppModel {

var $name = "Article";
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */

	public $actsAs = array('Containable');
	
	public $hasMany = array(
		'KnowhowTransaction' => array(
			'className' => 'KnowhowTransaction',
			'foreignKey' => '',
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
			'Category' => array(
			'classname' => 'Category',
			'foreignKey' => 'id',
			'dependent' => false
		)


	);

	public function getArticle($id){
		$listingA = $this->find('all', array(
			'conditions' => array('Article.id' => $id),
			'fields' => array('id','title', 'content', 'code', 'slug'),
			'contain' => array(
				'KnowhowTransaction' => array(
					'conditions' => array('KnowhowTransaction.kid' => $id),
					'fields' => array('id','kid', 'cid')
				),
				'Category' => array(
					'conditions' => array( 'Category.id' => 'cid'),
					'fields' => array('cat_name')
				)
			)
		));
		return $listingA;
	}
}
