<?php
/**
 * @FileName: LogController.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sun 31 Aug 2014 06:39:41 PM CST
 */

class LogController extends Zend_Controller_Action {
	public function init()
	{
		Zend_Loader::loadClass('Table');
	}

	/**
	 * Zend_Db_Table 测试 
	 * 
	 * @access public
	 * @return void
	 */
	public function tableAction()
	{
		$logTable = new Table();
		$param = $this->_getParam('username');

		$request = $this->getRequest();
		$username = $request->getParam('username');
		$name = $this->_request->get('username');
		var_dump($param, $username, $name);

		//print_r($logTable);die;
		echo 'setup 设置成功';
		die;
	}

	/**
	 * insert 
	 * 
	 * @access public
	 * @return void
	 */
	public function addAction()
	{
		$logTable = new Table();
		$logData = array(
			'title' => 'add log',
			'detail' => 'add log success',
			'created_user' => 'user1',
			'created_date' => date('Y-m-d')
		);

		$logId = $logTable->insert($logData);
		var_export($logId);

		die;
	}


	/**
	 * 更新一条记录 
	 * 
	 * @access public
	 * @return void
	 */
	public function updateAction()	
	{
		$logTable = new Table();
		$data = array(
			'title'	=> 'add content failed',
		);

		$db = $logTable->getAdapter();
		//$where = $db->quoteInto('title = ?', 'title test');
		$where = $db->quoteInto('id = ?', 2038);
		$set = array(
			'created_user' => 'user123',
			'created_date' => date('Y-m-d H:i:s')
		);
		
		$affected = $logTable->update($set, $where);

		var_dump($affected);
		die;
	}

	/**
	 * table delete 测试 
	 * 
	 * @access public
	 * @return void
	 */
	public function deleteAction()
	{
		$logTable = new Table()	;
		$db = $logTable->getAdapter();

		//删除一条
		//$where = $db->quoteInto('id = ?', 1525);

		//删除多条
		$where = $db->quoteInto('id IN(?)', array(1524, 1523, 1522, 1521));

		//注意是table对象，不是db对象
		$affected = $logTable->delete($where);
		
		var_dump($affected);
		
		die;
	}


	/**
	 * 根据主键查找 
	 * 
	 * @access public
	 * @return void
	 */
	public function findAction()
	{
		$logTable = new Table();
		//$db = $logTable->getAdapter();

		//查找一条
		$oneRow = $logTable->find(1);
		print_r($oneRow);


		$rows = $logTable->find(array(1, 2, 3));
		print_r($rows);
		die;	
	}

	
	/**
	 * fetchRow：where条件加order排序
	 * 
	 * @access public
	 * @return void
	 */
	public function fetchrowAction()
	{
		$logTable = new Table();
		$db = $logTable->getAdapter();

		$where = $db->quoteInto('id=?', '1520')
			. $db->quoteInto('and title=?', 'title test');

		$order = 'id';

		$row = $logTable->fetchRow($where, $order);
		print_r($row);

		die;
	}
	
	/**
	 * fetchallAction:取回多条记录
	 * 
	 * @access public
	 * @return void
	 */
	public function fetchallAction()
	{
		$logTable = new Table();
		$db = $logTable->getAdapter();
		
		//where order count offset

		$where = $db->quoteInto('title=?', 'title test');

		$order = 'id desc';
		$count = 10;
		$offset = 20;

		$rows = $logTable->fetchAll($where, $order, $count, $offset);

		print_r($rows);

		die;
	}

	/**
	 * selfdefineAction:自定义查询方法
	 * 
	 * @access public
	 * @return void
	 */
	public function selfdefineAction()
	{
		$title = 'title test';
		$count = 30;

		$logTable = new Table();

		$rows = $logTable->findAllWithName($title, $count);

		//var_dump($rows);

		die;
	}
	

	/**
	 * quote测试 
	 * 
	 * @access public
	 * @return void
	 */
	public function quoteAction()
	{
		$logTable = new Table();
		$db = $logTable->getAdapter();
		
		//quote防止数据库攻击，为标量加合适的引号
		$value = $db->quote('St John"s wort');
		//'St John\"s wort'
		echo $value, PHP_EOL;
		
		//为数组加引号	
		$value = $db->quote(array('a', 'b', 'c'));
		//''a', 'b', 'c''
		var_dump($value);

		die;
	}

	public function quoteintoAction()
	{
		$logTable = new Table();

		$db = $logTable->getAdapter();
		$where = $db->quoteInto('id = ?', 1);
		echo $where, PHP_EOL;

		$where1 = $db->quoteInto('id IN (?)', array(1, 2, 3));
		echo $where1;
		die;
	}

	public function queryAction()	
	{
		$logTable = new Table();
		$db = $logTable->getAdapter();

		//使用点位符
		$sql = $db->quoteInto('select * from dp_log where created_user = ?', 'user1');
		//echo $sql;

		//query与fetchAll配合使用
		$result = $db->query($sql);
		$rows = $result->fetchAll();
		print_r($rows);
		

		//使用绑定占位符
		$assocRows = $db->fetchAssoc('select * from dp_log where id = :logid', array(':logid' => 2038));
		print_r($assocRows)	;

		die;
	}

	public function bindAction()
	{
		$logTable = new Table();
		$db = $logTable->getAdapter();
		//设定一个PDOStatement 
		$stmt = $db->prepare('SELECT * FROM dp_log where id = :logid');
		$stmt->bindValue('logid', '2038');
		$stmt->execute();

		$rows = $stmt->fetchAll();

		print_r($rows);

		die;
	}
}
