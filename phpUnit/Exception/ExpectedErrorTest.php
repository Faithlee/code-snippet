<?php
/**
 * @FileName: ExpectedErrorTest.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Wed 22 Oct 2014 11:31:50 PM CST
 */

class ExpectedErrorTest extends PHPUnit_Framework_TestCase {
	/**
	 * @expectedException PHPUnit_Framework_Error
	 */
	public function testFailingInclude()
	{
		include 'not_existing_file.php';
	}
}
