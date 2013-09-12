<?php

//单例模式的实现

class Perference{
    private $props = array();
    
    private static $instance;
    
    //不允许外部实例化类，生成对象
    private function __construct()
    {
        
    }
    
    //
    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new Perference();
        }

        return self::$instance;
    }
    
    public function setProperty($key, $val)
    {
        $this->props[$key] = $val;
    }

    public function getProperty($key)
    {
        return $this->props[$key];
    }
}

$perfer = Perference::getInstance();

$perfer->setProperty('name', 'Mike');
echo $perfer->getProperty('name');

//将变量$perfer删除，再实例化一个新的对象，再去访问name时，值仍然为Mike,这就是全局变量
unset($perfer);

$perfer1 = Perference::getInstance();
echo $perfer1->getProperty('name');


