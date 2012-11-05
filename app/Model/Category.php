<?php
App::uses('AppModel', 'Model');

/**
 * Category Model
 *
 * @property Category $CatsCap
 */
class Category extends AppModel {

	var $name = 'Category';
 
	// We specify the join table here because Cake would expect the table to be called genres_movies from this side
/*
	$hasAndBelongsToMany = array( 'Knowhow' => 
								array( 'className' => 'Knowhow',
	                                   'joinTable' => 'knowhow_transactions'
	                                               
	                                 )
	                              );
*/
}
