<?php

//检查key是否存在
//exists key

require 'connect.php';

$redis->set('db', 'redis');

var_dump($redis->exists('db'));

$redis->del('db');

var_dump($redis->exists('db'));

?>
