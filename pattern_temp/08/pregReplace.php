<?php
/**
 * @FileName: pregReplace.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sat 23 Aug 2014 12:33:26 AM CST
 */

//去除空格
$str = 'foo     o';
$str = preg_replace('/\s+/', ' ', $str);

echo $str, PHP_EOL;

$count = 0;
echo preg_replace(array('/\d/', '/\s/'), '*', 'xp 4 to', -1, $count);

//注意反斜杠的用法，注意转义问题，输出结果:(.+\\)
//必须三条反斜杠
//echo '(.+\\\)';die; 

$class = 'Zend\Loader\Test';
//正则匹配 .+ 与 .*? 的效果是一样的；
preg_match("/(.+\\\)/", $class, $matches);
preg_match("/(.*?\\\)/", $class, $matches);

//U表示非贪婪模式，匹配到则不再向后匹配
preg_match("/(.+\\\)/U", $class, $matches);
preg_match("/(.+\\\)/", $class, $matches);

var_dump($matches);die;


//如下会将]视为转义，导致[]不匹配
echo '[^\\]+';
echo '[^\\]]+';
$class = 'adfdfa\ad\fa\df';
preg_match('/(?P<class>[^\\]+$)/', $class, $match);
var_dump($match);die;

