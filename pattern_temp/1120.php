<?php

//工厂模式

abstract class ApptEncoder{
    abstract function encoder()
    {

    }
}

class BloggsApptEncoder extends ApptEncoder{
    public function encoder()
    {
        return "Appointment data encode in Blogglscal format!\n";
    }
}


class MegaApptEncoder extends ApptEncoder{
    public function encoder()
    {
        return "Appointment data encode in Megacal format!\n";
    }
}

abstract class CommsManager{
    abstract function getHeader();

    abstract function getApptEncoder();

    abstract function getFooter();
}

class BloggsManager extends CommsManager{
    public function getHeader()
    {
        return "BloggsCal Header!\n";
    }

    public function getApptEncoder()
    {
        return new BloggsApptEncoder();
    }

    public function getFooter()
    {
        return "BloggsCal footer\n";
    }
}

class MegaManager exntends CommsManager{
    public function getHeader()
    {
        return "MegaManager headers!\n";
    }

    public function getApptEncoder()
    {
        return new MegaApptEncoder();
    }

    public function getFooter()
    {
        return "MegaManager Footer!\n";
    }
}




