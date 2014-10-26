<?php
/**
 * @FileName: MyDatabaseTestCase.php
 * @Desc: 对PHPUnit_Extensions_Database_TestCase代码的重构，方便在测试中重用
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sun 26 Oct 2014 07:18:02 PM CST
 */

abstract class MyDatabaseTestCase extends PHPUnit_Extensions_Database_TestCase {
	//只实例化一次，供测试的清理和基境读取使用
	static private $pdo = null;	
	
	//对于每个测试，只实例化PHPUnit_Extensions_Database_DB_IDatabaseConnection一次
	private $conn = null;	

	final public function getConnection()
	{
		if ($this->conn === null) {
			if (self::$pdo == null) {
				#对数据库的链接信息硬编码
				self::$pdo = new PDO('mysql:host=localhost; dbname=test');
			}			

			$this->conn = $this->createDefaultfDBConnection(self::$pdo, 'test');
		}

		return $this->conn;
	}
}

