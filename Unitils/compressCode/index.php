<?php
/**
 * @FileName: index.php
 * @Desc: 
 * @Author: Faithlee
 * @Mail: lijiabin098@126.com 
 * @CTime: Sun 07 Dec 2014 04:35:36 PM CST
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('STATICPATH', dirname(dirname(__FILE__)));

$requestUri = $_SERVER['REQUEST_URI'];


if (strpos($requestUri, 'merge') && ($pos = strpos($requestUri, '?'))) {
	$mergeStr = substr($requestUri, $pos + 1);
	$mergeArr = explode(',', $mergeStr);

	#通过计算压缩文件名称，存在则返回
	$package = 'package.min.css';
	if (file_exists($package)) {
		require $package;		
		die;
	}
}

$temp = 'temp.css';
ob_start();
foreach ($mergeArr as $file) {
	$single = STATICPATH . $file;
	if (file_exists($single)) {
		require_once $single;
	}
}

$content = ob_get_contents();
ob_end_clean();

file_put_contents($temp, $content);
	
$compressor = STATICPATH . '/lib/yuicompressor-2.4.8.jar';
`java -jar {$compressor} --type css {$temp} -o {$package}`;


