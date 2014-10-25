<?php
/**
 * @FileName: TableTest.php
 * @Desc: 
 * @Author: lijiawei
 * @Mail: li.jiawei@leftbrain.com.cn
 * @CTime: Sat 25 Oct 2014 05:13:51 PM CST
 */

class TableTest extends PHPUnit_Extensions_Database_TestCase {
	/**
	 * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
	 */
	public function getConnection()
	{
		$pdo = new PDO('mysql:dbname=test;host=localhost');

		return $this->createDefaultDbConnection($pdo, ':test:');
	}

	/**
	 * @return PHPUnit_Extensions_Database_DataSet_IDataSet
	 */
	public function getDataSet()
	{
		$config = dirname(__FILE__) . 'table.xml';
		return $this->createFlatXMLDataSet($config)	;
	}
}
