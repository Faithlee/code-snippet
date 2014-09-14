<?php
/**
 * @FileName: DispatchController.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sun 14 Sep 2014 11:53:48 PM CST
 */

class DispatchController extends Zend_Controller_Action {
	public function init() 
	{
	//	echo '前端控制器设置全局变量myGlobal:';
	//	$myGlobal = $this->_request->getParam('myGlobal');

	//	var_dump($myGlobal);
	}

	public function indexAction()
	{
		echo '派遣器测试：';
		
		//$this->_forward('index', 'index', 'product')		;

		$request = $this->getRequest();
		$request->setModuleName('product')
			->setControllerName('index')
			->setActionName('index')
			->setDispatched(false);

		die;
	}
}
