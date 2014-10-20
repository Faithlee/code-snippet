<?php
/**
 * @FileName: index.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Thu 16 Oct 2014 12:33:22 AM CST
 */

define('APPLICATION_PATH', dirname(__FILE__));
#phpinfo();
$config = APPLICATION_PATH . '/conf/application.ini';
$app = new Yaf_Application($config);

$app->bootstrap()->run();
