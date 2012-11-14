<?php
/*
 * Created on Mar 22, 2009
 *
 * @Author Eddie Webb
 * 
 * Set up basic ACL tables based on existing users
 * based on my readings of the book at cakephp.org 
 * 
 */
 class Test3Controller extends AppController {
 
	var $name = 'Aclprep';
	var $uses =array('User');
	var $components =array('Acl');
 
 function initAcl()
	{
		//FIRST
	/*
	 * creat tables by running cake schema run create DbAcl
	 */
 
 
 
	/*
	 * Define our main user groups, to keep it simpel i have users and admins
	 */	
	 //always declare an Aro object to create and save
		$aro = new Aro();
 
	//iterate through groups adding to aro table
	$groups = array(
		0 => array(
			'alias' => 'users'
		),
		1 => array(
			'alias' => 'administrators'
		),
	);
 
	//Iterate and create ARO groups
	foreach($groups as $data)
	{
		//Remember to call create() when saving in loops...
		$aro->create();
 
		//Save data
		$aro->save($data);
	}
 
 
	/*
	 * next we add our existing add users to users group
	 * ! adds all users to user group, you may add some logic to 
	 * ! detemrine admins based on role, or edit manually later
	 * 
	 * the   **whos**
	 */	
 
 
	$aro = new Aro();
 
 
		//pull users form existing user table
		$users=$this->User->find('list');
 
		debug($users);
 
 
		$i=0;
		foreach($users as $key=>$value){
			$aroList[$i++]=
				array(
					'alias' => $value,
					'parent_id' => 1,
					'model' => 'User',
					'foreign_key' => $key,
				);	
		}
 
		//print to screen to verify layout
		debug($aroList);
 
 
 
		//now save!
		foreach($aroList as $data)
		{
			//Remember to call create() when saving in loops...
			$aro->create();
 
			//Save data
			$aro->save($data);
		}
 
	/*
	 * now on to  *whats* can they access
	 * 
	 * for my layout I have the entire site as a parent, two sub groups that contain all models.
	 * 
	 */
 
 
		$aco = new Aco();
 
		//admin can access whole site
		$controllers = array(
			0 => array(
				'alias' => 'Entire_Site'
			),
		);
 
		//Iterate and create ARO groups
		foreach($controllers as $data)
		{
			//Remember to call create() when saving in loops...
			$aco->create();
 
			//Save data
			$aco->save($data);
		}
				$aco = new Aco();
 
		//users have different permissions on Main and Auxilary models
		$controllers = array(
			0 => array(
				'alias' => 'Main_Models',
				'parent_id'=> '1'
			),
			1 => array(
				'alias' => 'Aux_Models',
				'parent_id'=> '1'
			),
		);
 
		//Iterate and create ACO objects
		foreach($controllers as $data)
		{
			//Remember to call create() when saving in loops...
			$aco->create();
 
			//Save data
			$aco->save($data);
		}
 
 
 
	/* 
	 * now the more details ACOs and their parents (refer to tree in post above)
	 */
		$aco = new Aco();
 
		//Here's all of our sub-ACO info in an array we can iterate through
$controllers = array(
			0 => array(
				'alias' => 'Users',
					'model' => 'User',
				'parent_id' => 2,
			),
			1 => array(
				'alias' => 'Toolboxes',
					'model' => 'Toolbox',
				'parent_id' => 2,
			),
			2 => array(
				'alias' => 'Items',
					'model' => 'Item',
				'parent_id' => 2,
			),
			3 => array(
				'alias' => 'Actions',
					'model' => 'Action',
				'parent_id' => 3,
			),
			4 => array(
				'alias' => 'Priorities',
					'model' => 'Priority',
				'parent_id' => 3,
			),
			5 => array(
				'alias' => 'Settings',
					'model' => 'Setting',
				'parent_id' => 3,
			),
			6 => array(
				'alias' => 'Botchecks',
					'model' => 'Botcheck',
				'parent_id' => 3,
			),
		);
 
		//Iterate and create ACO nodes
		foreach($controllers as $data)
		{
			//Remember to call create() when saving in loops...
			$aco->create();
 
			//Save data
			$aco->save($data);
		}
 
		die; exit;
	}
 
	function assignPermissions()
	{
		//give admins rights to everything!(top aco)
		$this->Acl->allow('administrators', 'Entire_Site');
 
		//give users right to create and read main models
               //updates and deletes are set at a user level (so only owners can edit or delete their items)
 
		$this->Acl->allow('users', 'Main_Models','create');
		$this->Acl->allow('users', 'Main_Models','read');
 
		//let them use (read) aux, but nothing else!
		$this->Acl->allow('users', 'Aux_Models','read');
 
		die('done');
	}
 
	function checkPermissions()
	{
		//These all return true:
		echo $this->Acl->check('administrators', 'Settings');
		echo $this->Acl->check('users', 'Items','create');
		echo $this->Acl->check('users', 'Actions','read');
 
		//Remember, we can use the model/foreign key syntax 
		//for our user AROs
		// think can <User/Model> <x> access <Model> ,<action>
		// can    User   2356    acsess   Weapons
		//$this->Acl->check(array('model' => 'User', 'foreign_key' => 2356), 'Weapons');
 
		echo 'and dissallows...';
 
		//But these return false:	
//users can not delete or edit auxilary models (inherited)
		echo $this->Acl->check('users', 'Actions', 'delete');
		echo $this->Acl->check('users', 'Actions', 'create');
//nor can they edit or delete main models (until we assign that on an individual basis)
		echo $this->Acl->check('users', 'Items', 'delete');
		echo $this->Acl->check('users', 'Items', 'update');
		die('done');
	}
 }
?>
