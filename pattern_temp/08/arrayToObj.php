<?php
/**
 * @FileName: arrayToObj.php
 * @Desc: 数组转化对象
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Wed 13 Aug 2014 11:07:40 PM CST
 */

class arrayToObj {
	/**
	 * _data 
	 * 
	 * @var mixed
	 * @access protected
	 */
	protected $_data;


	protected $_count = 0;

	public function __construct(array $array)
	{
		foreach ($array as $key => $val) {
			if (is_array($val)) {
				$this->_data[$key] = new self($val);
			} else {
				$this->_data[$key] = $val;
			}
		}

		$this->_count = count($this->_data);
	}

	public function get($name, $default = null)
	{
		$result = $default;	
		if (array_key_exists($name, $this->_data)) {
			$result = $this->_data[$name];
		}

		return $result;
	}

	public function __get($name) 
	{
		return $this->get($name);
	}


	public function __set($name, $value)
	{
		if (is_array($value)) {
			$this->_data[$key] = new self($value);
		} else {
			$this->_data[$key] = $value;
		}

		$this->_count = count($this->_data);
	}

	
	/**
	 * toArray 将多维数组转换为一维数组
	 * 
	 * @access public
	 * @return void
	 */
	public function toArray()
	{
		$array = array();
		$data = $this->_data;

		foreach ($data as $key => $val) {
			if ($val instanceof arrayToObj) {
				$array[$key] = $val->toArray();
			} else {
				$array[$key] = $val;
			}
		}


		return $array;
	}
}

//配置一
$config = array(
	'host' => 'localhost',
	'dbname' => 'xgo_db',
	'passwd' => '******',
);

//配置二
$config = array(
	'webhost' => 'www.example.com',
	'database' => array(
		'adapter' => 'pdo_mysql',
		'param' => array(
			'host'	 => 'db.demo.com',
			'usernaem' => 'dbuser',
			'passwd' => 'secret',
			'dbname' => 'databases'
		),
	),
);

$arrayObj = new arrayToObj($config);

//通过键获取值
echo $arrayObj->webhost, PHP_EOL;

//通过魔术方法获取参数值
print_r($arrayObj->database->adapter);

//将数组转化为对象
print_r($arrayObj->toArray());

if ($config instanceof arrayToObj) {
	echo 'Yes', PHP_EOL;
} else {
	echo 'No!';
}

