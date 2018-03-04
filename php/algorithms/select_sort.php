<?php
/**
 * @Desc: 直接排序法
 * @User: Faithlee
 * @Date: 2018-03-04
 * @Time: 2018-03-04
 */

require __DIR__ . '/random_arr.php';

/*{{{select_sort()*/

function select_sort(array $sort) 
{
	$n = count($sort);

	for ($i = 0; $i < $n; $i++) {
		$sign = $i;
		for ($j = $i + 1; $j < $n; $j++) {
			if ($sort[$j] < $sort[$sign]) {
				$sign = $j;
			}
		}

		$tmp = $sort[$sign];
		$sort[$sign] = $sort[$i];
		$sort[$i] = $tmp;
	}

	return $sort;
}

/*}}}*/

// test
$sort = random_arr();
$sort = select_sort($sort);
print_r($sort);


