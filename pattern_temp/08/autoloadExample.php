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

//splAutoload::register();

$autoload = new testClass();
$autoload->trigger();

//set_include_path(get_include_path() . PATH_SEPARATOR . '/root/code/testDir/');
//echo get_include_path();
//spl_autoload('testClass');
//$demo = new testClass();



