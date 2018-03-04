<?php
/** 
 * @Desc: 冒泡排序
 * @User: Faithlee
 * @Date: 2018-03-04
 * @Time: 2018-03-04
 */

require __DIR__ . '/random_arr.php';

/*{{{bubble_sort()*/

function bubble_sort(array $sort) {
	$count = count($sort);
	for($i = 0; $i < $count; $i++) {
		for ($j = $i + 1; $j < $count; $j++) {
			if ($sort[$i] > $sort[$j]) {
				$tmp = $sort[$i];
				$sort[$i] = $sort[$j];
				$sort[$j] = $tmp;
			}
		}
	}

	return $sort;
}

/*}}}*/

// test
$sort = random_arr();
$sort = bubble_sort($sort);
print_r($sort);
