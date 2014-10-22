<?php
/**
 * @FileName: catchException.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Wed 22 Oct 2014 11:26:15 PM CST
 */

class CatchException extends PHPUnit_Framework_TestCase {

	public function testException()
	{
		try {
			//预期会发生的异常	
		} catch (InvalidArgumentException $expected) {
			return ;
		}

		$this->fail('预期的异常并没有发生！');
	}
}
