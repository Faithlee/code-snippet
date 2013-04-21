<?php
//从当前数据库中随机返回一个key

require 'conn.php';
$redis->flushall();

//数据库不为空
$array_mset_randomkey = array(
			'fruit' => 'apple',
			'drink' => 'berr',
			'food'  => 'cookies'
		);
$redis->mset($array_mset_randomkey);
echo $redis->randomkey() . "\n";

//查看是否被删除
var_export($redis->keys('*')) . "\n";

//数据库为空

$redis->flushdb();
var_dump($redis->randomkey());




?>
