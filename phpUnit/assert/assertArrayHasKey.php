<?php
/**
 * @FileName: assertArrayHasKey.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Thu 23 Oct 2014 12:04:39 AM CST
 */

class AssertTest extends PHPUnit_Framework_TestCase {
	#断言数组键值
	public function testArrayKey()
	{
		$this->assertArrayHasKey('foo', array('bar' => 'baz'), 'The array has no key');
	}

	#断言类的属性
	public function testAttribute()
	{
		$this->assertClassHasAttribute('foo', 'stdClass');
	}

	#断言类的静态属性；
	public function testStaticAttribute()	
	{
		$this->assertClassHasStaticAttribute('bar', 'stdClass', 'Assert has static attribute');
	}


	public function testContains()
	{
		$this->assertContains(4, array(1, 2, 3), '判断元素是否被包含！');
	}


	public function testAnotherContains()
	{
		$this->assertContains('baz', 'foobar', '判断字符串是否在另一个里');
	}


	public function assertContainsOnly()
	{
		
	}
}
