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
		$this->stack = array();
	}

	public function testEmpty()
	{
		$this->assertTrue(empty($this->stack));
	}

	public function testPush()
	{
		array_push($this->stack, 'foo');
		$this->assertEquals('foo', $this->stack[count($this->stack) - 1]);

		$this->assertFalse(empty($this->stack));
	}

	public function testPop()
	{
		array_push($this->stack, 'foo');
		$this->assertEquals('foo', array_pop($this->stack));

		$this->assertTrue(empty($this->stack));
	}
}
