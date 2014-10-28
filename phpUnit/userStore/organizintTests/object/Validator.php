<?php
/**
 * @FileName: Validator.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Mon 27 Oct 2014 10:35:51 PM CST
 */

//require_once 'UserStore.php';

class Validator {
	private $_store;

	public function __construct(UserStore $store)
	{
		$this->_store = $store;	
	}
	
	/**
	 * 验证用户
	 */
	public function validateUser($mail, $passwd)
	{
		#判断是否为对象
		if (!is_object($user = $this->_store->getUser($mail))) {
			return false;	
		}
		
		#获取密码比较
		if ($user->getPass() == $passwd) {
			return true;
		}

		$this->_store->notifyPasswordFailure($mail);
		
		return false;	
	}
}

