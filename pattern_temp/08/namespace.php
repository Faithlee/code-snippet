<?php
/**
 * @FileName: namespace.php
 * @Desc: namespace study
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sun 24 Aug 2014 11:20:57 PM CST
 */

//1.非限定名称:不包含前缀类的名称
//2.限定名称：包含前缀类的名称
//3.完全限定名称:包含了全局的前缀操作符名称

//参考namespaceExample{$1}.php文件

$file = '\Zend\Loader\AutoloaderFactory';

//去除命名空间的完全限制
$file = ltrim($file, '\\');
$filePath = '';

if ($lastNspos = strripos($file, '\\')) {
	$namespace = substr($file, 0, $lastNspos);
	$fileName = substr($file, $lastNspos + 1);
	$filePath = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) .  DIRECTORY_SEPARATOR;
}

echo $filePath . $fileName, PHP_EOL;

echo PATH_SEPARATOR, PHP_EOL;

echo '\\/\\\\_.:-';



