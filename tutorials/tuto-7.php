<?php
class Livre {
    public $titre;
    public $isbn;
    public $auteurs; // Un tableau d'objets Auteur
}

class Auteur {
    public $nom;
    public $prenom;

    public function __construct($nom , $prenom){
        $this->nom = $nom;
        $this->prenom = $prenom;
    }
}

$livre1 = new Livre();
$livre1->titre = "Le Petit Prince";
$livre1->isbn = "9782266000016";
$livre1->auteurs = [
    new Auteur("Saint-Exupéry", "Antoine de")
];

$json = json_encode($livre1, JSON_PRETTY_PRINT);
echo $json;

file_put_contents('ma_bibliotheque.json', $json);

//  Lecture du Fichier et Désérialisation
$json = file_get_contents('ma_bibliotheque.json');
$livreLu = json_decode($json);
echo $livreLu->titre;