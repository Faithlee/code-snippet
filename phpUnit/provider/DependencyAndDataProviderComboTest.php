<?php
/**
 * @FileName: DependencyAndDataProviderComboTest.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Wed 22 Oct 2014 10:18:02 PM CST
 */

class DependencyAndDataProviderComboTest extends PHPUnit_Framework_TestCase {
	public function provider()
	{
		return array(
			array('provider1'),
			array('provider2')
		);
	}

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
	 * @depends testProducerFirst
	 * @depends testProducerSecond
	 * @dataProvider provider
	 */
	public function testConsumer()
	{
		$this->assertEquals(
			array('provider1', 'first', 'second'),
			func_get_args()
		);
	}
}
