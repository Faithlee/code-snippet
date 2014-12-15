<?php
/**
 * @FileName: Db.php
 * @Desc: 
 * @Author: Faithlee
 * @Mail: lijiabin098@126.com 
 * @CTime: Tue 16 Dec 2014 12:29:16 AM CST
 */

class DbController extends Yaf_Controller_Abstract {
	public function init()
	{
	
	}

	public function indexAction()
	{
		echo __METHOD__ . '<br/>';

		$dispatcher = Yaf_Dispatcher::getInstance();
		$dispatcher->disableView();

		$test = new Zend_Db_Table(array('name' => 'dept', 'primary' => 'deptno'));

		print_r($test->find(array(1, 2, 3, 4))->toArray());

		echo __METHOD__ . '<br/>';
	}
}
