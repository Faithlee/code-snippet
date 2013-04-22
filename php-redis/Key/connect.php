<?php
//redis 连接器
	
	$redis = new Redis();
	
	try {
		$redis->connect('192.168.162.128', 6379);
	} catch (RedisExceptoin $e) {
		echo $e->getMessage();
		die('redis connection failed!!!');
	}

?>
