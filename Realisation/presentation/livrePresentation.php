<?php
require_once '../services/livreService.php';
require_once '../services/auteurService.php';
require_once '../entites/livre.php';
require_once 'index.php';

class PresentationLivre {
    private $livreService;
    private $auteurService ;
    
    public function __construct() {
        $this->livreService = new livreService();
        $this->auteurService = new auteurService() ;
    }

    // Codes de couleurs ANSI
    private function couleur($code, $message) {
        return "\033[" . $code . "m" . $message . "\033[0m";
        
    }

    public function afficherLivres() {
        $livreService = $this->livreService; // Assuming livreService is already initialized
        $livres = $livreService->getLivres();
    
        // Check if the list of books is empty
        if (empty($livres)) {
            echo $this->couleur("31", "Aucun livre disponible.\n"); 
        } else {
            echo $this->couleur("34", "=========================\n");
            echo $this->couleur("34", "Liste des livres :\n");
            echo $this->couleur("34", "=========================\n");
    
            foreach ($livres as $livre) {
                // Fetching authors
                $auteurs = $this->auteurService->getAuteurs(); // Corrected from auteurServise to auteurService
                $nomAuteur = "";
                $prenomAuteur = "";
    
                // Find the author by ID
                foreach ($auteurs as $auteur) {
                    if ($auteur->getId() === $livre->getId_Auteur()) {
                        $nomAuteur = $auteur->getNom();
                        $prenomAuteur = $auteur->getPrenom();
                        break; // Exit loop once author is found
                    }
                }
    
                // Display book details
                echo "\n" . $this->couleur("33", "__________________________\n"); 
                echo $this->couleur("36", "ISBN : ") . $livre->getISBN() . "\n";
                echo $this->couleur("36", "Titre : ") . $livre->getTitre() . "\n";
                echo $this->couleur("36", "Auteur : ") . $nomAuteur . " " . $prenomAuteur . "\n";
                echo $this->couleur("36", "Id : ") . $livre->getId(). "\n";

                
            }
    
            echo "\n" . $this->couleur("33", "__________________________\n");
        }
    }
    

    public function ajouterLivre($titre, $ISBN , $idAuteur , $datePublication) {
        $livreService = $this->livreService;
        $nouvLivre = new livre($titre, $ISBN , $idAuteur, $datePublication);
        $livreService->setLivre($nouvLivre);
        echo $this->couleur("32", "Livre ajouté avec succès : Titre: $titre, ISBN: $ISBN\n"); 
    }

    public function modifierLivre($ISBN, $nouveauLivre) {
        $livres = $this->livreService->getLivres();
        $livreTrouve = false;
        foreach ($livres as $livre) {
            if ($livre->getISBN() === $ISBN) {
                $this->livreService->updateLivre($ISBN, $nouveauLivre);
                $livreTrouve = true;
                echo $this->couleur("32", "Le livre a été modifié avec succès.\n");
                break;
            }
        }
        if (!$livreTrouve) {
            echo $this->couleur("31", "Le livre que vous cherchez est introuvable.\n"); 
        }
    }

    public function suprimerLivre($ISBN) {
        $livres = $this->livreService->getLivres();
        $livreTrouve = false;
        foreach ($livres as $livre) {
            if ($livre->getISBN() === $ISBN) {
                $this->livreService->deleteLivre($ISBN);
                $livreTrouve = true;
                echo $this->couleur("32", "Le livre est supprimé avec succès!\n");
                break;
            }
        }
        if (!$livreTrouve) {
            echo $this->couleur("31", "Le livre que vous cherchez est introuvable.\n");
        }
    }

    public function run() {
        echo $this->couleur("34", "=========================\n");   
        echo "\nChoisissez une option :\n";
        echo $this->couleur("34", "=========================\n");
        echo $this->couleur("36", "1. Afficher les livres\n");
        echo $this->couleur("36", "2. Ajouter un livre\n");
        echo $this->couleur("36", "3. Supprimer un livre\n");
        echo $this->couleur("36", "4. Modifier un livre\n");
        echo $this->couleur("36", "5. Retour\n");
        echo $this->couleur("36", "6. Quitter\n");
        echo $this->couleur("34", "=========================\n");

        $option = readline($this->couleur("36", "Entrez votre choix : "));

        switch ($option) {
            case 1:
                $this->afficherLivres();
                break;
            case 2:
                $titre = readline($this->couleur("36", "Entrez le titre du livre : "));
                $ISBN = readline($this->couleur("36", "Entrez l'ISBN du livre : "));
                $idAuteur = intval(readline($this->couleur("36", "Entrez id du livre :")));
                $datePublication =readline($this->couleur("36", "Entrez date de publication de livre :"));
                $this->ajouterLivre($titre, $ISBN , $idAuteur, $datePublication);
                break;
            case 3:
                $ISBN = readline($this->couleur("36", "Entrez l'ISBN du livre que vous souhaitez supprimer : "));
                $this->suprimerLivre($ISBN);
                break;
            case 4:
                $ISBN = readline($this->couleur("36", "Entrez l'ISBN du livre que vous souhaitez modifier : "));
                $nouveauISBN = readline($this->couleur("36", "Entrez le nouveau ISBN du livre : "));
                $nouveauTitre = readline($this->couleur("36", "Entrez le nouveau titre du livre : "));
                $nouveauAuteur_id ="" ;
                $nouveauDatePub ="" ;
                $nouveauLivre = new livre($nouveauTitre, $nouveauISBN , $nouveauDatePub, $nouveauAuteur_id);
                $this->modifierLivre($ISBN, $nouveauLivre);
                break;
            case 5 :
                $menuPrincipale = new mainPresentation();
                $menuPrincipale->menuPrincipale();
            case 6:
                echo $this->couleur("32", "Au revoir!\n");
                exit;
            default:
                echo $this->couleur("31", "Choix invalide. Veuillez réessayer.\n");
        }
    }
}
?>
