<?php

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