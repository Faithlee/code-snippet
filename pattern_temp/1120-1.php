<?php 

//抽象工厂模式

//预约事宜
abstract ApptEncoder {
    abstract function encode();
}

class BloggsApptEncoder extends ApptEncoder {
    public function encode()
    {
        return "BloggsApptEncoder encode!\n";
    }
}

class MegaApptEncoder extends ApptEncoder {
    public function encode()
    {
        return "MegaApptEncoder data encode in MegaApptEncoder\n";
    }
}

//待办事宜抽象类
abstract class TtdEncoder {
    abstract function encoder(); 
}

class BloggsTtdEncoder extends TtdEncoder {
    public function encode()
    {
        return "TtdEncoder data encode!\n";
    }
}

class MegaTtdEncoder extends TtdEncoder {
    public function encode()
    {
        return "MegaTtdEncoder data encode in MegaTtdEncode way!\n";
    }
}

//联系事宜

abstract class ContactEncoder {
    abstract function encode();
}

BloggsContactEncoder extends ContactEncoder {
    public function encode()
    {
        return "BloggsContactEncoder data encode in BloggsCal way!\n";
    }
}

MegaContactEncoder extends ContactEncoder {
    public function encode()
    {
        return "MegaContact data encode in Mega way!\n";
    }
}


