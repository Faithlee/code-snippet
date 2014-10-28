<?php
/**
 * @FileName: StackTest.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Tue 21 Oct 2014 10:28:08 PM CST
 */

class StackTest extends PHPUnit_Framework_TestCase {
	public function testPushAndPop()	
	{
		$stack = array();
		$this->assertEquals(0, count($stack));

		array_push($stack, 'foo');

		$this->assertEquals('foo', $stack[count($stack) - 1]);

		$this->assertEquals(1, count($stack));

		$this->assertEquals('foo', array_pop($stack));

		$this->assertEquals(1, count($stack));
		#当你想把一些东西写到print或者表达式中，别这样做，将其写成一个测试来代替；
	}
}
