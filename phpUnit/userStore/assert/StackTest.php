<?php
/**
 * @FileName: StackTest.php
 * @Desc: 建立基境
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Fri 24 Oct 2014 10:43:14 PM CST
 */

class StackTest extends PHPUnit_Framework_TestCase {
	protected $stack;

	public function setUp()
	{
		echo __METHOD__ . "\n";
		$this->stack = array();
	}

	public function tearDown()
	{
		//销毁资源：主要是文件或套接字外部资源，创建纯PHP对象可以忽略
		echo __METHOD__ . "\n";
	}

	public function testEmpty()
	{
		echo __METHOD__ . "\n";
		$this->assertTrue(empty($this->stack));
	}

	public function testPush()
	{
		echo __METHOD__ . "\n";

		array_push($this->stack, 'foo');
		$this->assertEquals('foo', $this->stack[count($this->stack) - 1]);

		$this->assertFalse(empty($this->stack));
	}

	public function testPop()
	{
		echo __METHOD__ . "\n";

		array_push($this->stack, 'foo');
		$this->assertEquals('foo', array_pop($this->stack));

		$this->assertTrue(empty($this->stack));
	}
}
