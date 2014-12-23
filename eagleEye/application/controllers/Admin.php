<?php
/**
 * @FileName: Access.php
 * @Desc: 
 * @Author: Faithlee
 * @Mail: lijiabin098@126.com 
 * @CTime: Tue 23 Dec 2014 11:45:50 PM CST
 */

class AdminController extends Yaf_Controller_Abstract {
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
}
