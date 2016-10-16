<?php 

class Location
{

    public $x = 0;
    public $y = 0;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function toString()
    {
        return "(" . round($this->x, 2) . ", " . round($this->y, 2) . ")";
    }

}

?>