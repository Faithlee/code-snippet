<?php
/**
 * @FileName: DbtableController.php
 * @Desc: zend_db_table表模块，通过适配器链接数据库；
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sun 21 Sep 2014 06:27:39 PM CST
 */

require APPLICATION_PATH . '/controllers/BaseController.php';

class DbtableController extends BaseController {
	public function init()
	{
		parent::init();

		Zend_Db_Table::setDefaultAdapter($this->_db);
	}

	public function indexAction()
	{
		echo 'zend_db_table表模块，通过适配器链接数据库';		
		$config = array(
			'name' => 'dp_log',
			'primary' => 'id',
		);
		$table = new Zend_Db_Table($config);
		print_r($table);

		#将db库的操作放在models模块，

		die;
	}

	public function insertAction()	
	{
		$table = new DbTable();

		$data = array(
			'title'	=> 'zend db table',
			'detail' => 'zend db table test',
			'created_user' => 'hello'
		);

		$affected = $table->insert($data);
		var_dump($affected);

		die;
	}
		
	public function updateAction()
	{
		$table = new DbTable();
		$db = $table->getAdapter();
		$set = array('title' => 'update zend table');
		$where = $db->quoteInto('id=?', 2042);

		$affected = $table->update($set, $where);

		var_dump($affected);
		die;	
	}
		

}
