<?php
class Livre{
    private $titre ;
    private $isbn ;
    private $auteurs;

}

class Auteur{
    private $nom;
    private $prenom ;
public function __construct(){
    
}
}
$livre1 = new Livre();
$livre->titre = "le petit prince";
$livre->isnb = "9782266000016";
$livre->auteur = [
    new Auteur("Saint-Exupéry", "Antoine de") ;
]