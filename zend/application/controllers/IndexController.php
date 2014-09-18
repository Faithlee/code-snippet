<?php

class IndexController extends Zend_Controller_Action {
	
	//默认初始的内容
	public function init() {
		/* Initialize action controller here */
		//var_dump(__FILE__);
		
		//getBaseUrl()函数, 有助于设置JIC文件
		$baseUrl = $this->_request->getBaseUrl();
		var_dump($baseUrl);

		//入口设置noViewRender为true后，view对象为空，无法赋值；先注释
		//$this->view->baseUrl = $baseUrl;
	}
	
	public function indexAction() {
		// action body
		var_dump(__METHOD__);
	}

	public function demoAction()
	{
		#通过_getParam()接收参数
		$param = $this->_getParam('name');
		var_dump($param);

		#request接收参数
		$get = $this->_request->get('name');
		var_dump($get);

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

	
	//$_GET|$_POST都被禁用了
	public function testpostAction()
	{
		//输出表单	
		echo '<form method="post" action="">
				<input type="text" name="name">
				<input type="submit" name="btn">
			 </form>';

		//post接收数据
		$name = $this->_request->getPost('name');
		///$res = $this->getRequest();
		var_dump($name);
	}

	//$_GET|$_POST都被禁用了
	public function testgetAction()
	{
		//get接收参数(两种方法均有效)
		$id = $this->_request->id;
		$other = $this->_request->get('id');

		var_dump($id, $other);

		#getRequest即返回$this->_request属性
		#$request = $this->getRequest();
		#var_dump($request);
	}
}

