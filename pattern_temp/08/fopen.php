<?php
/**
 * @FileName: fopen.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Mon 18 Aug 2014 10:46:44 PM CST
 */

//the content of 'data.txt' is 123 and not 23!

$fp = fopen('data.txt', 'w');
fwrite($fp, '1');
fwrite($fp, '23');
fclose($fp);

