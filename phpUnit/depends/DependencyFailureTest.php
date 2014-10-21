<?php
/**
 * @FileName: DependencyFailureTest.php
 * @Desc: 测试断言失败情况
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Tue 21 Oct 2014 11:09:01 PM CST
 */

class DependencyFailureTest extends PHPUnit_Framework_TestCase {
	public function testOne()
	{
		$this->assertTrue(FALSE);
	}

	/**
	 *@depends testOne
	 */
	public function testTwo()
	{
	
	}
}
