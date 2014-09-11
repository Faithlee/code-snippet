<?php

class Product_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
		echo __LINE__;
    }

	public function addAction()
	{
		##视图组件Zend_View
		$view = new Zend_View();
		$view->setScriptPath(APPLICATION_PATH . '/modules/product/views/scripts/index');
		$view->assign('title', 'Hello, World');
		echo $view->render('viewScript.php');
		//die;
	}


}

