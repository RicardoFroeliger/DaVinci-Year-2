<?php

class Charmeleon extends Pokemon {
    public $name;
    public $hitpoints;
    public $Attacks;
    
    public function __construct($name, $hitpoints, $Attacks) {
        $health = $hitpoints;
        $EnergyType = new EnergyType('Fire');
        $Weakness = new Weakness('Water', 2);
        $Resistance = new Resistance('Lightning', 10);
        parent::__construct($name, $EnergyType, $hitpoints, $health, $Attacks, $Weakness, $Resistance);
    }
}