<?php

class Attack {
    public function __construct($name, $damage, $EnergyType) {
        $this->name = $name;
        $this->damage = $damage;
        $this->EnergyType = $EnergyType;
    }

    public function getName() {
        return $this->name;
    }

    public function getDamage() {
        return $this->damage;
    }
}