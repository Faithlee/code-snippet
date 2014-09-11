<?php
/**
 * @FileName: clisapi.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sun 17 Aug 2014 11:25:46 PM CST
 */

//1、储存用户输入的信息
//$stdin = fopen('php://stdin', 'r');

$line = trim(fgets(STDIN));
//fscanf(STDIN, "%d\n", $line);

if ('Y' == $line) {
	echo "You select Y";
} else {
	echo "You select N";
}


//linux命令
//time命令：获取命令执行时间
//包括命令的实际运行时间
//运行在用户态时间
//内核态的时间
