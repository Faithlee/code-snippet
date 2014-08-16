<?php
/**
 * @FileName: jsonEncode.php
 * @Desc: 关于连续与非连续数组json格式化
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sat 16 Aug 2014 11:49:44 PM CST
 */

$sequential = array('foo', 'bar', 'baz', 'blong');
echo '连续数组：json格式化后是方括号', PHP_EOL;
var_dump(
	$sequential, 
	json_encode($sequential)
);

$nosequential = array(
	1 => 'foo',
	2 => 'bar',
	3 => 'baz',
	4 => 'blong',
);

echo '非连续数组：json格式化是花括号：', PHP_EOL;
var_dump(
	$nosequential,
	json_encode($nosequential)
);

unset($sequential[1]);
echo "删除一个连续数组将产生非连接数组", PHP_EOL;
var_dump(
	$sequential,
	json_encode($sequential)
);



