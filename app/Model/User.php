<?php
App::uses('AppModel', 'Model');

class User extends AppModel {

	public $actsAs = array('Containable');
	public $primaryKey = 'id';
	public $belongsTo = array(
		'Profile' => array(
			'className' => 'Profile',
			'foreignKey' => 'id',
		}
	);	
	


}