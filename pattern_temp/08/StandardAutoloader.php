<?php
/**
 * @FileName: StandardAutoloader.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Thu 28 Aug 2014 10:52:51 PM CST
 */

define('SEPARATOR', '_');
define('NS_SEPARATOR', '\\');

$dir = dirname(__FILE__);
function registerPrefix($prefix = 'Zend', $directory)
{
	$prefixes = array();
	$prefix = rtrim($prefix, SEPARATOR) . SEPARATOR;
	
	$prefixes[$prefix] = normalizeDirectory($directory);

	return $prefixes;
}

//registerPrefix(1, 2);

function registerNamespace()
{
	
}

//将命名空间转化为文件名
function transformClassNameToFile($class = '', $dir = '')
{
	preg_match('/(?P<namespace>.+\\\)?(?P<class>[^\\\]+$)/', $class, $matches);

	var_dump($matches);
}

transformClassNameToFile('Zend\Loader\AutoloaderFactory');



//normalize the directory
function normalizeDirectory($dir) {
	$last = $dir[strlen($dir) - 1];
	if (in_array($last, array('/', '\\'))) {
		$dir[strlen($dir) - 1] = DIRECTORY_SEPARATOR;
	}
	
	$dir .= DIRECTORY_SEPARATOR;	
	
	return $dir;
}

//echo normalizeDirectory($dir);





