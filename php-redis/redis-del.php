<?php

	$redis = new Redis();
	try {
	
		$result = $redis->connect('192.168.162.128', 6379);
	} catch (RedisException $e) {
		echo __FILE__ . $e->getMessage();
		die('连接失败！');
	}

//del：删除单个key
	$redis->set('myname', 'faithlee');
	echo $redis->get('myname') . "\n";	//faithlee

	$redis->del('myname');	
	var_dump($redis->get('myname'));//false
	
	//删除一个不存在的key
	if (!$redis->exists('fake_keys')) {
		var_dump($redis->del('fake_keys'));//0

		var_export($redis->del('fake_keys'));//0
	}
	
	//删除多个key
	$array_mset = array(
				'akey' => 'first_val',
				'bkey' => 'second_val',
				'ckey' => 'third_val'
			);
	$redis->mset($array_mset);	//mset一次储存多个值
	
	$key_args = array('akey', 'bkey', 'ckey');
	var_dump($res = $redis->mget($key_args));
	
	$array_mget = array_combine($key_args, $res);
	var_export($array_mget) . "\n";

	//同时删除多个key, 传入一个数组
	$redis->del($key_args);
	var_dump($redis->mget($key_args));


//	var_dump($result);


?>
