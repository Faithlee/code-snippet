<?php
/**
 * @FileName: getResourceType.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Mon 18 Aug 2014 10:19:32 PM CST
 */

$c = mysql_connect('127.0.0.1:3307', 'root', '');
echo get_resource_type($c), PHP_EOL;

$fp = fopen('likeSapi', 'w');
echo get_resource_type($fp), PHP_EOL;

//判断变量类别：gettype()

