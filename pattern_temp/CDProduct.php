<?php
class CDProduct
{
    protected $title;
    protected $price;
    protected $color;
                          
    function _construct($title, $price = 0, $color)
    {
        $this->title = $title;
        $this->price = $price;
        $this->color = $color;
                                                                          
        echo $title . $price . $color;
    }
                                                                                            
    function getTitle()
    {                                                                           
        echo $this->title;                                                                                                 }
}





?>
