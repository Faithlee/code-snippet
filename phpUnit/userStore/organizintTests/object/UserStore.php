<?php
/**
 * @FileName: UserStore.php
 * @Desc: 代码重构：将成员属性储存数组改为储存对象
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Tue 28 Oct 2014 01:17:56 AM CST
 */

require_once 'User.php';

class UserStore {
	private $users;

	public function addUser($name, $mail, $passwd)
	{
		if (isset($this->users[$name]))	{
			throw new Exception("User {$mail} already exists!");
		}

		$this->users[$mail] = new User($name, $mail, $passwd);

		return true;
	}

	public function notifyPasswordFailure($mail, $passwd)
	{
		if (isset($this->users[$mail])) {
			$date = date('Y-m-d');
			$this->users[$mail]->failed($date);
		}
	}


	public function getUser($mail)
	{
		if (isset($this->users[$mail])) {
			return $this->users[$mail];
		}

		return null;
	}
}
