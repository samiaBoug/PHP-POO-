<?php
require_once '../services/empruntService.php';
require_once '../entites/emprunt.php';
require_once 'index.php';

class Presentationemprunt {
    private $empruntService;
    
    public function __construct() {
        $this->empruntService = new empruntService;
    }

    // Codes de couleurs ANSI
    private function couleur($code, $message) {
        return "\033[" . $code . "m" . $message . "\033[0m";
        
    }

    public function afficheremprunts() {
        $empruntService = $this->empruntService;
        $emprunts = $empruntService->getemprunts();

        if (empty($emprunts)) {
            echo $this->couleur("31", "Aucun emprunt disponible.\n"); 
        } else {
            echo $this->couleur("34", "=========================\n");
            echo $this->couleur("34", "Liste des emprunts :\n");
            echo $this->couleur("34", "=========================\n");
            foreach ($emprunts as $emprunt) {
                echo "\n" . $this->couleur("33", "__________________________\n");
                echo $this->couleur("36", "Date de debut : ") . $emprunt->getDatDebut() . "\n";
                echo $this->couleur("36", "Date de retour prévu : ") . $emprunt->getDateReteurPrevu() . "\n";
                echo $this->couleur("36", "Date de retour reélle : ") . $emprunt->getDateReteurReel() . "\n";
                echo $this->couleur("36", "Id : ") . $emprunt->getId() . "\n";

            }
            echo "\n" . $this->couleur("33", "__________________________\n");
        }
    }

    public function ajouteremprunt($nom, $prenom , $nationalite) {
        $empruntService = $this->empruntService;
        $nouvemprunt = new emprunt($nom, $prenom, $nationalite);
        $empruntService->setemprunt($nouvemprunt);
        echo $this->couleur("32", "emprunt ajouté avec succès : Nom: $nom, Prenom: $prenom , nationalité : $nationalite \n"); // Vert pour succès
    }

    public function modifieremprunt($id, $nouveauemprunt) {
        $emprunts = $this->empruntService->getemprunts();
        $empruntTrouve = false;
        foreach ($emprunts as $emprunt) {
            if ($emprunt->getId() === $id) {
                $this->empruntService->updateemprunt($id, $nouveauemprunt);
                $empruntTrouve = true;
                echo $this->couleur("32", "Le emprunt a été modifié avec succès.\n");
                break;
            }
        }
        if (!$empruntTrouve) {
            echo $this->couleur("31", "Le emprunt que vous cherchez est introuvable.\n"); // Rouge pour erreurs
        }
    }

    public function suprimeremprunt($id) {
        $emprunts = $this->empruntService->getemprunts();
        $empruntTrouve = false;
        foreach ($emprunts as $emprunt) {
            if ($emprunt->getId() === $id) {
                $this->empruntService->deleteemprunt($id);
                $empruntTrouve = true;
                echo $this->couleur("32", "Le emprunt est supprimé avec succès!\n");
                break;
            }
        }
        if (!$empruntTrouve) {
            echo $this->couleur("31", "Le emprunt que vous cherchez est introuvable.\n");
        }
    }

    public function run() {
        echo $this->couleur("34", "=========================\n");   
        echo "\nChoisissez une option :\n";
        echo $this->couleur("34", "=========================\n");
        echo $this->couleur("36", "1. Afficher les emprunts\n");
        echo $this->couleur("36", "2. Ajouter un emprunt\n");
        echo $this->couleur("36", "3. Supprimer un emprunt\n");
        echo $this->couleur("36", "4. Modifier un emprunt\n");
        echo $this->couleur("36", "5. Retour \n");
        echo $this->couleur("36", "6. Quitter\n");
        echo $this->couleur("34", "=========================\n");

        $option = readline($this->couleur("36", "Entrez votre choix : "));

        switch ($option) {
            case 1:
                $this->afficheremprunts();
                break;
            case 2:
                $nom = readline($this->couleur("36", "Entrez le nom du emprunt : "));
                $prenom = readline($this->couleur("36", "Entrez le prenom du emprunt : "));
                $nationalite = readline($this->couleur("36", "Entrez la nationalité du emprunt :"));
                $this->ajouteremprunt($nom, $prenom , $nationalite);
                break;
            case 3:
                $id =intval(readline($this->couleur("36", "Entrez l'id du emprunt que vous souhaitez supprimer : ")));
                $this->suprimeremprunt($id);
                break;
            case 4:
                $id = intval(readline($this->couleur("36", "Entrez l'Id de l'emprunt que vous souhaitez modifier : "))) ;
                $nouveauNom = readline($this->couleur("36", "Entrez le nouveau nom du emprunt : "));
                $nouveauPrenom = readline($this->couleur("36", "Entrez le nouveau prenom du emprunt : "));
                $nouveauNationalite = readline($this->couleur("36", "Entrez la nouvelle nationalité du emprunt : "));

                $nouveauemprunt = new emprunt($nouveauNom, $nouveauPrenom , $nouveauNationalite);
                $this->modifieremprunt($id, $nouveauemprunt);
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
