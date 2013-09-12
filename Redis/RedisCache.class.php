<?php


class RedisCache extends Redis
{
	
	/*{{{members */
	/**
	 * redis 
	 * 
	 * @var mixed
	 * @access private
	 */
	private $redis;
	/**
	 * 连接或操作错误 
	 * 
	 * @var string
	 * @access private
	 */
	private static $error = '连接失败!';	
	/*}}}*/
	/*{{{function*/
	/*{{{public function __construct()*/
	/**
	 * __construct 
	 * 
	 * @param array $config(server=>localhost, port=>6379, db=>0)
	 * @param int $time 
	 * @access public
	 * @return void
	 */
	public function __construct($config, $timeout = 3)
	{
		if (!preg_match('/^\d{1,3}.(\d{1,3}.){2}\d{1,3}$/', $config['server'])) {
			return self::$error;
		} 
		$this->redis = self::initRedis($config, $timeout);
	}
	/*}}}*/
	/*{{{protected static function initRedis()*/
	protected static function initRedis($config, $timeout) 
	{
		$redis = new Redis();
		$connected = false;
		$count	   = 0;

		while ($connected == false && $count < $timeout) {
			try {
				if ($redis->connect($config['server'], $config['port'], $timeout)) {
					if ($config['db']) {
						$redis->select($config['db']);
					}
					$connected = true;
				}
	
				$count++;
			} catch(RedisException $e) {
				self::$error = __FILE__ . ' ' . __LINE__ . $e->getMessage();
			}
		}
		
		if ($redis instanceof Redis && isset($redis->socket)) {
			return $redis;	
		}

		return false;
	}
	/*}}}*/
	/*{{{public function set()*/
	/**
	 * set 
	 * 
	 * @param mixed $key 
	 * @param mixed $value 
	 * @param int $expire 
	 * @param bool $serialize 
	 * @access public
	 * @return void
	 */
	public function set($key, $value, $expire = 3600, $serialize = true)
	{
		if (!is_array($value)) {
			$value = array($value);
		}
		
		if ($serialize) {
			$value = serialize($value);
		}

		return $this->redis->setex($key, $expire, $value);
	}
	/*}}}*/
	/*{{{public function get()*/
	/**
	 * get 
	 * 
	 * @param mixed $key 
	 * @param boolean $serialize 
	 * @access public
	 * @return array
	 */
	public function get($key, $serialize = true)
	{
		if (!$this->redis->exists($key)) {
			return false;
		}

		if (!is_array($key)) {
			$key = array($key);
		}

		$values = $this->redis->mget($key);
		if ($serialize) {
			foreach ($values as $key => $val) {
				$values[$key] = unserialize($val);
			}
		}
		
		return $values;
	}
	/*}}}*/
	/*{{{*/
	public function delete($key)
	{
		
	}
	/*}}}*/

	/*}}}*/

} 

$config = array('server' => '127.0.0.1', 'port' => '6379', 'db' => 0);

$redisObj = new RedisCache($config);

//var_dump($redisObj->set('names', 'gexingwang', 3600));
$args = array(
		'name'	 => 'lisi',
		'age'	 => '24',
		'sex'	 => 'female'
	);
var_dump($redisObj->set('person', $args, 3600));
var_dump($redisObj->get('person'));


?>
