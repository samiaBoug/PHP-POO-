<?php
require_once '../services/LivreService.php';
require_once '../entites/Livre.php';

class PresentationLivre {
    private $livreService;
    
    public function __construct() {
        $this->livreService = new livreService;
    }

    // Codes de couleurs ANSI
    private function couleur($code, $message) {
        return "\033[" . $code . "m" . $message . "\033[0m";
        
    }

    public function afficherLivres() {
        $livreService = $this->livreService;
        $livres = $livreService->getLivres();

        if (empty($livres)) {
            echo $this->couleur("31", "Aucun livre disponible.\n"); // Rouge pour les erreurs
        } else {
            echo $this->couleur("34", "=========================\n");
            echo $this->couleur("34", "Liste des livres :\n");
            echo $this->couleur("34", "=========================\n");
            foreach ($livres as $livre) {
                echo "\n" . $this->couleur("33", "__________________________\n"); // Jaune pour les séparateurs
                echo $this->couleur("36", "ISBN : ") . $livre->getISBN() . "\n";
                echo $this->couleur("36", "Titre : ") . $livre->getTitre() . "\n";
            }
            echo "\n" . $this->couleur("33", "__________________________\n");
        }
    }

    public function ajouterLivre($titre, $ISBN , $idAuteur) {
        $livreService = $this->livreService;
        $nouvLivre = new livre($titre, $ISBN , $idAuteur);
        $livreService->setLivre($nouvLivre);
        echo $this->couleur("32", "Livre ajouté avec succès : Titre: $titre, ISBN: $ISBN\n"); // Vert pour succès
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
            echo $this->couleur("31", "Le livre que vous cherchez est introuvable.\n"); // Rouge pour erreurs
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
        echo $this->couleur("36", "5. Quitter\n");
        echo $this->couleur("34", "=========================\n");

        $option = readline($this->couleur("36", "Entrez votre choix : "));

        switch ($option) {
            case 1:
                $this->afficherLivres();
                break;
            case 2:
                $titre = readline($this->couleur("36", "Entrez le titre du livre : "));
                $ISBN = readline($this->couleur("36", "Entrez l'ISBN du livre : "));
                $idAuteur = readline($this->couleur("36", "Entrez id du auteur :"));
                $this->ajouterLivre($titre, $ISBN , $idAuteur);
                break;
            case 3:
                $ISBN = readline($this->couleur("36", "Entrez l'ISBN du livre que vous souhaitez supprimer : "));
                $this->suprimerLivre($ISBN);
                break;
            case 4:
                $ISBN = readline($this->couleur("36", "Entrez l'ISBN du livre que vous souhaitez modifier : "));
                $nouveauISBN = readline($this->couleur("36", "Entrez le nouveau ISBN du livre : "));
                $nouveauTitre = readline($this->couleur("36", "Entrez le nouveau titre du livre : "));
                $nouveauLivre = new livre($nouveauTitre, $nouveauISBN);
                $this->modifierLivre($ISBN, $nouveauLivre);
                break;
            case 5:
                echo $this->couleur("32", "Au revoir!\n");
                exit;
            default:
                echo $this->couleur("31", "Choix invalide. Veuillez réessayer.\n");
        }
    }
}
?>
