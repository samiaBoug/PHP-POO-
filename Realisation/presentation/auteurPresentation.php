<?php
require_once '../services/auteurService.php';
require_once '../entites/auteur.php';
require_once 'index.php';

class PresentationAuteur {
    private $auteurService;
    
    public function __construct() {
        $this->auteurService = new auteurService;
    }

    // Codes de couleurs ANSI
    private function couleur($code, $message) {
        return "\033[" . $code . "m" . $message . "\033[0m";
        
    }

    public function afficherAuteurs() {
        $auteurService = $this->auteurService;
        $auteurs = $auteurService->getAuteurs();

        if (empty($auteurs)) {
            echo $this->couleur("31", "Aucun auteur disponible.\n"); 
        } else {
            echo $this->couleur("34", "=========================\n");
            echo $this->couleur("34", "Liste des auteurs :\n");
            echo $this->couleur("34", "=========================\n");
            foreach ($auteurs as $auteur) {
                echo "\n" . $this->couleur("33", "__________________________\n");
                echo $this->couleur("36", "Nom : ") . $auteur->getNom() . "\n";
                echo $this->couleur("36", "Prenom : ") . $auteur->getPrenom() . "\n";
                echo $this->couleur("36", "Nationalité : ") . $auteur->getNationalite() . "\n";
                echo $this->couleur("36", "Id : ") . $auteur->getId() . "\n";

            }
            echo "\n" . $this->couleur("33", "__________________________\n");
        }
    }

    public function ajouterAuteur($nom, $prenom , $nationalite) {
        $auteurService = $this->auteurService;
        $nouvauteur = new auteur($nom, $prenom, $nationalite);
        $auteurService->setauteur($nouvauteur);
        echo $this->couleur("32", "auteur ajouté avec succès : Nom: $nom, Prenom: $prenom , nationalité : $nationalite \n"); // Vert pour succès
    }

    public function modifierAuteur($id, $nouveauAuteur) {
        $auteurs = $this->auteurService->getAuteurs();
        $auteurTrouve = false;
        foreach ($auteurs as $auteur) {
            if ($auteur->getId() === $id) {
                $this->auteurService->updateAuteur($id, $nouveauAuteur);
                $auteurTrouve = true;
                echo $this->couleur("32", "Le auteur a été modifié avec succès.\n");
                break;
            }
        }
        if (!$auteurTrouve) {
            echo $this->couleur("31", "Le auteur que vous cherchez est introuvable.\n"); // Rouge pour erreurs
        }
    }

    public function suprimerAuteur($id) {
        $auteurs = $this->auteurService->getAuteurs();
        $auteurTrouve = false;
        foreach ($auteurs as $auteur) {
            if ($auteur->getId() === $id) {
                $this->auteurService->deleteAuteur($id);
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
        echo $this->couleur("36", "5. Retour \n");
        echo $this->couleur("36", "6. Quitter\n");
        echo $this->couleur("34", "=========================\n");

        $option = readline($this->couleur("36", "Entrez votre choix : "));

        switch ($option) {
            case 1:
                $this->afficherAuteurs();
                break;
            case 2:
                $nom = readline($this->couleur("36", "Entrez le nom du auteur : "));
                $prenom = readline($this->couleur("36", "Entrez le prenom du auteur : "));
                $nationalite = readline($this->couleur("36", "Entrez la nationalité du auteur :"));
                $this->ajouterAuteur($nom, $prenom , $nationalite);
                break;
            case 3:
                $id =intval(readline($this->couleur("36", "Entrez l'id du auteur que vous souhaitez supprimer : ")));
                $this->suprimerAuteur($id);
                break;
            case 4:
                $id = intval(readline($this->couleur("36", "Entrez l'Id de l'auteur que vous souhaitez modifier : "))) ;
                $nouveauNom = readline($this->couleur("36", "Entrez le nouveau nom du auteur : "));
                $nouveauPrenom = readline($this->couleur("36", "Entrez le nouveau prenom du auteur : "));
                $nouveauNationalite = readline($this->couleur("36", "Entrez la nouvelle nationalité du auteur : "));

                $nouveauauteur = new auteur($nouveauNom, $nouveauPrenom , $nouveauNationalite);
                $this->modifierauteur($id, $nouveauauteur);
                break;
            case 5 :
                $menuPrincipal = new mainPresentation();
                $menuPrincipal->menuPrincipale();
            case 6:
                echo $this->couleur("32", "Au revoir!\n");
                exit;
            default:
                echo $this->couleur("31", "Choix invalide. Veuillez réessayer.\n");
        }
    }
}
?>
