<?php

//renamenx key newkey
//当且仅当newkey不存在时，将key改为newkey

require 'connect.php';

//1、newkey不存在成功：

$redis->set('player', 'MPlayer');
var_dump($redis->exists('player'));

echo $redis->exists('best_player');
var_dump($redis->renamenx('player', 'best_player'));	//true

//2、newkey存在时失败

$redis->set('animal', 'bear');
$redis->set('type', 'animal');

var_dump($redis->renamenx('animal', 'type'));	//false

var_dump($redis->get('animal'));	//bear
var_dump($redis->get('type'));	//animal

?>
