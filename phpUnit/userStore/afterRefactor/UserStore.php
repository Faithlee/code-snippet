<?php
/**
 * @FileName: UserStore.php
 * @Desc: 代码重构：将成员属性储存数组改为储存对象
 * @Author: lijiawei
 * @Mail: li.jiawei@leftbrain.com.cn
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
			$this->users[$mail]->failed(time());
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
