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

	#派遣器测试1
	public function indexAction()
	{
		#'派遣器测试：';

		$request = $this->getRequest();

		#3.测试模块、动作控制器
		//$request->setModuleName('photo')

		#2.测试动作控制器 派遣到LogController::findAction()
		//$request->setControllerName('route')
		//	->setActionName('static')
		//	->setDispatched(false);
	
		//$this->_helper->actionStack($request);

		#1.测试action，派遣到当前action foo
		//$request->setActionName('foo')
		//		->setDispatched(false);

		#获取请求对象
		//$request = $this->getRequest(); print_r($request); die;
		
	}

	#派遣器测试2:
	public function test2Action()
	{
		//$this->_forward('index', 'index', 'product');
	}

	public function fooAction()
	{
		echo '派遣器测试1:index 派遣到我这了！';
		die;
	}
}
