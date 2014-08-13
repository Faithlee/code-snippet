<?php
/**
 * @FileName: testInterface.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Wed 13 Aug 2014 10:47:29 PM CST
 */

interface testInterface {
	//声明一个方法，但不实现	
	public function getEvent($var);
}


class Demo implements testInterface {
	
	public function getEvent($var)
	{
		echo $var;	
	}
}

$demo = new Demo();

echo $demo->getEvent('InterFace Test');

//错误代码演示
class Fruit extends Demo {
	//普通类里不允许设置抽象方法
	public function setApple();
	
}


$fruit = new Fruit();
echo $fruit->setApple();
