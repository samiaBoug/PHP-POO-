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
                echo $this->couleur("36", "Id lecteur : ") . $emprunt->getId_lecteur() . "\n";
                echo $this->couleur("36", "Id livre : ") . $emprunt->getId_livre() . "\n";


            }
            echo "\n" . $this->couleur("33", "__________________________\n");
        }
    }

    public function ajouterEmprunt($dateDebut ,$dateReteurPrevu, $dateReteurReel, $id_lecteur, $id_livre ) {
        $empruntService = $this->empruntService;
        $nouvemprunt = new emprunt($dateDebut ,$dateReteurPrevu, $dateReteurReel, $id_lecteur, $id_livre );
        $empruntService->addEmprunt($nouvemprunt);
        echo $this->couleur("32", "emprunt ajouté avec succès : \n"); 
    }

    public function modifierEmprunt($id, $nouveauEmprunt) {
        $emprunts = $this->empruntService->getEmprunts();
        $empruntTrouve = false;
        foreach ($emprunts as $emprunt) {
            if ($emprunt->getId() === $id) {
                $this->empruntService->updateEmprunt($id, $nouveauEmprunt);
                $empruntTrouve = true;
                echo $this->couleur("32", "Le emprunt a été modifié avec succès.\n");
                break;
            }
        }
        if (!$empruntTrouve) {
            echo $this->couleur("31", "Le emprunt que vous cherchez est introuvable.\n"); // Rouge pour erreurs
        }
    }

    public function suprimerEmprunt($id) {
        $emprunts = $this->empruntService->getEmprunts();
        $empruntTrouve = false;
        foreach ($emprunts as $emprunt) {
            if ($emprunt->getId() === $id) {
                $this->empruntService->deleteEmprunt($id);
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
                $this->afficherEmprunts();
                break;
            case 2:
                $dateDebut = readline($this->couleur("36", "Entrez la date de début du emprunt : "));
                $dateReteurPrevu = readline($this->couleur("36", "Entrez la date de retour du emprunt : "));
                $dateReteurReel = readline($this->couleur("36", "Entrez la date de retour du emprunt :"));
                $id_lecteur = readline($this->couleur("36", "Entrez l'id de lecteur du emprunt :"));
                $id_livre = readline($this->couleur("36", "Entrez l'id de livre emprunt :"));

                $this->ajouterEmprunt($dateDebut ,$dateReteurPrevu, $dateReteurReel, $id_lecteur, $id_livre);
                break;
            case 3:
                $id =intval(readline($this->couleur("36", "Entrez l'id du emprunt que vous souhaitez supprimer : ")));
                $this->suprimeremprunt($id);
                break;
            case 4:
                $id = intval(readline($this->couleur("36", "Entrez l'Id de l'emprunt que vous souhaitez modifier : "))) ;
                $dateDebut = readline($this->couleur("36", "Entrez le nouveau date de debut du emprunt : "));
                $dateReteurPrevu = readline($this->couleur("36", "Entrez le nouveau date de retour prévu du emprunt : "));
                $dateReteurReel = readline($this->couleur("36", "Entrez la nouvelle date de retour réelle du emprunt : "));
                $id_lecteur = readline($this->couleur("36", "Entrez la nouvelle id de lecteur : "));
                $id_livre = readline($this->couleur("36", "Entrez la nouvelle id de livre  : "));


                $nouveauEmprunt = new emprunt($dateDebut ,$dateReteurPrevu, $dateReteurReel, $id_lecteur, $id_livre);
                $this->modifierEmprunt($id, $nouveauEmprunt);
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
