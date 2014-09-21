<?php
/**
 * @FileName: pdo.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sun 21 Sep 2014 04:13:06 PM CST
 */
$str = 'nice';
//nice
echo $str, PHP_EOL;

$pdo = new PDO('mysql:dbname=test;host=localhost');
//'nice'
echo $pdo->quote($str);
