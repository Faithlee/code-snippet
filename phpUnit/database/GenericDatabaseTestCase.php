<?php
/**
 * @FileName: GenericDatabaseTestCase.php
 * @Desc: 使用xml配置，为每个数据库测试配置单独的连接信息
 *		  在应用程序的目录下创建phpunit.xml文件
 * @Author: lijiawei
 * @Mail: li.jiawei@leftbrain.com.cn
 * @CTime: Sat 25 Oct 2014 05:34:18 PM CST
 */

class GenericDatabaseTestCase extends PHPUnit_Extensions_Database_TestCase {
	//只实例化一次
	static private $pdo = null;

	//每个测试实例化一个PHPUnit_Extensions_Database_DB_IDatabaseConnection 
	private $conn = null;

	final public function getConnection()
	{
		if ($this->conn == null) {
			if (self::$pdo == null)	{
				self::$pdo = new PDO($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['PASSWD']);
			}

			$this->conn = $this->createDefaultDBConnection(self::$pdo, $GLOBALS['DB_DBNAME']);
		}

		return $this->conn;
	}
}
