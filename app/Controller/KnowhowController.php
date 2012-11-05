<?php

class Knowhow extends AppController{

	public $helpers = array('Html','form');

	public function index(){
		$this->set('knowhow', $this->Knowhow->find('all'));
	
	}



}

