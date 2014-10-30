<?php
/**
 * @FileName: AssertTest.php
 * @Desc: 
 * @Author: lijiawei
 * @Mail: li.jiawei@leftbrain.com.cn
 * @CTime: Wed 22 Oct 2014 08:04:49 PM CST
 */

class AssertTest extends PHPUnit_Framework_TestCase {
	#1.测试真假
	public function testBool()
	{
		$this->assertTrue(false);
	}

	#2.测试相等
	public function testEquals()
	{
		$this->assertEquals(array(1, 2), array(3, 4));
	}

	#3.测试失败
	public function testFail()
	{
		try {
			if (!array_key_exists('c', array('a' => 1, 'b' => 2))) {
				throw new Exception('键名a不存在！');
			}	
		} catch (Exception $e) {
			return;
		}

		$this->fail('预期的异常测试失败!');
	}

	#4.没有测试内容的测试
	public function testContains()
	{
		$array = array(123, 234);
		
		//$this->assertEquals($array, array(123, 234));
	}
}
