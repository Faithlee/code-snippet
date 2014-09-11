<?php
/**
 * @FileName: setErrorHandle.php
 * @Desc: restore_error_handle test
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sat 30 Aug 2014 12:22:03 AM CST
 */

//22527 512 1024 256
echo error_reporting();
echo E_USER_WARNING;
echo E_USER_NOTICE;
echo E_USER_ERROR, PHP_EOL;

//trigger_error与set_error_handle配合使用
function myErrorHandler($errno, $error, $errline, $errfile)
{
	if (!(error_reporting() & $errno)) {
		return ;
	}

	switch ($errno) {
		case E_USER_ERROR:
			echo "[$errno] $error\n";
			echo " Fatal error on line $errline in file $errfile";
			echo ", PHP " . PHP_VERSION . ' (' . PHP_OS . ')';
			echo "Aborting ...\n";
			break;
		case E_USER_WARNING:
			echo "My Warnging [$errno] $error\n";
			break;

		case E_USER_NOTICE:
			echo "My Notice [$errno] $error\n";
			break;
		default:
			echo "unknown error type: [$errno] $error";
			break;

	}

	return true;
}

function scale_by_log($vect, $scale) 
{
	if (!is_numeric($scale) || $scale <= 0) {
		trigger_error("log(x) for x<= 0 is undefined", E_USER_ERROR);
	}

	if (!is_array($vect)) {
		trigger_error('Incorrect input vector', E_USER_ERROR);
	}

	foreach ($vect as $val) {
		if (!is_numeric($val)) {
			trigger_error('Invalid input and not a number, using 0(zero)', E_USER_NOTICE);
			$val = 0;
		}

		$temp[] = log($scale) * $val;
	}

	return $temp;

	return true;
}

$errorHandle = set_error_handler('myErrorHandler');
$a = array(2, 3, 'foo', 5.5, 43.3);

$b = scale_by_log($a, M_PI);
var_dump($b);

//restore_error_handle() 还原之前的错误处理函数

$serializeStr = 'abc';
set_error_handler('unserialize_handle');
set_error_handler('unserialize_handler');

/*{{{restore_error_handler()的位置:1*/
//1.输出unserialize_handle的错误
restore_error_handler();
$origin =  unserialize($serializeStr);
/*}}}*/

/*{{{restore_error_handler()的位置:2*/
//1.输出unserialize_handler的错误
$origin = unserialize($serializeStr);
restore_error_handler();
/*}}}*/

//一直恢复则只输出默认系统错误
//restore_error_handler();
unserialize($serializeStr);

//restore_error_handler();
unserialize($serializeStr);

function unserialize_handle($errno, $errstr)
{
	echo 'invalid serialized value', PHP_EOL;
}

function unserialize_handler($errno,$errstr)
{
	echo "test restore_error_handler(), invalid serialize value\n";
}


/**
 * 重点注意最后一个参数, 将错误信息组成一个数组
 * 
 * @param mixed $errno 
 * @param mixed $errstr 
 * @param mixed $errfile 
 * @param mixed $errline 
 * @param mixed $errorContext 
 * @access public
 * @return void
 */
function errorFunction($errno, $errstr, $errfile, $errline, $errorContext){
	var_export($errorContext);
}

class testError {
	private $id;

	public function __construct($id)
	{
		$this->id = $id;	

		trigger_error('Test error!');
	}
}

set_error_handler('errorFunction');
$test = new testError(3);

