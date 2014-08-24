<?php
/**
 * @FileName: namespaceExample2.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sun 24 Aug 2014 11:31:04 PM CST
 */

namespace Foo\Bar;

include 'namespaceExample.php';

const FOO = 2;

function foo() {
	echo __NAMESPACE__, PHP_EOL;
}

class foo {
	static function staticmethod()
	{
		echo __NAMESPACE__, PHP_EOL;	
	}
}


//1.非限定名称
foo();

foo::staticmethod();

echo FOO, PHP_EOL;

//2.限定名称
subnamespace\foo();

subnamespace\foo::staticmethod();

echo subnamespace\FOO, PHP_EOL;

//3.完全限定名称
\Foo\Bar\foo();
\Foo\Bar\foo::staticmethod();
echo \Foo\Bar\FOO, PHP_EOL;


\Foo\Bar\subnamespace\foo::staticmethod();
echo \Foo\Bar\subnamespace\FOO, PHP_EOL;

//说明：访问任意全局类、函数或常量
