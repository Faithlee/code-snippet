<?php
/**
 * @FileName: ArrayDataSetTest.php
 * @Desc: 
 * @Author: lijiawei
 * @Mail: li.jiawei@leftbrain.com.cn
 * @CTime: Sat 25 Oct 2014 06:18:24 PM CST
 */

require_once 'DbUnit_ArrayDataSet.php';

class ArrayDataSetTest extends PHPUnit_Extensions_Database_Test {
	protected function getDataSet()
	{
		return new DbUnit_ArrayDataSet(array(
			array('id' => 1, 'content' => 'Hello buddy!', 'user' => 'joe', 'created' => '2010-04-24 17:15:23'),
                array('id' => 2, 'content' => 'I like it!',   'user' => null,  'created' => '2010-04-26 12:14:20'),

		));
	}
}
