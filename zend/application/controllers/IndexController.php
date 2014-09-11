<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
		//getBaseUrl()函数, 有助于设置JIC文件
        $baseUrl = $this->_request->getBaseUrl();
        //var_dump($baseUrl);
        $this->view->baseUrl = $baseUrl;
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
	
	public function demoAction() 
    { 
        $this->view->title = '公用头、尾测试'; 
        $this->view->showTitle = '不使用Zend_Layout::startMvc()布局，使用zend_view::render()实现代码公用'; 
        $this->view->books = array( 
            array( 
                'author' => 'Hernando de Soto', 
                'title' => 'The Mystery of Capitalism' 
            ), 
            array( 
                'author' => 'Henry Hazlitt', 
                'title' => 'Economics in One Lesson' 
            ), 
            array( 
                'author' => 'Milton Friedman', 
                'title' => 'Free to Choose' 
            ) 
        ); 
         
    }

}

