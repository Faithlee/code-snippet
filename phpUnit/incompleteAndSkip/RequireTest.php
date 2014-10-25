<?php
/**
 * @FileName: RequireTest.php
 * @Desc: 通过@requires标注跳过测试，无法输出提示信息
 * @Author: lijiawei
 * @Mail: li.jiawei@leftbrain.com.cn
 * @CTime: Sat 25 Oct 2014 04:03:55 PM CST
 */

/**
 * @requires extension mysqli
 */
class RequireTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @requires PHP 5.3
	 */
	public function testConnection()
	{
		#在有mysqli扩展及php版本在5.3以上的不跳过: S
		$dbhand = new mysqli();
	}
}
