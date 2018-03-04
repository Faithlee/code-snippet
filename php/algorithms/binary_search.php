<?php
/**
 * @Desc: 二分查找法
 * @User: Faithlee
 * @Date: 2018-03-04
 * @Time: 2018-03-04
 */

require __DIR__ . '/quick_sort.php';

/**
 * 二分查找法必须要求数组是排序好的
 */
/*{{{function binary_search(array $sorted, $needle, $start, $end)*/

// 递归方式
function binary_search(array $sorted, $needle, $start, $end):int
{
	$count = count($sorted);	
	$mid   = floor(($start + $end) / 2);
	
	if ($needle > $sorted[$mid]) {
		return binary_search($sorted, $needle, $mid + 1, $end);
	} else if ($needle < $sorted[$mid]) {
		return binary_search($sorted, $needle, $start, $mid - 1);
	} else if ($needle == $sorted[$mid]) {
		return $mid;
	}

	return -1;
}

/*}}}*/
/*{{{function binary_search2(array $sorted)*/

// 非递归方式
function binary_search2(array $sorted, $needle):int
{
	$start = 0;		
	$end   = count($sorted) - 1;

	while ($start <= $end) {
		$mid   = intval(($start + $end) / 2);

		if ($sorted[$mid] == $needle) {
			return $mid;	
		} else if ($sorted[$mid] < $needle) {
			$start = $mid + 1;	
		} else if ($sorted[$mid] > $needle) {
			$end = $mid -1;	
		}
	}

	return -1;
}

/*}}}*/

//$arr = random_arr();
//$sorted = quick_sort($arr);
//var_export($sorted);

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

// test 递归
//$result = binary_search($sorted, 27, 0, count($sorted));

// test 
$result = binary_search2($sorted, 88);

var_dump($result);
