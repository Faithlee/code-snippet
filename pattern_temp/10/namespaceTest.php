<?php
/**
 * @FileName: namespaceTest.php
 * @Desc: 命名空间的使用
 * @Author: lijiawei
 * @Mail: li.jiawei@leftbrain.com.cn
 * @CTime: Sat 25 Oct 2014 12:39:58 PM CST
 */

require 'namespace.php';

echo \App\Lib1\MYCONST, PHP_EOL;

echo \App\Lib1\MyFunction(), PHP_EOL;

echo \App\Lib1\MyClass::hello(), PHP_EOL;

echo \App\Lib1\MyClass::testInt('aaa'), PHP_EOL;

echo PHP_INT_MAX;
