<?php

class User_InfoController extends Zend_Controller_Action {
	
	//默认初始的内容
	public function init() {
		/* Initialize action controller here */

	}
	
	public function indexAction() {
		// action body
		echo '用户信息!';
		$param = $this->getRequest();
		var_dump($param);

		die;
	}

	public function demoAction()
	{
		echo __FILE__, PHP_EOL;	

		echo __METHOD__;

	}

	public function frontAction()
	{
		echo '1111';
		
		die;
	}
}

