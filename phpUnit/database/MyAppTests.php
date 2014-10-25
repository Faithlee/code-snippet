<?php
/**
 * @FileName: MyAppTests.php
 * @Desc: 硬编码数据库的连接信息
 * @Author: lijiawei
 * @Mail: li.jiawei@leftbrain.com.cn
 * @CTime: Sat 25 Oct 2014 05:24:09 PM CST
 */

abstract class MyAppTests extends PHPUnit_Extension_Database_TestCase {
	//只实例化pdo一次
	static private $pdo = null;

	//对于每个测试，只实例化PHPUnit_Extension_Database_Db_IDatabaseConnection
	private $conn = null;
		
	final public function getConnection()
	{
		if ($this->conn == null) {
			if (self::$pdo == null) {
				self::$pdo = new PDO('mysql:dbname=test;host=localhost');
			}

			$this->conn = $this->createDefaultDBConnection(self::$pdo, ':test:');
		}

		return $this->conn;
	}
}
