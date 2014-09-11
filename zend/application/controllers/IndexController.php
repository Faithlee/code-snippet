<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

	//执行动作
    public function indexAction()
    {
        // action body
		//
		var_dump(__FILE__);

		$this->view->title = 'MY ALBUMS';
		
    }

	/**
	 * 测试Zend_Layout布局
	 */
	public function listAction()
	{
		$this->view->title = 'Album List';
		$this->view->showTitle = 'Zend_Layout Test';
		$this->view->albums = array(
			array('title' => 'Rockferry', 'artist' => 'Duffy'),
			array('title' => 'Keep It simple', 'artist' => 'Van Morrison'),
		);
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

