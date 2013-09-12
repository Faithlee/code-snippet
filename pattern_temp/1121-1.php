<?php

//标准的单例模式

class Setting {
    static $COMMSTYPE = 'Mega';
}


class CommsManager {
    private static $instance;
    private $commsManager;
    
    private function __construct()
    {
        $this->init();
    }

    private function init()
    {
        switch (Setting::$COMMSTYPE) {
            case 'Mega':
                $this->commsManager = new MegaCommsManager();
                break;
            default:
                $this->commsManager = new BloggsCommsManager();

        }
    }

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getCommsManager()
    {
        return $this->commsManager;
    }
}
?>
