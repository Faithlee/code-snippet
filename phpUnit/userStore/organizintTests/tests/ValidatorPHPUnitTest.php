<?php
/**
 * @FileName: ValidatorPHPUnitTest.php
 * @Desc: 组织测试
 * @Author: lijiawei
 * @Mail: li.jiawei@leftbrain.com.cn
 * @CTime: Tue 28 Oct 2014 04:35:47 PM CST
 */

if (!defined('TEST_SRC')) {
	define('TEST_SRC', dirname(dirname(__FILE__)));
}

require_once TEST_SRC . '/object/Validator.php';
require_once TEST_SRC . '/object/User.php';
require_once TEST_SRC . '/object/UserStore.php';

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
	
	/**
	 * 验证密码
	 */
	public function testValidateCorrectPasswd()
	{
		$this->assertTrue(
			$this->validator->validateUser('admin@sina.com', '123456'),
			'期望验证成功!'
		);
	}
}
