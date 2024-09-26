<?php
require_once '../services/lecteurService.php';
require_once '../entites/lecteur.php';
require_once 'index.php';

class Presentationlecteur {
    private $lecteurService;
    
    public function __construct() {
        $this->lecteurService = new lecteurService;
    }

    // Codes de couleurs ANSI
    private function couleur($code, $message) {
        return "\033[" . $code . "m" . $message . "\033[0m";
        
    }

    public function afficherlecteurs() {
        $lecteurService = $this->lecteurService;
        $lecteurs = $lecteurService->getLecteurs();

        if (empty($lecteurs)) {
            echo $this->couleur("31", "Aucun lecteur disponible.\n"); 
        } else {
            echo $this->couleur("34", "=========================\n");
            echo $this->couleur("34", "Liste des lecteurs :\n");
            echo $this->couleur("34", "=========================\n");
            foreach ($lecteurs as $lecteur) {
                echo "\n" . $this->couleur("33", "__________________________\n");
                echo $this->couleur("36", "Nom : ") . $lecteur->getNom() . "\n";
                echo $this->couleur("36", "Prenom : ") . $lecteur->getPrenom() . "\n";
                echo $this->couleur("36", "Num de carte : ") . $lecteur->getNumCarte() . "\n";
                echo $this->couleur("36", "Adresse : ") . $lecteur->getAdresse() . "\n";
                echo $this->couleur("36", "Id : ") . $lecteur->getId() . "\n";

            }
            echo "\n" . $this->couleur("33", "__________________________\n");
        }
    }

    public function ajouterLecteur($nom , $prenom, $numCarte , $adresse) {
        $lecteurService = $this->lecteurService;
        $nouvlecteur = new lecteur($nom , $prenom, $numCarte , $adresse);
        $lecteurService->addLecteur($nouvlecteur);
        echo $this->couleur("32", "lecteur ajouté avec succès : Nom: $nom, Prenom: $prenom  :  \n"); 
    }

    public function modifierLecteur($id, $nouveaulecteur) {
        $lecteurs = $this->lecteurService->getLecteurs();
        $lecteurTrouve = false;
        foreach ($lecteurs as $lecteur) {
            if ($lecteur->getId() === $id) {
                $this->lecteurService->updateLecteur($id, $nouveaulecteur);
                $lecteurTrouve = true;
                echo $this->couleur("32", "Le lecteur a été modifié avec succès.\n");
                break;
            }
        }
        if (!$lecteurTrouve) {
            echo $this->couleur("31", "Le lecteur que vous cherchez est introuvable.\n"); 
        }
    }

    public function suprimerLecteur($id) {
        $lecteurs = $this->lecteurService->getLecteurs();
        $lecteurTrouve = false;
        foreach ($lecteurs as $lecteur) {
            if ($lecteur->getId() === $id) {
                $this->lecteurService->deleteLecteur($id);
                $lecteurTrouve = true;
                echo $this->couleur("32", "Le lecteur est supprimé avec succès!\n");
                break;
            }
        }
        if (!$lecteurTrouve) {
            echo $this->couleur("31", "Le lecteur que vous cherchez est introuvable.\n");
        }
    }

    public function run() {
        echo $this->couleur("34", "=========================\n");   
        echo "\nChoisissez une option :\n";
        echo $this->couleur("34", "=========================\n");
        echo $this->couleur("36", "1. Afficher les lecteurs\n");
        echo $this->couleur("36", "2. Ajouter un lecteur\n");
        echo $this->couleur("36", "3. Supprimer un lecteur\n");
        echo $this->couleur("36", "4. Modifier un lecteur\n");
        echo $this->couleur("36", "5. Retour \n");
        echo $this->couleur("36", "6. Quitter\n");
        echo $this->couleur("34", "=========================\n");

        $option = readline($this->couleur("36", "Entrez votre choix : "));

        switch ($option) {
            case 1:
                $this->afficherLecteurs();
                break;
            case 2:
                $nom = readline($this->couleur("36", "Entrez le nom du lecteur : "));
                $prenom = readline($this->couleur("36", "Entrez le prenom du lecteur : "));
                $numCarte = readline($this->couleur("36", "Entrez le numerau de carte du lecteur : "));
                $adresse = readline($this->couleur("36", "Entrez l'adresse  du lecteur : "));

                $this->ajouterLecteur($nom, $prenom , $numCarte, $adresse);
                break;
            case 3:
                $id =intval(readline($this->couleur("36", "Entrez l'id du lecteur que vous souhaitez supprimer : ")));
                $this->suprimerLecteur($id);
                break;
            case 4:
                $id = intval(readline($this->couleur("36", "Entrez l'Id de l'lecteur que vous souhaitez modifier : "))) ;
                $nouveauNom = readline($this->couleur("36", "Entrez le nom du lecteur : "));
                $nouveauPrenom = readline($this->couleur("36", "Entrez le prenom du lecteur : "));
                $numCarte = readline($this->couleur("36", "Entrez le numerau de carte du lecteur : "));
                $adresse = readline($this->couleur("36", "Entrez l'adresse  du lecteur : "));

                $nouveaulecteur = new lecteur($nouveauNom, $nouveauPrenom , $numCarte, $adresse);
                $this->modifierLecteur($id, $nouveaulecteur);
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
