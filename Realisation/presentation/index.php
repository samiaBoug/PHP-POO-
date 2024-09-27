<?php 
require_once 'livrePresentation.php';
require_once 'auteurPresentation.php';
require_once 'lecteurPresentation.php';
require_once 'empruntPresentation.php';
require_once 'livresDisponible.php';

class mainPresentation {

    function couleur($couleur, $message){
        return "\033[" . $couleur . "m" . $message . "\033[0m";
   }

    public function menuPrincipale(){
    echo $this->couleur("36", "====================================\n");
    echo "Choisissez une option : \n";
    echo $this->couleur("35", "====================================\n");
    echo "1. Manager livres \n";
    echo "2. Manager auteurs \n";
    echo "3. Manager lecteurs \n";
    echo "4. Manager emprunts \n";
    echo "5. Recherche \n";
    echo "6. Voir les livres disponible \n";
    echo "7. Quitter \n";
    echo $this->couleur("35", "====================================\n");
    echo $this->couleur("36", "====================================\n");


    $option = readline("Entrer votre choix :  ");
    switch($option){
    case 1 :
        $presentation = new PresentationLivre();
        $presentation->run();   
        exit; 
    case 2 :
        $presentation = new PresentationAuteur();
        $presentation->run();
        exit; 

    case 3 :
        $presentation = new PresentationLecteur();
        $presentation->run();    
        exit; 

    case 4 :
        $presentation = new PresentationEmprunt();
        $presentation->run(); 
        exit; 

    case 6 : 
        $presentationLivreDispo= new presentationLivreDispo();
        $presentationLivreDispo->run();
        exit; 

    case 7 :
        echo $this->couleur("32", "Au revoir!\n");
        exit; 
    default:
    echo $this->couleur("31", "Choix invalide. Veuillez réessayer.\n");

    }
    }
}
$mainPresentation = new mainPresentation();
$mainPresentation->menuPrincipale();



