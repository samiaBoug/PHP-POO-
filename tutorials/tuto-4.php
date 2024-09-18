<?php 

class Animal {
    public function faireDuBruit() {
        echo "L'animal fait du bruit.";
    }
}

class Chien extends Animal {
    public function faireDuBruit() {
        echo "Ouaf !";
    }
}

class Chat extends Animal {
    public function faireDuBruit() {
        echo "Miaou !";
    }
}

// Utilisation :
$animaux = [new Chien(), new Chat(), new Animal()];

foreach ($animaux as $animal) {
    $animal->faireDuBruit();
}

