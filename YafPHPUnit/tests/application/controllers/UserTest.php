<?php
/**
 * @FileName: UserTest.php
 * @Desc: 
 * @Author: lijiawei
 * @Mail: li.jiawei@leftbrain.com.cn
 * @CTime: Wed 29 Oct 2014 03:56:42 PM CST
 */

require_once PHPUNIT_PATH . '/application/library/Test/PHPUnit/TestCase.php';

class UserTest extends Test\PHPUnit\TestCase {
	
	public function testName()	
	{
		$this->assertEquals('wangwang', 'miaomiano');
	}
}
