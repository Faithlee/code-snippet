<?php
/**
 * @FileName: array.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Wed 03 Sep 2014 11:32:11 PM CST
 */
//array_change_key_case
$inputArr = array('First' => 1, 'Second' => 2);

print_r(array_change_key_case($inputArr, CASE_UPPER));
print_r(array_change_key_case($inputArr, CASE_LOWER));
