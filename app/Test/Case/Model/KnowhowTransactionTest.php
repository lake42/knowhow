<?php
App::uses('KnowhowTransaction', 'Model');

/**
 * KnowhowTransaction Test Case
 *
 */
class KnowhowTransactionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.knowhow_transaction'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->KnowhowTransaction = ClassRegistry::init('KnowhowTransaction');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->KnowhowTransaction);

		parent::tearDown();
	}

}
