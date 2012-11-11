<?php
App::uses('AppModel', 'Model');
/**
 * Knowhow Model
 *
 */
class Knowhow extends AppModel {
	
	//var $name ='Knowhow';

		public $hasMany = array(
			'Category' => array(
					'classname' => 'Category',
				)
		);
			
		public $validate = array(
		'content' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'slug' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

}

