<?php
/**
 * @FileName: TestCaseClass.php
 * @Desc: 
 * @Author: lijiawei
 * @Mail: li.jiawei@leftbrain.com.cn
 * @CTime: Fri 24 Oct 2014 07:53:32 PM CST
 */

namespace TestNamespace;

class TestCaseClass extends \PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider provider
	 */
	public function testMethod($data)
	{
		$this->assertTrue($data);
	}

	public function provider()
	{
		return array(
			'my named data' => array(false),
			'my data' => array(false)
		);
	}

	/**
	 * @group group_a
	 */
	public function testEquals()
	{
		$this->assertEquals(array(1, 2, 3), 3, '3与数组不相等');
	}

	/**
	 * @group group_b
	 */
	public function testFalse()
	{
		$this->assertFalse(True);
	}
}
