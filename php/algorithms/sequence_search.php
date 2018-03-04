<?php
/**
 * @Desc: 顺序查找法
 * @User: Faithlee
 * @Date: 2018-03-04
 * @Time: 2018-03-04
 */

require __DIR__ . '/random_arr.php';

/*{{{function sequence_search(array $haystack, $needle)*/

function sequence_search(array $haystack, $needle) 
{
	foreach ($haystack as $key => $val) {
		if ($val == $needle) {
			return $key;
		}
	}

	return -1;
}

/*}}}*/


// test
$sorted = array (
  0 => 11,
  1 => 26,
  2 => 27,
  3 => 34,
  4 => 69,
  5 => 72,
  6 => 83,
  7 => 88,
  8 => 89,
  9 => 99,
);

$result = sequence_search($sorted, 88);
var_dump($result);
