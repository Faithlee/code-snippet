<?php
/**
 * @FileName: pathinfo.php
 * @Desc: pathinfo test
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sat 30 Aug 2014 11:00:31 PM CST
 */

echo PATHINFO_DIRNAME;
echo PATHINFO_BASENAME;
echo PATHINFO_EXTENSION;
echo PATHINFO_FILENAME;

//1、option如下设置与不传入option参数效果一样
$option = PATHINFO_DIRNAME + PATHINFO_BASENAME + PATHINFO_EXTENSION + PATHINFO_FILENAME;
$path = pathinfo(__FILE__, $option);
var_export($path);

//2、option设置参数不全时，以第一个参数为准
$option = PATHINFO_DIRNAME + PATHINFO_BASENAME + PATHINFO_EXTENSION;
$path = pathinfo(__FILE__, $option);

var_export($path);
