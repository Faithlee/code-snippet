<?php

//rename key newkey 
//将key更名为newkey

require 'connect.php';

//1、key exists but newkey not exists

$redis->set('message', "hello world");
$redis->rename('message', 'greeting');

var_dump($redis->exists('message'));	//false;
var_dump($redis->exists('greeting'));	//true;


//2、当key不存在时

var_dump($redis->rename('fake_key', 'not_exists'));	//false;


//3、当newkey存在时则会覆盖newkey

$redis->set('pc', 'leveno');
$redis->set('pc1', 'dell');

var_dump($redis->rename('pc', 'pc1'));

var_dump($redis->get('pc'));	//nil false;

var_dump($redis->get('pc1'));


?>
