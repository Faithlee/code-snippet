<?php

abstract class AppEncoder{
    abstract function encode();
}

class BloggsApptEncode extends AppEncoder{
    public function encode()
    {
        return 'Appointment data was encoded in Bloggs format!' . "\n";
    }
}

class MegaApptEncode extends AppEncoder{
    public function encode()
    {
        return "Appointment data was encode in Mega format! \n";
    }
}

class CommsManager{
    const BLOGGS = 1;
    const MEGA = 2;  

    private $mode = 1;

    public function __construct($mode)
    {
        $this->mode = $mode;
    }

    public function getApptEncoder()
    {
        switch($this->mode) {
            case self::BLOGGS:
                $coder = new BloggsApptEncode();
                break;
            default:
                $coder = new MegaApptEncode();
        }

        return $coder;
    }
}

$manager = new CommsManager($mode = 1);
$apptEcoder = $manager->getApptEncoder();

echo $apptEcoder->encode();

$manager1 = new CommsManager($mode = 2);
$apptEncoder1 = $manager1->getApptEncoder();
echo $apptEncoder1->encode();


