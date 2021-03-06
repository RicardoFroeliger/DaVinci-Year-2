<?php

class Pokemon {
    protected $name;
    protected $EnergyType;
    protected $hitpoints;
    protected $health;
    protected $Attacks;
    protected $Weakness;
    protected $Resistance;
    static private $population;
    static private $populationHealth;

    protected function __construct($name, $EnergyType, $hitpoints, $health, $Attacks, $Weakness, $Resistance) {
        $this->name = $name;
        $this->EnergyType = $EnergyType;
        $this->hitpoints = $hitpoints;
        $this->health = $health;
        $this->Attacks = $Attacks;
        $this->Weakness = $Weakness;
        $this->Resistance = $Resistance;
        self::$population++;
        self::$populationHealth += $this->health;
    }

    public function getName() {
        return $this->name;
    }

    public function getHealth() {
        return $this->health;
    }

    public static function getPopulation() { 
        return self::$population;
    }

    public static function getPopulationHealth() {
        return self::$populationHealth / self::$population;
    ;}

    public function attack($enemy, $attackIndex) {
        $attack = $this->Attacks[$attackIndex];
        $damage = $enemy->calculateDamage($attack);
        $enemy->takeDamage($damage);

        return $attack;
    }

    public function calculateDamage($attack) {
        if($this->Weakness->EnergyType->name == $attack->EnergyType->name) { // $this->EnergyType->name
            $attack->damage *= $this->Weakness->multiplier;
        }

        if($this->Resistance->EnergyType->name == $attack->EnergyType->name) { // $this->EnergyType->name
            $attack->damage -= $this->Resistance->resistance;
        }

        return $attack->damage;
    }

    public function takeDamage($damage) {
        if(($this->health - $damage) < 1) {
            self::$populationHealth -= $this->health;
            $this->health = 0;
        } else {
            self::$populationHealth -= $damage;
            $this->health -= $damage;
        }
    
        if($this->health < 1) $this->pokemonDies();
    }

    public static function pokemonDies() {
        self::$population--;
        return self::$population;
    }
}