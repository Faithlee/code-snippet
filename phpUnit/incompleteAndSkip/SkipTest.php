<?php
/**
 * @FileName: SkipTest.php
 * @Desc: 跳过测试
 * @Author: lijiawei
 * @Mail: li.jiawei@leftbrain.com.cn
 * @CTime: Sat 25 Oct 2014 03:58:47 PM CST
 */

class SkipTest extends PHPUnit_Framework_TestCase {
	protected function setUp()	
	{
		if (!extension_loaded('mysqli')) {
			$this->markTestSkipped('Mysqli扩展不可用！');
		}
	}

	public function testConnect()
	{
		//code ....
	}
}
