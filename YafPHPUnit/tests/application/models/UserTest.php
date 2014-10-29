<?php

require_once PHPUNIT_PATH . '/application/library/Test/PHPUnit/ModelTestCase.php';

class UserModelTest extends Test\PHPUnit\ModelTestCase {
	private $_model;
	
	//setUp模板共享基境
	public function setUp()
	{
		#UserModel
		$this->_model = new UserModel();
	}
	
	public function testGetUserName() 
	{
        $userId = 1;
        $result = $this->_model->getUserName($userId);

        $this->assertEquals('iceup', $result);
	}
	
	public function testGetUserName2()
	{
		$userId = 100;
        $result = $this->_model->getUserName($userId);

        $this->assertFalse($result);
	}
}
