<?php
/**
 * @FileName: StackTestDepends.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Tue 21 Oct 2014 10:54:17 PM CST
 */

#用@depends标注来表达依赖关系
#1.producer生产者：能生成一个被测单元并将其作为返回值的测试方法
#2.consumer依赖于一个或多个生产者及其返回值的测试方法

class StackTest extends PHPUnit_Framework_TestCase {
	public function testEmpty() 
	{
		$stack = array();
		$this->assertEmpty($stack);

		return $stack;
	}


	/**
	 *@depends testEmpty
	 */	
	public function testPush(array $stack)
	{
		array_push($stack, 'foo');
		$this->assertEquals('foo', $stack[count($stack) - 1]);

		$this->assertNotEmpty($stack);

		return $stack;
	}

	/**
	 *@depends testPush
	 */
	public function testPop(array $stack)
	{
		$this->assertEquals('foo', array_pop($stack))	;
		$this->assertEmpty($stack);
	}
}
