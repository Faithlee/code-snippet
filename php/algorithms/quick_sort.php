<?php
/**
 * @Desc: 快速排序法
 * @User: Faithlee
 * @Date: 2018-03-04
 * @Time: 2018-03-04
 */

require __DIR__ . '/random_arr.php';

/*{{{function quick_sort(array $sort)*/

function quick_sort(array $sort) 
{ 
	$n = count($sort);
	if ($n <= 1) {
		return $sort;
	}

	$base = $sort[0];	
	$left = [];
	$right = [];

	for ($i = 1; $i < $n; $i++) {
		if ($sort[$i] > $base) {
			$right[] = $sort[$i];
		} else {
			$left[] = $sort[$i];
		}
	}

	$left = quick_sort($left);	
	$right = quick_sort($right);

	return array_merge($left, [$base], $right);
}

/*}}}*/

// test
//$sort = random_arr();
//print_r($sort);
//$sort = quick_sort($sort);
//print_r($sort);
