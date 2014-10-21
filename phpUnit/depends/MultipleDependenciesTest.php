<?php
/**
 * @FileName: MultipleDependenciesTest.php
 * @Desc: 测试可以使用多于一个@depends标注
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Tue 21 Oct 2014 11:13:00 PM CST
 */

class MultipleDependenciesTest extends PHPUnit_Framework_TestCase {

	public function testProducerFirst()	
	{
		$this->assertTrue(true);

		return 'first';
	}

	public function testProducerSecond()
	{
		$this->assertTrue(true);

		return 'second';
	}

	/**
	 *@depends testProducerFirst
	 *@depends testProducerSecond
	 */
	public function testConsumer()
	{
		$this->assertEquals(
			array('first', 'second'),
			func_get_args()
		);
	}
}
