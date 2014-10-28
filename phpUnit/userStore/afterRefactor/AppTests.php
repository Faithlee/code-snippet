<?php
/**
 * @FileName: AppTests.php
 * @Desc: 测试套件
 * @Author: lijiawei
 * @Mail: li.jiawei@leftbrain.com.cn
 * @CTime: Tue 28 Oct 2014 05:07:51 PM CST
 */

if (!defined('PHPUnit_MAIN_METHOD')) {
	define('PHPUnit_MAIN_METHOD', 'AppTests::main');
}

require_once 'UserStorePHPUnitTest.php';
require_once 'ValidatorPHPUnitTest.php';

class AppTests {
	public static function main()
	{
		PHPUnit_TextUI_TestRunner::run(self::suite());
	}

	public static function suite()
	{
		#User Class 可能是标识
		$ts = new PHPUnit_Framework_TestSuite('User Class');

		$ts->addTestSuite('UserStorePHPUnitTest');
		$ts->addTestSuite('ValidatorPHPUnitTest');

		return $ts;
	}
}

if (PHPUnit_MAIN_METHOD == 'AppTests::main') {
	AppTests::main();
}
