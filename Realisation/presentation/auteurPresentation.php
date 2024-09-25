<?php
require_once '../services/auteurService.php';
require_once '../entites/auteur.php';

class PresentationAuteur {
    private $auteurService;
    
    public function __construct() {
        $this->auteurService = new auteurService;
    }

    // Codes de couleurs ANSI
    private function couleur($code, $message) {
        return "\033[" . $code . "m" . $message . "\033[0m";
        
    }

    public function afficherauteurs() {
        $auteurService = $this->auteurService;
        $auteurs = $auteurService->getauteurs();

        if (empty($auteurs)) {
            echo $this->couleur("31", "Aucun auteur disponible.\n"); // Rouge pour les erreurs
        } else {
            echo $this->couleur("34", "=========================\n");
            echo $this->couleur("34", "Liste des auteurs :\n");
            echo $this->couleur("34", "=========================\n");
            foreach ($auteurs as $auteur) {
                echo "\n" . $this->couleur("33", "__________________________\n"); // Jaune pour les séparateurs
                echo $this->couleur("36", "ISBN : ") . $auteur->getISBN() . "\n";
                echo $this->couleur("36", "Titre : ") . $auteur->getTitre() . "\n";
            }
            echo "\n" . $this->couleur("33", "__________________________\n");
        }
    }

    public function ajouterauteur($titre, $ISBN , $idAuteur) {
        $auteurService = $this->auteurService;
        $nouvauteur = new auteur($titre, $ISBN , $idAuteur);
        $auteurService->setauteur($nouvauteur);
        echo $this->couleur("32", "auteur ajouté avec succès : Titre: $titre, ISBN: $ISBN\n"); // Vert pour succès
    }

    public function modifierauteur($ISBN, $nouveauauteur) {
        $auteurs = $this->auteurService->getauteurs();
        $auteurTrouve = false;
        foreach ($auteurs as $auteur) {
            if ($auteur->getISBN() === $ISBN) {
                $this->auteurService->updateauteur($ISBN, $nouveauauteur);
                $auteurTrouve = true;
                echo $this->couleur("32", "Le auteur a été modifié avec succès.\n");
                break;
            }
        }
        if (!$auteurTrouve) {
            echo $this->couleur("31", "Le auteur que vous cherchez est introuvable.\n"); // Rouge pour erreurs
        }
    }

    public function suprimerauteur($ISBN) {
        $auteurs = $this->auteurService->getauteurs();
        $auteurTrouve = false;
        foreach ($auteurs as $auteur) {
            if ($auteur->getISBN() === $ISBN) {
                $this->auteurService->deleteauteur($ISBN);
                $auteurTrouve = true;
                echo $this->couleur("32", "Le auteur est supprimé avec succès!\n");
                break;
            }
        }
        if (!$auteurTrouve) {
            echo $this->couleur("31", "Le auteur que vous cherchez est introuvable.\n");
        }
    }

    public function run() {
        echo $this->couleur("34", "=========================\n");   
        echo "\nChoisissez une option :\n";
        echo $this->couleur("34", "=========================\n");
        echo $this->couleur("36", "1. Afficher les auteurs\n");
        echo $this->couleur("36", "2. Ajouter un auteur\n");
        echo $this->couleur("36", "3. Supprimer un auteur\n");
        echo $this->couleur("36", "4. Modifier un auteur\n");
        echo $this->couleur("36", "5. Quitter\n");
        echo $this->couleur("34", "=========================\n");

        $option = readline($this->couleur("36", "Entrez votre choix : "));

        switch ($option) {
            case 1:
                $this->afficherauteurs();
                break;
            case 2:
                $titre = readline($this->couleur("36", "Entrez le titre du auteur : "));
                $ISBN = readline($this->couleur("36", "Entrez l'ISBN du auteur : "));
                $idAuteur = readline($this->couleur("36", "Entrez id du auteur :"));
                $this->ajouterauteur($titre, $ISBN , $idAuteur);
                break;
            case 3:
                $ISBN = readline($this->couleur("36", "Entrez l'ISBN du auteur que vous souhaitez supprimer : "));
                $this->suprimerauteur($ISBN);
                break;
            case 4:
                $ISBN = readline($this->couleur("36", "Entrez l'ISBN du auteur que vous souhaitez modifier : "));
                $nouveauISBN = readline($this->couleur("36", "Entrez le nouveau ISBN du auteur : "));
                $nouveauTitre = readline($this->couleur("36", "Entrez le nouveau titre du auteur : "));
                $nouveauauteur = new auteur($nouveauTitre, $nouveauISBN);
                $this->modifierauteur($ISBN, $nouveauauteur);
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
