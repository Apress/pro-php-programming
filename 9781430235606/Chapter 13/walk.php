<?php

class Walk
{

    private $option_keys = array(
        'ownADog', 'tired', 'haveNotWalkedForDays', 'niceOutside', 'bored');
    private $options = array();

    public function __construct()
    {
        foreach ($this->option_keys as $key)
        {
            $this->options[$key] = true;
        }
    }

    public function move()
    {
        if ($this->shouldWalk())
        {
            $this->goForAWalk();
        }
    }

    public function shouldWalk()
    {
        return ($this->timeToWalkTheDog() || $this->feelLikeWalking());
    }

    public function timeToWalkTheDog()
    {
        return ($this->options['ownADog'] &&
        (!$this->options['tired'] || $this->options['haveNotWalkedForDays']));
    }

    public function feelLikeWalking()
    {
        return (($this->options['niceOutside'] && !$this->options['tired']) ||
        $this->options['bored']);
    }

    public function __set($name, $value)
    {
        if (in_array($name, $this->option_keys))
        {
            $this->options[$name] = $value;
        }
    }

    private function goForAWalk()
    {
        echo "Going for a walk";
    }
}

//$walk = new Walk();
//$walk->move();
?>