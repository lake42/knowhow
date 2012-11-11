<?php
App::uses('AppModel', 'Model');
/**
 * KnowhowTransaction Model
 *
 */
class Transaction extends AppModel {

	var $name = 'Transaction';

		public $hasMany = array(
			'Category' => array(
					'classname' => 'Category',
					'foreignKey' => 'cat_id',
				),
			'Article' => array(
					'classname' => 'Article',
					'foreignKey' => 'article_id',
				)

		);
}
