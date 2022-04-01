<?php

class Pokemon {
    public $name;
    protected $EnergyType;
    protected $hitpoints;
    public $health;
    protected $Attacks;
    protected $Weakness;
    protected $Resistance;


    protected function __construct($name, $EnergyType, $hitpoints, $health, $Attacks, $Weakness, $Resistance) {
        $this->name = $name;
        $this->EnergyType = $EnergyType;
        $this->hitpoints = $hitpoints;
        $this->health = $health;
        $this->Attacks = $Attacks;
        $this->Weakness = $Weakness;
        $this->Resistance = $Resistance;
    }

    public function attack($attackIndex, $enemy) {
        $attack = $this->Attacks[$attackIndex];

        if($enemy->Weakness->EnergyType == $attack['EnergyType']->name) { // $this->EnergyType->name 
            $attack['damage'] *= $enemy->Weakness->multiplier;
        }

        if($enemy->Resistance->EnergyType == $attack['EnergyType']->name) { // $this->EnergyType->name
            $attack['damage'] -= $enemy->Resistance->resistance;
        }

        return $attack;
    }
}