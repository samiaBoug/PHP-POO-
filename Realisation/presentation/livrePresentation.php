<?php
require_once 'services/LivreService.php';
require_once 'entites/Livre.php';


class PresentationLivre {
    

    public function afficherLivres() {
        echo "=========================\n";
        echo "Liste des livres :\n";
        echo "=========================\n";

        $livreService =new livreService();
        $livres = $livreService->getLivres();
        // var_dump($livres);

        // if (empty($livres)) {
        //     echo "Aucun livre disponible.\n";
        // } else {
            foreach ($livres as $livre) {
                echo "\n__________________________\n";
                echo "ISBN : " . $livre->getISBN() . "\n";
                echo "Titre : " . $livre->getTitre() . "\n";
              

            // }
        }
    }

    public function ajouterLivre($titre , $ISBN) {
        $livreService = new LivreService();
        $nouvLivre = new livre($titre , $ISBN);
        $livreService->setLivre($nouvLivre);
        echo "Livre ajouté avec succès : Titre: $titre, ISBN: $ISBN\n";
    }

    public function run() {
            echo "=========================\n";   
            echo "\nChoisissez une option :\n";
             echo "=========================\n";
            echo "1. Afficher les livres\n";
            echo "2. Ajouter un livre\n";
            echo "3. Quitter\n";
        echo "=========================\n";

            $option = readline("Entrez votre choix : ");

            switch ($option) {
                case 1:
                    $this->afficherLivres();
                    break;
                case 2:
                    
                    $titre = readline("Entrez le titre du livre : ");
                    $ISBN = readline("Entrez l'ISBN du livre : ");
                    $this->ajouterLivre($titre, $ISBN);
                    break;
                case 3:
                    echo "Au revoir!\n";
                    exit;
                default:
                    echo "Choix invalide. Veuillez réessayer.\n";
            
        }
    }
}

// Exemple d'utilisation
$presentation = new PresentationLivre();
$presentation->run();
?>
