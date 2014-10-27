<?php
/**
 * @FileName: UserStore.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Mon 27 Oct 2014 10:07:47 PM CST
 */

class UserStore {
	private $users = array();

	public function addUser($name, $mail, $pass)
	{
		if (isset($this->users[$mail])) {
			throw new Exception("User $mail has exists!");
		}

		if (strlen($pass) < 5) {
			throw new Exception("passwod must has 5 or more letters");
		}

		$this->users[$mail] = array(
			'name' => $name,
			'pass' => $pass,
			'mail' => $mail,
		);

		return true;
	}

	/**
	 * 验证用户是
	 */
	public function notifyPasswordFailure($mail)
	{
		if (isset($this->users[$mail])) {
			$this->users[$mail]['failed'] = time();
		}
	}

	/**
	 * 获取用户
	 */
	public function getUser($mail) 
	{
		return $this->users[$mail];
	}
}
