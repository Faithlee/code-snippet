<?php
/**
 * @FileName: ValidatorPHPUnitTest.php
 * @Desc: 
 * @Author: lijiawei
 * @Mail: li.jiawei@leftbrain.com.cn
 * @CTime: Tue 28 Oct 2014 04:35:47 PM CST
 */

require_once 'UserStore.php';
require_once 'Validator.php';

class ValidatorPHPUnitTest extends PHPUnit_Framework_TestCase {
	private $validator;

	public function setUp()
	{
		$store = new UserStore();
		$store->addUser('admin', 'admin@sina.com', '123456');

		$this->validator = new Validator($store);
	}

	public function tearDown()
	{
	
	}

	public function testValidateCorrectPasswd()
	{
		$this->assertTrue(
			$this->validateUser('admin@sina.com', '123456'),
			'期望验证成功!';
		);
	}
}
