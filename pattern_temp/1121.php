<?php

//原型模式，基本抽象工厂模式，但是要灵活好用

class Sea {
    private $navigability = 0;

    public function __construct($navigability)
    {
        $this->navigability = $navigability;
    }
}

class MarsSea extends Sea {

}

class EarthSea extends Sea {

}

class Plains {

}

class MarsPlains extends Plains {

}

class EarthPlains extends Plains {

}

class Forests {

}

class MarsForests extends Forests {

}

class EarthForests extends Forests {

}

class TerrainFactory {
    private $sea;
    private $plain;
    private $forest;

    public function __construct(Sea $sea, Plains $plain, Forest $forest)
    {
        $this->sea = $sea;
        $this->plain = $plain;
        $this->forest = $forest;
    }

    public function getSea()
    {
        return clone $this->sea;
    }

    public function getPlains()
    {
        return clone $this->plain;
    }

    public function getForest()
    {
        return clone $this->forest;
    }
}

$factory = new TerrainFactory(new EarthSea(-1), new EarthPlains(), new EarthForest());

print_r($factory->getSea());


//特殊情况，浅复制与深复制
//如果任何对象的属性是对象时，那么clone时不会被复制属性为对象的；
//需要通过深复制 

class Contained {

}

class Container {
    public $contained;

    public funciton __construct()
    {
        $this->contained = new Contained();
    }

    public function __clone()
    {
        //深复制，将对象的属性是对象的也复制到contained中；
        $this->contained = clone $this->contained;
    }
}
?>
