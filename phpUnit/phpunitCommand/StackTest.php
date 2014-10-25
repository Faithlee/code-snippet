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

	#检查不测试任何内容的测试的严格性：--report-useless-tests 
	public function testUseless()
	{
		$stack = array(1, 2, 3);

		#关闭断言,再严格测试模式下会报风险R
		#$this->assertContains(4, $stack);
	}
}
