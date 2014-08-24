<?php
/**
 * @FileName: classExist.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sun 24 Aug 2014 10:48:32 PM CST
 */
//1.class_exists, 默认调用autoload
//method_exists检查类的方法是否存在
$class = 'myClass';
if (class_exists($class, true)) {
	$myclass = new $class();
}

function __autoload($class) {
	include $class . '.php';
	echo 'i was autoloaded', PHP_EOL; //自动加载时输出
	if (!class_exists($class, false)) {
		trigger_error("Unable load class {$class}", E_USER_WARNING);
	}
}

//2.function_exists


//3.interface_exists
if (interface_exists('myInterface', false)) {
	class MyNewClass implements myInterface {
	
	}
} else {
	echo '指定myInterface的路径', PHP_EOL;
}


interface myInterface {

}

//4.get_declared_classes

print_r(get_declared_classes());

//echo DIRECTORY_SEPARATOR;
