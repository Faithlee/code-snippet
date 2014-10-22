<?php
/**
 * @FileName: OtherExceptionTest.php
 * @Desc: 联合使用expectedExceptionMessage 和 @expectedExceptionCode标注
 * @Author: lijiawei
 * @Mail: li.jiawei@leftbrain.com.cn
 * @CTime: Wed 22 Oct 2014 08:42:19 PM CST
 */

class OtherExceptionTest extends PHPUnit_Framework_TestCase {
	/**
	 *@expectedException InvalidArgumentException
	 *@expectedExceptionMessage Right Message
	 */
	public function testExceptionHasRightMessage()
	{
		throw new InvalidArgumentException('Some Message', 10);
	}

	/**
	 *@expectedException InvalidArgumentException
	 *@expectedExceptionCode 29
	 */
	public function testExceptionHasRightCode()
	{
		throw new InvalidArgumentException('Some Message', 10);
	}
}
