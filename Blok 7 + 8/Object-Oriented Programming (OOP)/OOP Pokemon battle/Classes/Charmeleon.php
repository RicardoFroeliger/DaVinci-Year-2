<?php

class Charmeleon extends Pokemon {
    public function __construct($name, $hitpoints, $EnergyType, $Weakness, $Resistance, $Attacks) {
        $health = $hitpoints;
        parent::__construct($name, $EnergyType, $hitpoints, $health, $Attacks, $Weakness, $Resistance);
    }
}