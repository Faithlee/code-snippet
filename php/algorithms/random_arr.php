<?php
/**
 * @Desc: 生成10个随机数数组
 * @User: Faithlee
 * @Date: 2018-03-04
 * @Time: 2018-03-04
 */

/*{{{随机数数组*/

function random_arr() {
	$arr = [];
	$num = 10;

	while (count($arr) < $num) {
		$key = rand(1, $num * 10);
		$arr[$key] = 1;
	}

	$arr = array_keys($arr);

	return $arr;
}

/*}}}*/

// test
//print_r(random_arr());
