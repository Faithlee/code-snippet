<?php
/**
 * @Desc: 正则表达式
 * @User: Faithlee
 * @Date: 2018-03-04
 * @Time: 2018-03-04
 */

// email
$regex = '/([a-z0-9]*[-_\.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[\.][a-z]{2,3}([\.][a-z]{2})?/i';
$str   = "lijiabin098@125.com";

// 中文
//$regex = "/[\x{4E00}-\x{9FA5}]+/u";
//$str   = "this is 测试!";


preg_match($regex, $str, $match); 
print_r($match);
