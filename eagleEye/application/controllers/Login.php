<?php
/**
 * @FileName: Login.php
 * @Desc: 
 * @Author: Faithlee
 * @Mail: li.jiawei@leftbrain.com.cn
 * @CTime: Tue 23 Dec 2014 03:35:52 PM CST
 */

class LoginController extends Yaf_Controller_Abstract {
	public function init()
	{
		
	}

	public function loginAction()
	{
		$this->getView()->assign('baseUri', $this->_request->getBaseUri());
		$this->getView()->display('Login');
	}
}
