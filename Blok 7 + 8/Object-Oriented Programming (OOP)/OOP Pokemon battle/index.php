<?php

require_once('Pokemon.php');

$gengar = new Pokemon(
    'Gengar', 
    new EnergyType('Ghost'),
    10,
    50,
    [
        new Attack('Shadow Claw', 100, new EnergyType('Ghost')),
        new Attack('Self destruct', 150, new EnergyType('Normal'))
    ],
    new Weakness(new EnergyType('Fire'), 2),
    new Resistance(new EnergyType('Water'), 10)
);

$pikachu = new Pikachu('Pika');

$charmeleon = new Charmeleon('Flame boi');



print_r('<h4>'.$pokemon.'</h4>');

print_r('<h4>'.$pikachu.'</h4>');

print_r('<h4>'.$charmeleon.'</h4>');