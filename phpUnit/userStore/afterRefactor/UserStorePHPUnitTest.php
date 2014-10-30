<?php
/**
 * @FileName: UserStorePHPUnitTest.php
 * @Desc: 用户储存单元测试，对象形式的
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Mon 27 Oct 2014 10:48:48 PM CST
 */


require_once 'UserStore.php';

class UserStorePHPUnitTest extends PHPUnit_Framework_TestCase {
	private $store;

	/**
	 * 每个测试都会调用一次setUp模板
	 */
	public function setUp()	
	{
		$this->store = new UserStore();
	}

	/**
	 * @todo tearDown功能
	 */
	public function tearDown()
	{
		//销毁资源	
	}
	
	public function testAddUser()
	{
		try {
			$this->store->addUser('admin', 'admin@sina.com', '12ab');
		} catch (Exception $e) {
			return ;	
		}

		$this->fail('短密码异常！');
	}

	public function testGetUser()
	{
		$this->store->addUser('admin', 'admin@sina.com', '123456');
		
		$user = $this->store->getUser('admin@sina.com');

		//开始断言，将数组形式改为对象
		$this->assertEquals($user['name'], 'admin', '如果我出现则用户名断言失败！');
		#$this->assertEquals($user->getMail(), 'admin@sina.com', '断言失败!');

		//$this->assertEquals($user['mail'], 'admin@sina.com', '断言测试失败');
		
		//$this->assertEquals($user['pass'], '1234567', '断言测试失败');
	}
}
