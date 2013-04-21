<?php
//keys pattern 查找符合约定模式的key. * 、? [xxx]
//key速度非常快，但在一个大的数据库中使用仍然会造成性能问题
//如果从数据集查找特定的key，最好还是用set

require 'conn.php';

$array_mset_keys = array(
			'one' => '1',
			'two' => '2',
			'three' => '3',
			'four' => '4'
		);

	$redis->mset($array_mset_keys);
	
	var_export($redis->keys('*o*'));
	var_export($redis->keys('t??'));
	var_export($redis->keys('t[w]*'));
	print_r($redis->keys('*'));
	
	

?>
