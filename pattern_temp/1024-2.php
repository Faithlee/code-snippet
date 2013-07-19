<?php

//面向对象与面向过程的区别：职责分配不同，过程化忙于处理细节问题
//如果多种文件格式，则需要处理多次

abstract class ParamHandler {
    protected $source;
    protected $params = array();

    function __construct($source)
    {
        $this->source = $source;
    }

    function addParam($key, $val)
    {
        $this->param[$key] = $val;
    }

    function getAllParams()
    {
        return $this->params;
    }

    public static function getInstance($fileName)
    {
        if (preg_match('/\.xml$/i', $fileName)) {
            return new XmlParamHandle($fileName);
        }

        return new TextParamHandle($fileName);
    }

    abstract function write();

    abstract function read();
}

//处理XML文件格式
class XmlParamHandle extends ParamHandler{
    
    public function write()
    {
        //xml写入格式
    }

    public function read()
    {   
        //xml读取格式
    }
}

//处理Text文件格式：
class TextParamHandle extends ParamHandler {
    public function write()
    {
        //text写入格式
    }

    public function read()
    {
        //text读取格式
    }
}




?>
