<?php
require_once '../services/LivreService.php';
require_once '../services/empruntService.php';
require_once '../services/auteurService.php';
require_once '../entites/Livre.php';
require_once 'index.php';

class presentationLivreDispo{
    private $livresService;
    private $auteurService;
    public function __construct()
    {
        $this->livresService= new LivreService() ;
        $this->auteurService = new auteurService();
    }
  
    public function run(){
        $livresDisponibles = $this->livresService->getDispoLivres();
        $auteurs = $this->auteurService->getAuteurs();
        echo "Listes des livres disponible : \n";
        foreach($livresDisponibles as $livresDisponible){
            
            $auteurNom ="";
            $auteurPrenom = "";
            foreach($auteurs as $auteur){
                if($livresDisponible->getId_Auteur() === $auteur->getId()){
                    $auteurNom = $auteur->getNom();
                    $auteurPrenom = $auteur->getPrenom();
                }
            }
            if($auteurNom && $auteurPrenom){
            echo "";
            echo "Titre : ".$livresDisponible->getTitre()." \n";
            echo "ISBN : ".$livresDisponible->getISBN()." \n";
            echo "Date de publication : ".$livresDisponible->getDatePublication()." \n";
            echo "Auteur : ".$auteurNom ." ". $auteurPrenom ." \n";
            }
            echo "---------------------------------------------\n";
        }
    }
}