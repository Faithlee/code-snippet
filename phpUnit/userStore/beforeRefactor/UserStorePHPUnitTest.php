<?php
/**
 * @FileName: UserStorePHPUnitTest.php
 * @Desc: 用户储存单元测试
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

	/**
	 * 测试密码小于5个字符
	 */
	public function testAddUser()
	{
		try {
			$this->store->addUser('admin', 'admin@sina.com', '12ab');
		} catch (Exception $e) {
			return ;	
		}
		
		#测试失败提示
		$this->fail('短密码异常失败！');
	}

	/**
	 * 测试用户数据
	 */
	public function testGetUser()
	{

		$this->store->addUser('admin', 'admin@sina.com', '123456');
		
		$user = $this->store->getUser('admin@sina.com');

		//开始断言，有一个失败则都失败
		$this->assertEquals($user['name'], 'admin', '如果我出现则用户名断言失败！');

		$this->assertEquals($user['mail'], 'admin@sina.com', '断言邮箱测试失败');

		$this->assertEquals($user['pass'], '1234567', '断言密码测试失败');
	}
}
