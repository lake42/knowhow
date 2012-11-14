<?php
App::uses('AppModel', 'Model');
/**
 * Article Model
 *
 * @property Transaction $Transaction
 */
class Article extends AppModel {

//var $name = "Article";
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */

	public $actsAs = array('Containable');
	public $primaryKey = 'id';
	public $hasMany = array(
		'KnowhowTransaction' => array(
			'className' => 'KnowhowTransaction',
			'foreignKey' => 'kid',
			'dependent' => false
		),
			'Category' => array(
			'foreignKey' => 'id',
		)
	);

	//);

	public $belongsTo = array(
		'Category' => array(
	//		'fields' => array('cat_name', 'id'),
			'foreignKey' => 'id',
		//	'dependent' => false,
		//	'associationForeignKey' => 'cid',
	
			)
	);



	public function getArticle($id){
		$listingA = $this->find('all', array(
			/*
			'joins' => array(
				array(
				'table' => 'knowhow_transactions',
				'type' => '',
				'foreignKey' => false,
				'conditions' => array('knowhow_transactions.kid' => $id)
				),
				array(
				'table' => 'categories',
				'type' => '',
				'foreignKey' => false,
				'conditions' => array('categories.id' => 'knowhow_transactions.cid')

			)

			)
			));
			*/
			 'conditions' => array('Article.id' => $id),
			'fields' => array('id','title', 'content', 'code', 'slug'),
			//'link' => array('KnowhowTransaction','Category') 
			//'conditions' => array('kid' => $id )
			//));
			
			'contain' => array(
				'KnowhowTransaction' => array(
					'conditions' => array('KnowhowTransaction.kid' => 'Article.id' ),
					'fields' => array('id','kid', 'cid')
				),
				'Category' => array(
					'conditions' => array( 'Category.id' => 'KnowhowTransaction.cid'),
				//	'conditions' => array('Category.id' => $id),
					 'fields' => array('id','cat_name')
				)
			)
		));

		
		return $listingA;
	}
}
