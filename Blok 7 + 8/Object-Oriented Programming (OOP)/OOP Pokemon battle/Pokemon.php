<?php

class Pokemon {
    public function __construct($name, $EnergyType, $hitpoints, $health, $Attacks, $Weakness, $Resistance) {
        $this->name = $name;
        $this->EnergyType = $EnergyType;
        $this->hitpoints = $hitpoints;
        $this->health = $health;
        $this->Attacks = $Attacks;
        $this->Weakness = $Weakness;
        $this->Resistance = $Resistance;
    }

    public function __toString() {
        return json_encode($this);
    }

    public function attack() {

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
    public function __construct($name) {
        $EnergyType = new EnergyType('Lightning');
        $hitpoints = 60;
        $Weakness = new Weakness('Fire', 1.5);
        $Resistance = new Resistance('Fighting', 20);
        parent::__construct($name, $EnergyType, $hitpoints, $health, $Attacks, $Weakness, $Resistance);
    }
}

class Charmeleon extends Pokemon {
    public function __construct($name) {
        $EnergyType = new EnergyType('Fire');
        $hitpoints = 60;
        $Weakness = new Weakness('Fire', 1.5);
        $Resistance = new Resistance('Fighting', 20);
        parent::__construct($name, $EnergyType, $hitpoints, $health, $Attacks, $Weakness, $Resistance);
    }
}