<?php
/**
 * @FileName: namespace.php
 * @Desc: 
 * @Author: lijiawei
 * @Mail: li.jiawei@leftbrain.com.cn
 * @CTime: Sat 25 Oct 2014 12:37:52 PM CST
 */

namespace App\Lib1;

const MYCONST = 'App\Lib1\MYCONST';

function MyFunction(){
	return __FUNCTION__;
}

class MyClass {
	static function hello()
	{
		return __METHOD__;	
	}

	static function testInt($value)
	{
		if (!is_int($value)) {
			throw new \InvalidArgumentException('$value is not int!');
		}
	}
}
