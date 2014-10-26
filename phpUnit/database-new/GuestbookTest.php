<?php
/**
 * @FileName: GuestbookTest.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sun 26 Oct 2014 10:34:29 PM CST
 */

require_once './NewMyDatabaseTestCase.php';
class GuestbookTest extends NewMyDatabaseTestCase {
	public function getDataSet()	
	{
		$xml = 'guestbook.xml';

		return $this->createFlatXMLDataSet($xml);
	}

	public function testAddEntry()			
	{
		$this->assertEquals(2, $this->getConnection()->getRowCount('guestbook'), 'Pre-Condition');
		#$this->fail('测试没有通过');

		$guestbook = new Guestbook(self::$pdo);
		$guestbook->addEntry(array(
			'user' => 'suzy',
			'content' => 'hello world',
			'created' => '2014-01-01' 
		));

		$this->assertEquals(3, $this->getConnection()->getRowCount('guestbook'), 'inserting failed');
	}
}

class Guestbook {
	private $_conn = null;

	public function __construct($conn)
	{
		if ($this->_conn === null) {
			$this->_conn = $conn;
		}
	}

	public function addEntry($param) 
	{
		try {
			$sql = "insert into guestbook(user, content, created) values ('{$param['user']}', '{$param['content']}', '{$param['created']}')";
			$this->_conn->exec($sql);
		} catch (Exception $e) {
			throw new InvalidArgumentException('$param is not used!');
		}
	}
}
