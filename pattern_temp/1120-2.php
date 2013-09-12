<?php 

//抽象工厂模式之创建对象功能

//用于创建对象或类


abstract class CommsManager {
    const APPT = 1;
    const TTD = 2;
    const CONTACT = 3;
    abstract function getHeaderText();
//    abstract function getAttpEncoder();
//    abstract function getTtdEncoder();
//    abstract function getContactEncoder();

    abstract function make($flag);
    abstract function getFooterText();
}


class BloggsManager extends CommsManager {
    public function getHeaderText()
    {
         return "BloggsMaange data!\n";
    }

    public function make($flag)
    {   
        switch ($flag) {
            case self::APPT:
                return new BloggsApptEncoder();
                break;
            case self::TTD:
                return new BloggsTtdEncoder();
                break;
            case self::CONTACT:
                return new BloggsContactEncoder();
                break;
        }
    }

/*    public function getTtdEncoder()
    {
    
    }

    public function getContactEncoder()
    {

    }
*/
    public function getFooterText()
    {
        return "Bloggs Footer!\n";
    }
}


class MegaContactEncoder extends ContactEncoder {
    public function getHeaderText()
    {
        return "Mega Header!\n";
    }
    
    public function make($flag)
    {
        switch ($flag) {
            case self::APP:
                return new MegaApptEncoder();
                break;
            case self::TTD:
                return new MegaTtdEncoder();
                break;
            case self::CONTACT:
                return new MegaContactEncoder();
                break;
        }
    }
/*    public function getApptEncoder()
    {

    }

    public function getTtdEncoder()
    {

    }

    public function getContactEncoder()
    {

    }
*/

    public function getFooterText()
    {
        return "Mega Footer!\n";
    }
}

?>
