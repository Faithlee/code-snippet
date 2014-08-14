<?php
/**
 * @FileName: callUserFunc.php
 * @Desc: 回调函数
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Thu 14 Aug 2014 11:22:52 PM CST
 */

function incre(&$val) {
	$val++;
}

$i = 0;
call_user_func('incre', $i);

echo $i, PHP_EOL;

call_user_func_array('incre', array(&$i));
echo $i, PHP_EOL;

//函数的回调
function barber($type) {
	echo "You wanter a $type haircut\n";
}

call_user_func('barber', 'mushroom');
call_user_func('barber', 'shave');

//类的回调
class myclass{
	static function sayHello($name = 'Sir')
	{
		echo "Hello, {$name} \n";
	}

	public function sayBye($name = 'lady')
	{
		echo "GoodBye, {$name}\n";
	}
}

$className = "myclass";
//静态方法调用
call_user_func(array($className, 'sayHello'), 'Kitty');
call_user_func($className . '::sayHello', 'John');

//成员方法调用
call_user_func(array($className, 'sayBye'), 'Jim');
$myclass = new $className();
call_user_func(array($myclass, 'sayBye'), 'Baby');



