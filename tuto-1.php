<?php
//creation de class voiture
class Voiture {
   public $couleur ;
   public $marque ;
   public $modele ;

   public function demarer(){
    echo "La voiture démarre." ;
   }


}

//creation d'un objet voiture 
$maVoiture = new Voiture ;
$maVoiture->couleur = "noir";
$maVoiture->marque = "Jeep";
$maVoiture->modele = "Avenger";

$maVoiture->demarer();
