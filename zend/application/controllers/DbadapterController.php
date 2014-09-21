<?php
/**
 * @FileName: DbtestController.php
 * @Desc: Zend_Db模块测试
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sun 21 Sep 2014 11:33:59 AM CST
 */

require APPLICATION_PATH . '/controllers/BaseController.php';

class DbadapterController extends BaseController {

	public function quoteAction()
	{
		#标量
		$res = $this->_db->quote('St John"s Wort');
		echo $res;

		#浮点数
		$float = $this->_db->quote(1.1314);
		echo $float .'<br.>';
		
		#数组
		$arr = array('a', 'b', 'c');
		var_export($arr);
		$res1 = $this->_db->quote($arr);
		var_export($res1);
		
		$where = $this->_db->quoteInto('id=?', 1);
		var_dump($where);

		$where1 = $this->_db->quoteInto('id IN(?)', array(1,2,3));
		var_dump($where1);
		
		die;
	}


	public function queryAction()
	{
		#使用SQL查询 [hasPluginResource报错]
		$sql = $this->_db->quoteInto('select * from dp_log where id < ?', 10);
		$result = $this->_db->query($sql);
		$row = $result->fetchAll();
		print_r($row);

		#绑定占位符
		$result = $this->_db->query('select * from dp_log where id < :id', array('id' => 20));
		$rows = $result->fetchAll();
		print_r($rows)	;

		die;
	}

	public function prepareAction()
	{
		#prepare
		$stmt = $this->_db->prepare('SELECT * FROM dp_log where id < :id');
		$stmt->bindValue('id', 20);
		$stmt->execute();

		$rows = $stmt->fetchAll();
		print_r($rows);
		
		Zend_Loader::loadClass('Zend_View');
		$view = new Zend_View();
		$view->rows = $rows;
	}


	public function insertAction()
	{
		$data = array(
			'title' => 'db adapter',
			'detail' => 'db adapter test',
			'created_user' => 'root',
			'created_date' => date('Y-m-d')
		);

		$res = $this->_db->insert('dp_log', $data);
		$last = $this->_db->lastInsertId();

		var_dump($last);
		die;
	}

	public function updateAction()
	{
		$set = array('title' => 'db adapter test');

		#需要对where绑定参数
		$where = $this->_db->quoteInto('id=?', 1526);

		$affected = $this->_db->update('dp_log', $set, $where);

		var_dump($affected);

		die;
	}


	public function deleteAction()
	{
		$where = $this->_db->quoteInto('id IN(?)', array(1518, 1517));
		$affected = $this->_db->delete('dp_log', $where);

		var_dump($affected);
		die;
	}

	#以fetch开头的方法代替query方法，但需要传入selectSql诗句
	public function fetchAction()
	{
		#fetchAll|fetchAssoc|fetchCol|fetchOne|fetchPairs|fetchRow
		$result = $this->_db->fetchRow('select * from dp_log where id<?', 10);
		print_r($result);

		die;
		
	}
}
