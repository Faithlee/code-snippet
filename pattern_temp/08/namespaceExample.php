<?php
/**
 * @FileName: namespaceExample.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sun 24 Aug 2014 11:28:59 PM CST
 */

namespace Foo\Bar\subnamespace;

const FOO = 1;

function foo(){
	echo __NAMESPACE__, PHP_EOL;
}

class foo {
	static function staticmethod()
	{
		echo __NAMESPACE__, PHP_EOL;
	}
}
