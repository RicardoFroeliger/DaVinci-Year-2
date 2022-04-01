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

class EnergyType {
    public function __construct($name) {
        $this->name = $name;
    }
}

class Attack {
    public function __construct($name, $damage) {
        $this->name = $name;
        $this->damage = $damage;
    }
}

class Weakness {
    public function __construct($EnergyType, $multiplier) {
        $this->EnergyType = $EnergyType;
        $this->multiplier = $multiplier;
    }
}

class Resistance {
    public function __construct($EnergyType, $resistance) {
        $this->EnergyType = $EnergyType;
        $this->resistance = $resistance;
    }
}

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

class Fight {
    public $pokemon1;
    public $pokemon2;

    public function __construct($pokemon1, $pokemon2) {
        $this->pokemon1 = $pokemon1;
        $this->pokemon2 = $pokemon2;
    }

    public function attack ($attackIndex) {
        $attack = $this->pokemon1->attack($attackIndex, $this->pokemon2);
        $this->pokemon2->health -= $attack['damage'];
        return $attack;
    }
}