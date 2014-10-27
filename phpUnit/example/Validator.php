<?php
/**
 * @FileName: Validator.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Mon 27 Oct 2014 10:35:51 PM CST
 */

require_once 'UserStore.php';

class Validator {
	private $_store;

	public function __construct(UserStore $store)
	{
		$this->_store = $store;	
	}

	public function validateUser($mail, $passwd)
	{
		if (!is_array($user = $this->_store->getUser($mail))) {
			return false;	
		}

		if ($user['pass'] == $passwd) {
			return true;
		}

		$this->_store->notifyPasswordFailure($mail);
		
		return false;	
	}
}

$store = new UserStore();
$store->addUser('admin', 'admin@sina.com', '123456');

$validator = new Validator($store);

if ($validator->validateUser('admin@sina.com', '123456')) {
	echo 'Pass, Welcome!';
} else {
	echo 'You are refused!';
}

