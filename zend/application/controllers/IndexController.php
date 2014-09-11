<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
		//
		var_dump(__FILE__);
		//执行动作
		
    }

	public function addAction()
	{
		##视图组件Zend_View
		$view = new Zend_View();
		$view->setScriptPath(APPLICATION_PATH . '/views/scripts/index');
		echo $view->render('viewScript.php');
		
		//通过前端控制器可以设置视图渲染关闭;
		//$front->setParam('noViewRenderer')
	}


}

