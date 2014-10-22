<?php
/**
 * @FileName: ExceptionTest.php
 * @Desc: 对异常进行测试
 * @Author: lijiawei
 * @Mail: li.jiawei@leftbrain.com.cn
 * @CTime: Wed 22 Oct 2014 08:38:35 PM CST
 */

class ExceptionTest extends PHPUnit_Framework_TestCase {
	/**
	 * @expectedException InvalidArgumentException
	 */	
	public function  testException()
	{
	
	}

	public function testInvalid()
	{
		throw new InvalidArgumentException('Some Message', 10);
	}
}
