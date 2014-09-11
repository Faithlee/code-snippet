<?php
/**
 * @FileName: Application.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Thu 04 Sep 2014 10:40:53 PM CST
 */

//[settings] => Array
//(
//	[display_startup_errors] => 1
//	[display_errors] => 1
//)


$setting = array(
	'display_startup_errors' => 1,
	'display_errors' => 1,
);

setting($setting);
//ini_get|ini_set()只能用来设置配置文件的选项，设置其它的参数返回false
$ini = ini_get('display_startup_errors');
$error = ini_get('display_errors');

var_dump($ini, $error);


function setting(array $setting, $prefix = ''){
	foreach ($setting as $key => $val) {
		$key = empty($prefix) ? $key : $prefix . $key;

		if (is_scalar($val)) {
			echo $key, PHP_EOL;
			echo $val;
			ini_set($key, $val);
		} else if (is_array($val)) {
			settings($val, $key . '.');
		}
	}

}

//获取配置文件所有的配置
//$ini = ini_get_all();
//print_r($ini);

