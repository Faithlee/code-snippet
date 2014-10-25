<?php
/**
 * @FileName: IncompleteTest.php
 * @Desc: 不完整测试
 * @Author: lijiawei
 * @Mail: li.jiawei@leftbrain.com.cn
 * @CTime: Sat 25 Oct 2014 03:51:57 PM CST
 */

class IncompleteTest extends PHPUnit_Framework_TestCase {
	public function testSomething()
	{
		$this->assertTrue(true, '这个测试是正常的！');

		$this->markTestIncomplete('此测试目前尚未实现！');
	}
}
