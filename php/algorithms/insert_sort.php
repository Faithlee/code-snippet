<?php
/**
 * @Desc: 插入排序法
 * @User: Faithlee
 * @Date: 2018-03-04
 * @Time: 2018-03-04
 */

require __DIR__ . '/random_arr.php';

/*{{{插入排序法原理*/

// 1. 将30插入到一个排序好的数组中
$arr = range(10, 50, 3); 
$count = count($arr);

$insert = 30;

for ($j = $count - 1; $j >= 0 && $arr[$j] > $insert; $j--) {
	$arr[$j+1] = $arr[$j];
	$arr[$j]   = $insert;
}

//print_r($arr);

/*}}}*/
/*{{{插入排序法*/

/**
 * 插入排序法
 */
function insert_sort(array $sort) { 
	$count = count($sort);

	for ($i = 1; $i < $count; $i++) {
		$insert = $sort[$i];
		for ($j = $i - 1; $j >= 0 && $sort[$j] > $insert; $j--) {
			$sort[$j+1] = $sort[$j];
			$sort[$j]   = $insert;
		}
	}

	return $sort;
}

/*}}}*/

// test
$sort = random_arr(); 
$sort = insert_sort($sort); 
print_r($sort);

