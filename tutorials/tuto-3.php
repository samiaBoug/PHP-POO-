<?php 
class Animal {
    public $nom ;
    public $age ;

    public function __construct($nom , $age)
    {
       $this->nom = $nom;
       $this->age = $age ; 
    }

    public function mange(){
        echo "je mange";
    }
}

class Chat extends Animal{
    public $race ;

    public function __construct($nom, $age, $race) {
        parent::__construct($nom, $age);
        $this->race = $race;
    }

    public function miauler(){
        echo "Miaou !";
    }
}

class Chien extends Animal{
    public function faitDuBruit(){
        echo "Ouaf !";
    }
}