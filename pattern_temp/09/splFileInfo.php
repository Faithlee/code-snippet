<?php
/**
 * @FileName: splFileInfo.php
 * @Desc: splFileInfo类基本使用
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Fri 26 Sep 2014 12:12:28 AM CST
 */

$path = __FILE__;
$file = new SplFileInfo($path);

#return: splFileInfo.php
var_dump($file->getFilename());


$path = dirname(__FILE__);
$file = new SplFileInfo($path);
#return: 09
var_dump($file->getFilename());
