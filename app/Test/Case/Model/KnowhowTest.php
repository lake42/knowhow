<?php
App::uses('Knowhow', 'Model');

/**
 * Knowhow Test Case
 *
 */
class KnowhowTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.knowhow'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Knowhow = ClassRegistry::init('Knowhow');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Knowhow);

		parent::tearDown();
	}

}
