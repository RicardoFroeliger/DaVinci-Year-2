<?php

require_once('Pokemon.php');

// $gengar = new Pokemon(
//     'Gengar', 
//     new EnergyType('Ghost'),
//     10,
//     50,
//     [
//         new Attack('Shadow Claw', 100, new EnergyType('Ghost')),
//         new Attack('Self destruct', 150, new EnergyType('Normal'))
//     ],
//     new Weakness(new EnergyType('Fire'), 2),
//     new Resistance(new EnergyType('Water'), 10)
// );
// print_r('<h4>'.$pokemon.'</h4>');

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