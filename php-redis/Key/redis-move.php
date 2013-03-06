<?php

//move key db
//将当前数据库的key移动到指定的数据库db当中

require 'connect.php';

//其实默认就是选择数据库0
$redis->select(0);

$redis->set('song', "secret base - Zone");

var_dump($redis->move('song', 1));


//当key不存在时
$redis->select(1);

var_dump($redis->exists('not_key'));
	
var_dump($redis->move('not_key', 0));

$redis->select(0);

var_dump($redis->exists('not_key'));


//当源数据库和目标数据库都有key时

$redis->select(0);
$redis->set('love', 'banana');

$redis->select(1);
$redis->set('love', 'orange');

$redis->select(0);
var_dump($redis->move('love', 1));
echo $redis->get('love') . "\n";	//返回banana

$redis->select(1);
echo $redis->get('love');



?>
