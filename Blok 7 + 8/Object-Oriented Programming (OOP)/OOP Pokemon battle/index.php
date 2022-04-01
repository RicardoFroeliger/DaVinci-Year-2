<?php

require_once('./Classes/Pokemon.php');
require_once('./Classes/EnergyType.php');
require_once('./Classes/Attack.php');
require_once('./Classes/Weakness.php');
require_once('./Classes/Resistance.php');
require_once('./Classes/Pikachu.php');
require_once('./Classes/Charmeleon.php');
require_once('./Classes/Fight.php');

$pikachu = new Pikachu('Pika', 60, [
    ['name' => 'Electro Ball', 'damage' => 50, 'EnergyType' => new EnergyType('Electric')],
    ['name' => 'Thunder Punch', 'damage' => 20, 'EnergyType' => new EnergyType('Electric')]
]);

$charmeleon = new Charmeleon('Flame boi', 60, [
    ['name' => 'Headbutt', 'damage' => 10, 'EnergyType' => new EnergyType('Normal')],
    ['name' => 'Ember', 'damage' => 30, 'EnergyType' => new EnergyType('Fire')]
]);

echo "<p>{$pikachu->name} has {$pikachu->health} health.</p>"; 
echo "<p>{$charmeleon->name} has {$charmeleon->health} health.</p>";


function fight ($fight, $attackIndex) {
    $attack = $fight->attack($attackIndex);
    
    echo "<p>{$fight->pokemon1->name} attacks {$fight->pokemon2->name} ".
        "with {$attack['name']} for {$attack['damage']} damage.<p>";
    
    echo "<p>{$fight->pokemon2->name} has {$fight->pokemon2->health} health.</p>"; 
}

fight(new Fight($pikachu, $charmeleon), 0);

fight(new Fight($charmeleon, $pikachu), 1); 