<?php
/**
 * @FileName: Access.php
 * @Desc: 
 * @Author: Faithlee
 * @Mail: lijiabin098@126.com 
 * @CTime: Tue 23 Dec 2014 11:45:50 PM CST
 */

require_once APPLICATION_PATH . '/application/controllers/Adminbase.php';

class AdminController extends AdminbaseController {
	public function init()
	{
	
	}

	public function adminAction()
	{

		$this->getView()->display('Admin');
	}

	public function accessAction()
	{
	
		$this->getView()->display('Access');
	}

	public function listAction()
	{
		Yaf_Dispatcher::getInstance()->disableView();

		$arr = array(
			array('id' => 1, 'name' => 'hehe'),
			array('id' => 1, 'name' => 'hehe'),
			array('id' => 1, 'name' => 'hehe'),
			array('id' => 1, 'name' => 'hehe'),
			array('id' => 1, 'name' => 'hehe'),
		);
		$return = array(
			'draw' => 1,
			'recordsTotal' => count($arr),
			'recordsFiltered' => count($arr),
			'data' => $arr
		);
		echo json_encode($return);	
	}

	public function showAction()
	{
		Yaf_Dispatcher::getInstance()->disableView();
		$adminDb = Yaf_Registry::get('adminDb');
		
		$admin = new Zend_Db_Table(array('name' => 'administrator', 'primary' => 'id'));
		$sql = 'select id, admin_name as name, admin_email as email, position, admin_telphone as telphone from administrator';
		$row = $admin->getAdapter()->query($sql)->fetchAll();
		//print_r($row->toArray());

		$return = array(
			'draw' => 1,
			'recordsTotal' => count($row),
			'recordsFiltered' => count($row),
			'data' => $row
		);

		echo json_encode($return);
		die;
	}
}
