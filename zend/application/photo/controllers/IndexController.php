<?php

class Photo_IndexController extends Zend_Controller_Action {
	
	//默认初始的内容
	public function init() {
		/* Initialize action controller here */

	}
	
	public function indexAction() {
		// action body
		echo '引申目录结构';

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

		$front = Zend_Controller_Front::getInstance();
		var_dump($front);

		die;
	}
}

