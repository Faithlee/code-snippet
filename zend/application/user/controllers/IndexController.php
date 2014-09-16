<?php

class User_IndexController extends Zend_Controller_Action {
	
	//默认初始的内容
	public function init() {
		/* Initialize action controller here */
		Zend_Loader::loadClass('Table');

		//$table = new Table();
		var_dump($table);
	}
	
	public function indexAction() {
		// action body
		echo '用户项目环境';
		$param = $this->getRequest();
		var_dump($param);
		//$table = new Table();
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

