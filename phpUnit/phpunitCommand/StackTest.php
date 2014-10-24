<?php
/**
 * @FileName: stackTest.php
 * @Desc: 
 * @Author: lijiawei
 * @Mail: li.jiawei@leftbrain.com.cn
 * @CTime: Wed 22 Oct 2014 08:04:49 PM CST
 */

class StackTest extends PHPUnit_Framework_TestCase {
	public function testEmpty()
	{
		$this->assertTrue(false);
	}

	public function testEquals()
	{
		$this->assertEquals(array(1, 2), array(3, 4));
	}
}
