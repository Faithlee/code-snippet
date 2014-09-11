<?php
/**
 * @FileName: Reflection.class.php
 * @Desc:  ReflectionClass Test
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Tue 12 Aug 2014 10:22:39 PM CST
 */

class Log {
	const EMERG = 0;
	const ALERT = 1;
	const CRIC  = 2;
	const ERROR = 3;
	const WARN  = 4;
	const NOTICE = 5;
	const INFO = 6;
	const DEBUG = 7;

	private $_priorities = array();

	public  function __construct()
	{
		$r = new ReflectionClass($this);

		$this->_priorities = array_flip($r->getConstants());
	}

	static public function factory()
	{
		$log = new self();

		return $log;
	}
	

	public function  getPriority()
	{
		return $this->_priorities;
	}
}

//构造函数
//$log = new Log();

//工厂模式
$log = Log::factory();



echo '当前类：' . get_class($log), PHP_EOL;

var_export($log->getPriority());


