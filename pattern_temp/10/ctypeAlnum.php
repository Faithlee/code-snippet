<?php
/**
 * @FileName: ctypeAlnum.php
 * @Desc: 检查字母数字的
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Fri 10 Oct 2014 12:00:00 AM CST
 */

$a = 'abc21231afsd';
var_dump(ctype_alnum($a));

$non = 'abc#123';
var_dump(ctype_alnum($non));

$num = '-23';
var_dump(ctype_alnum($num));
