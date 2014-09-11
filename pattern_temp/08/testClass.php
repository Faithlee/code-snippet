<?php
/**
 * @FileName: testClass.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Mon 25 Aug 2014 10:50:43 PM CST
 */

class testClass {
	//trigger_error测试
	function trigger()
	{
		trigger_error(__CLASS__ . '::' . __METHOD__ . 'has deprecated!', E_USER_NOTICE);

		echo 'use new method', PHP_EOL;
	}
}

