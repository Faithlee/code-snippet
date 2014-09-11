<?php
/**
 * @FileName: explode.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sun 31 Aug 2014 12:50:22 AM CST
 */

$str = 'resources.db';
$arr = explode('.', $str, 2);
print_r($arr);


$arr1 = explode('.', $arr[0]);
print_r($arr1);

$zero = explode('.', 5);
var_export($zero);
