<?php

class Superhero {
    public function __construct($name, $gender, $team, $oneliner) {
        $this->name = $name;
        $this->gender = $gender;
        $this->team = $team;
        $this->oneliner = $oneliner;
    }

    public function __toString() {
        return json_encode($this);
    }

    public function sayOneliner() {
        echo '<h2>' . $this->oneliner . '</h2>';
    }
}

class Avenger extends Superhero {
    public function __construct($name, $gender, $oneliner) {
        $team = 'Avengers';
        parent::__construct($name, $gender, $team, $oneliner);
    }
}