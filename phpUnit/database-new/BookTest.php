<?php
/**
 * @FileName: BookTest.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sun 26 Oct 2014 06:53:25 PM CST
 */

class BookTest extends PHPUnit_Extensions_Database_TestCase {
	/**
	 * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
	 */
	public function getConnection()
	{
		//'mysql:host=localhost;dbname=test'
		$dns = 'mysql:dbname=test;unix_socket=/mysql.sock';
		$pdo = new PDO($dns, 'root', '');	

		return $this->createDefaultDBConnection($pdo, 'test');
	}

	#将测试数据储存至数据库
	public function getDataSet()
	{
		$xml = './guestbook.xml';
		return $this->createFlatXMLDataSet($xml);
	}

	public function testGuestBook()
	{
		$dataSet = $this->getConnection()->createDataSet();
		#var_dump($dataSet)	;

		#$xml = './guestbook.xml';
		#$table = $this->createFlatXMLDataSet($xml)->getTable('guestbook');
		#var_dump($table)	;
		//$tableName = array('guestbook');
		//$dataSet = $this->getConnection()->createDataSet($tableName);
	}
	
	public function testQueryDataSet()
	{
		$ds = new PHPUnit_Extensions_Database_DataSet_QueryDataSet($this->getConnection());

		$ds->addTable('guestbooked');
	}

	public function testQueryDataSet2()
	{
		$ds = new PHPUnit_Extensions_Database_DataSet_QueryDataSet($this->getConnection());

		$res = $ds->addTable('guestbook', 'select * from guestbook');

		//var_dump($res);
	}

	#创建 QueryTable 的实例
	public function testCreateQueryTable()	
	{
		$table = array('guestbook');

		$queryTable = $this->getConnection()->createQueryTable('guestbook', 'select * from guestbook');

		#print_r($queryTable);
	}

	public function testGetRowCount()
	{
		$this->assertEquals(3, $this->getConnection()->getRowCount('guestbook'), 'guestbook的数量是2: false');
	}
}
