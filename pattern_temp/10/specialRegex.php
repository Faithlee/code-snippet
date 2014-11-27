<?php
/**
 * @FileName: specialRegex.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Fri 10 Oct 2014 09:05:24 PM CST
 */

$str = 'test123123hello1111';

preg_match_all('/[:digit:]+/', $str, $match);
var_dump($match);



