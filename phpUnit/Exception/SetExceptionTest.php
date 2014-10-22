<?php
/**
 * @FileName: SetExceptionTest.php
 * @Desc: 预期被测代码引发的异常
 * @Author: lijiawei
 * @Mail: li.jiawei@leftbrain.com.cn
 * @CTime: Wed 22 Oct 2014 08:48:47 PM CST
 */

class SetExceptionTest extends PHPUnit_Framework_TestCase {
	public function testException()
	{
		$this->setExpectedException('InvalidArgementException!');
	}

	public function testExceptionHasRightMessage()	
	{
		$this->setExpectedException('InvalidArgumentException', 'Right Message');

		throw new InvalidArgumentException('Some Message', 10);
	}

	public function testExceptionRightCode()
	{
		$this->setExpectedException('InvalidArgumentException', 'Right Message', 20);

		throw new InvalidArgumentException('the Right Message', 10);
	}

	#效果与上面是一样的
	/**
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage Right Message
	 */
	public function testAnotherExceptionRightCode()
	{
		throw new InvalidArgumentException('Right Message', 10);
	}
}

