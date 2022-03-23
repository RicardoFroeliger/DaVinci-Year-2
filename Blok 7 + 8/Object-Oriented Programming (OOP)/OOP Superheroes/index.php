<?php

require 'Superhero.php';

$spiderman =  new Superhero('Spider-Man', 'Male', 'Spiderfriends', 'With great power comes great responsibility!');
$spiderman->sayOneliner();

print_r('<pre>'. $spiderman . '</pre>');


$thor = new Avenger('Thor', 'Male', 'For Asgard!');
$thor->sayOneliner();

print_r('<pre>' . $thor . '</pre>');