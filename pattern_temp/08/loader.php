<?php
/**
 * @FileName: loader.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sun 24 Aug 2014 10:43:10 PM CST
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);
set_include_path(get_include_path() . PATH_SEPARATOR . './Zend');

require 'Loader.php';

//Zend_Loader::loadClass('testClass');

//echo PATH_SEPARATOR;
//Zend_Loader::loadFile('');

$file = 'Zend_Log';
$file = 'Zend_Log_Writer_Stream.php';
$dirs = '/root/code/testDir';
//Zend_Loader::loadClass($file, $dirs);

//todo 分割文件
$file = preg_replace('/_/', DIRECTORY_SEPARATOR, $file);
$dirPath = dirname($file);

if ($dirs) {
	$dirs = explode(PATH_SEPARATOR, $dirs);
}

foreach ($dirs as $key => $dir) {
	if ($dir == '.') {
		$dirs[$key]	= $dirPath;
	} else {
		//todo 不明白此步的作用
		$dir = rtrim($dir, '\\/');
		$dirs[$key]	= $dir . DIRECTORY_SEPARATOR . $dirPath;
	}
}

$file = basename($file);
echo $file;

