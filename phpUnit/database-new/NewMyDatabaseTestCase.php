<?php
/**
 * @FileName: NewMyDatabaseTestCase.php
 * @Desc: 采用配置对数据库的连接代码重构 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sun 26 Oct 2014 07:30:31 PM CST
 */

abstract class NewMyDatabaseTestCase extends PHPUnit_Extensions_Database_TestCase {
	static protected $pdo = null;

	private $conn = null;		

	final public function getConnection()
	{
		if ($this->conn === null) {
			if (self::$pdo === null) {
				self::$pdo = new PDO($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD']);
			}

			$this->conn = $this->createDefaultDBConnection(self::$pdo, $GLOBALS['DB_DBNAME']);
		}

		return $this->conn;
	}
}
