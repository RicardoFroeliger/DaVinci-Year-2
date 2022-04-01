<?php

class Pikachu extends Pokemon {
    public $name;
    public $hitpoints;
    public $Attacks;

    public function __construct($name, $hitpoints, $Attacks) {
        $health = $hitpoints;
        $EnergyType = new EnergyType('Lightning');
        $Weakness = new Weakness('Fire', 1.5);
        $Resistance = new Resistance('Fighting', 20);
        parent::__construct($name, $EnergyType, $hitpoints, $health, $Attacks, $Weakness, $Resistance);
    }
}