<?php
/**
 * @FileName: Db.php
 * @Desc: 
 * @Author: Faithlee
 * @Mail: lijiabin098@126.com 
 * @CTime: Tue 16 Dec 2014 12:29:16 AM CST
 */

class DbController extends Yaf_Controller_Abstract {
	private $_db = null;
	public function init()
	{
		$this->_db = Yaf_Registry::get('dbAdapter');

		#$this->_db->query('set names utf8');
	}

	public function indexAction()
	{
		echo __METHOD__ . '<br/>';

		$dispatcher = Yaf_Dispatcher::getInstance();
		$dispatcher->disableView();

		$test = new Zend_Db_Table(array('name' => 'dept', 'primary' => 'deptno'));

		#print_r($test->find(array(1, 2, 3, 4))->toArray());
		
		$deptArr = $test->fetchAll()->toArray();
		print_r($deptArr);

		echo __METHOD__ . '<br/>';
	}

	public function addAction()	
	{

		Yaf_Dispatcher::getInstance()->disableView();
		$nameArr = array('行政部', '市场部', '助理组', '内容部', '营销部', '区域部');
		
		$randName = array_rand($nameArr);

		$deptArr = array(
			'name' => $nameArr[$randName],
		);

		$dept = new Zend_Db_Table(array('name' => 'dept', 'primary' => 'deptno'));
		if ($dept->insert($deptArr)) {
			echo '<script>alert("添加成功！")</script>';

			$this->forward('index');
		}
	}


	public function updateAction()
	{
		Yaf_Dispatcher::getInstance()->autoRender(false);
		$dept = new Zend_Db_Table(array('name' => 'dept', 'primary' => 'deptno'));

		$update = array('name' => '技术部111');
		$where = $this->_db->quoteInto('deptno=?', 10001);
		$dept->update($update, $where);

		$this->forward('index');
	}
}
