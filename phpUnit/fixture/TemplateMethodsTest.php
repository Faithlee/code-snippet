<?php
/**
 * @FileName: TemplateMethodsTest.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Fri 24 Oct 2014 11:03:06 PM CST
 */

class TemplateMethodsTest extends PHPUnit_Framework_TestCase {
	#在测试运行之前调用
	public static function setUpBeforeClass()
	{
		fwrite(STDOUT, __METHOD__ . "\n");
	}

	public function setUp()
	{
		fwrite(STDOUT, __METHOD__ . "\n");
	}

	#在测试运行断言之前调用
	protected function assertPreConditions()
	{
		fwrite(STDOUT, __METHOD__ . "\n");
	}

	public function testOne()
	{
		fwrite(STDOUT, __METHOD__ . "\n");

		$this->assertTrue(true);
	}

	public function testTwo()
	{
		fwrite(STDOUT, __METHOD__ . "\n");

		$this->assertTrue(false);
	}

	#在测试运用断言之后调用
	protected function assertPostConditions()
	{
		fwrite(STDOUT, __METHOD__ ."\n");
	}

	protected function tearDown()
	{
		fwrite(STDOUT, __METHOD__ . "\n");
	}

	#在测试运行之后调用
	public static function tearDownAfterClass()
	{
		fwrite(STDOUT, __METHOD__ . "\n");
	}

	#在断言失败后调用
	protected function onNotSuccessfulTest(Exception $e)
	{
		fwrite(STDOUT, __METHOD__ . "\n");
		throw $e;
	}
}
