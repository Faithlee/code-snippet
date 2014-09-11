<?php
/**
 * @FileName: Priority.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Thu 14 Aug 2014 10:12:18 PM CST
 */

class Priority {
	protected $_priority;

	protected $_operator;

	public function __construct($priority, $operator = null) 
	{
		if (!is_int($priority))	{
			require './Exception.class.php';
			throw new MyException("\$priority is int type");
		}

		$this->_priority = $priority;
		$this->_operator = $operator === null ? '<=' : $operator;
	}
	
	public function addPriority($name, $priority)
	{
		$name = strtoupper($name);

		if (isset($this->_priority[$priority]) ||
			false !== array_search($name, $this->_priority)) {
			require './Exception.class.php';
			throw new MyException('Existing Priority cannot be overwriten!' . PHP_EOL);
		}

		$this->_priority[$priority] = $name;
		return $this;	
	}


	public function _constructFromConfig($config, $type, $namespace)
	{
		$params = isset($config[$type . 'Param']) ? $config[$type . 'Param'] : array();

		$className = $this->_getClassName($config, $type, $namespace);
		if (!class_exists($className)) {
			//模拟加载类
			$this->_loadClass($className);
		}

		$reflection = new ReflectionClass($className);
		if (!$reflection->implementsInterface('Interface')) {
			require './Exception.class.php';
			throw new MyException('can not be constructed from config and does not implements Interface');
		}
		
		return call_user_func(array($className, 'factory'), $params);
	}

	protected function _getClassName($config, $type, $defaultNameSpace)
	{
		$className = $config[$type . 'Name'];
		$namespace = $defaultNameSpace;

		if (isset($config[$type . 'Namespace'])) {
			$namespace = $config[$type . 'Namespace'];
		}

		//PHP>=5.3.0
		if (substr($namespace, -1) == '\\') {
			return $namespace . $className;
		}

		if (strlen($namespace) === 0) {
			return $className;
		}

		return $namespace . '_' . $className;
	}

	public function accept($event)
	{
		return version_compare($event['priority'], $this->_priority, $this->_operator);
	}
}


//代码测试
try {
	$priority = new Priority(7);
} catch (MyException $e) {
	echo $e->getMessage(), PHP_EOL;
}

$event = array('priority' => 1);
var_dump($priority->accept($event));
