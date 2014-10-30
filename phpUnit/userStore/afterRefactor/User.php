<?php
/**
 * @FileName: User.php
 * @Desc: 
 * @Author: lijiawei 
 * @Mail: li.jiawei@leftbrain.com.cn
 * @CTime: Tue 28 Oct 2014 01:25:45 AM CST
 */

class User {
	private $name;

	private $mail;

	private $pass;

	private $failed;

	public function __construct($name, $mail, $passwd)
	{
		if (strlen($passwd) < 5) {
			throw new Exception("密码不能少于5位");
		}

		$this->name = $name;
		$this->mail = $mail;
		$this->pass = $passwd;
	}

	public function getMail()
	{
		return $this->mail;
	}
	
	public function getPass()
	{
		return $this->pass;
	}

	public function failed($time)
	{
		return $this->failed = $time;
	}
}
