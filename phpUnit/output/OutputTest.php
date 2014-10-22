<?php
/**
 * @FileName: OutputTest.php
 * @Desc: 对函数或方法的输出进行测试
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Wed 22 Oct 2014 11:45:03 PM CST
 */

class OutputTest extends PHPUnit_Framework_TestCase {
	public function testExpectedFooActualFoo()
	{
		$this->expectOutputString('foo');

		print 'foo';
	}

	public function testExpectedBarActualBaz()
	{
		$this->expectOutputString('bar');
		
		print 'Baz';
	}

	public function testRegex()
	{
		$this->expectOutputRegex('/\d+/');

		#产生异常
		print 'adfadfads';
	}

	#回调函数没有明白如何使用
	public function testCallback()
	{
		$this->setOutputCallback('callback');

		print 'HELLO';
	}
}


function callback($str) {
	return strtolower($str);
}


