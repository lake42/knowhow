<?php
App::uses('AppModel', 'Model');

class Profile extends AppModel {

	public $actsAs = array('Containable');
	public $primaryKey = 'id';
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'profile_id',
		}
	);	
	


}