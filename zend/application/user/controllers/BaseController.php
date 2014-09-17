<?php
/**
 * @FileName: BaseController.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Wed 17 Sep 2014 10:25:11 PM CST
 */

class User_BaseController extends Zend_Controller_Action {
	public function init()
	{
		//$config = APPLICATION_PATH . '/configs/application.ini'; $dbConfig = new Zend_Config_Ini($config, 'mysql');
		//$db = Zend_Db::factory($dbConfig->db);
		//Zend_Db_Table::setDefaultAdapter($db);
		//$this->db = Zend_Db::factory('Pdo_Mysql', array(
		//	'host'     => 'localhost',
		//	'username' => 'root',
		//	'password' => '123456',
		//	'dbname'   => 'dwz'
		//));
	
	}

	public function indexAction()
	{
		print_r($this->db);

		$this->view->title = 'testtesttesttest';
		//echo 'mysql';die;
	}
}
