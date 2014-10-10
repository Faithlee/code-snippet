<?php
/**
 * @FileName: baseUrl.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Fri 10 Oct 2014 10:59:10 PM CST
 */

$path = '/dwz/public/index.php';
$file =  '/usr/local/dev_swan/web/dwz/public/index.php';

$segs = explode('/', trim($file, '/'));
$segs = array_reverse($segs);
//print_r($segs);
$baseUrl = '';
$last = count($segs);
$index = 0;

do {
	$baseUrl = '/' . $segs[$index] . $baseUrl;
	$index++;
} while(($last > $index) && (false !== $pos = strpos($path, $baseUrl) && 0 != $pos));
