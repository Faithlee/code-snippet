<?php
/**
 * @FileName: define.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Fri 29 Aug 2014 11:22:12 PM CST
 */

define('APPLICATION_PATH', '/web/github/code');

//APPLICATION_PATH没有定义时执行后面
defined('APPLICATION_PATH') || define('APPLICATION_PATH', dirname(__FILE__));

//&&前面为真是为后面的赋值
true && $dog = 'SmallDog';

echo APPLICATION_PATH;

echo $dog;
