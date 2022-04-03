<?php

require_once('./Classes/Pokemon.php');
require_once('./Classes/EnergyType.php');
require_once('./Classes/Attack.php');
require_once('./Classes/Weakness.php');
require_once('./Classes/Resistance.php');
require_once('./Classes/Pikachu.php');
require_once('./Classes/Charmeleon.php');



$pikachu = new Pikachu('Pika', 60, 
    new EnergyType('Lightning'),
    new Weakness(new EnergyType('Fire'), 1.5),
    new Resistance(new EnergyType('Fighting'), 20), 
    [
        new Attack('Electro Ball', 50, new EnergyType('Electric')),
        new Attack('Thunder Punch', 20, new EnergyType('Electric'))
    ]
);

$charmeleon = new Charmeleon('Flame boi', 60, 
    new EnergyType('Fire'),
    new Weakness(new EnergyType('Water'), 2),
    new Resistance(new EnergyType('Lightning'), 10),
    [
        new Attack('Headbutt', 10, new EnergyType('Normal')),
        new Attack('Ember', 30, new EnergyType('Fire'))
    ]
);



echo "<p>{$pikachu->getName()} has {$pikachu->getHealth()} health.</p>"; 
echo "<p>{$charmeleon->getName()} has {$charmeleon->getHealth()} health.</p>";



function fight($pokemon1, $pokemon2, $attackIndex) {
    $attack = $pokemon1->attack($pokemon2, $attackIndex);
    $population = $pokemon1->getPopulation();
    $populationHealth = $pokemon1->getPopulationhealth();
    
    echo "<br><p>{$pokemon1->getName()} attacks {$pokemon2->getName()} ".
        "with {$attack['name']} for {$attack['damage']} damage.<p>";
    
    echo "<p>{$pokemon2->getName()} has {$pokemon2->getHealth()} health.</p>"; 

    echo "<p>There are {$population} Pokémon left ". 
        "with an average of {$populationHealth} health</p>";
}



fight($pikachu, $charmeleon, 0);

fight($charmeleon, $pikachu, 1);