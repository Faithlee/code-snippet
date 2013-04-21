<?php

//ttl 返回给定key的剩余时间
//当key不存在或没设置生存时间时返回 -1;

require 'conn.php';

$redis->flushdb();

//有ttl的key
//$redis->set('name', 'hello,ni!');
$redis->expire('name', 30);

echo $redis->get('name') . "\n";
echo $redis->ttl('name');



?>
