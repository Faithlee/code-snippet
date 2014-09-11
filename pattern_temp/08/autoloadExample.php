<?php
/**
 * @FileName: autoload.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Tue 26 Aug 2014 11:51:32 PM CST
 */

define('BASE_PATH', dirname(__FILE__) . '/');
require BASE_PATH . 'splAutoload.php';

//1.spl_autoload_register() package Demo
splAutoload::register();

$autoload = new testClass();
$autoload->trigger();


//2.spl_autoload() Demo
spl_autoload_register('loadClasses');
$myClass = new myclass();
$myClass->trigger();

function loadClasses($className) {
	$dirPath = dirname(__FILE__) . '/';
	//echo $dirPath;
	if (file_exists($dirPath . $className . '.php')) {
		set_include_path(get_include_path() . PATH_SEPARATOR . $dirPath);
		//echo get_include_path();
		//说明：此函数在默认情况下将类名转化为小写
		spl_autoload($className);
	}
}

