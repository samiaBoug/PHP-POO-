<?php 
require_once '../services/LivreService.php';
require_once '../services/auteurService.php';
require_once '../services/empruntService.php';
require_once '../entites/Livre.php';
require_once '../entites/emprunt.php';
require_once '../entites/auteur.php';


class presentationNav{
    private $livreService ;
    private $auteurService ;

    public function __construct() {
        $this->livreService = new LivreService();
        $this->auteurService = new AuteurService;
    }

    public function run(){
        $livres = $this->livreService->getDispoLivres();
        $auteurs = $this->auteurService->getAuteurs();

        foreach($livres as $livre){
            $auteurNom = "";
            $auteurPrenom = "";
            foreach($auteurs as $auteur){
                if($livre->getId_Auteur() === $auteur->getId()){
                    $auteurNom = $auteur->getNom();
                    $auteurPrenom = $auteur->getPrenom();
                 
                }
            }
            
            if($auteurNom && $auteurPrenom){
                echo '<div class="col-md-4 mb-4">'; // Ajout de la colonne Bootstrap
                echo ' <div class="card h-100">'; // Ajout d'une classe h-100 pour uniformiser la hauteur des cartes
                echo '  <div class="card-body">';
                echo '<h5 class="card-title">'."Titre : ".$livre->getTitre().'</h5>'." \n";
                echo '<h6 class="card-subtitle mb-2 text-muted">'."ISBN : ".$livre->getISBN().'</h6>'." \n";
                echo ' <p class="card-text">'."Date de publication : ".$livre->getDatePublication().'</p>'." \n";
                echo ' <p class="card-text">'."Auteur : ".$auteurNom ." ". $auteurPrenom.'</p>' ." \n";
                echo '<a href="#" class="btn btn-primary">Ajouter à la liste de souhaits</a>';
                echo "  </div>";
                echo " </div>";
                echo "</div>";
            }
        }
    }
}

// Instanciation de la classe avant le HTML
$presentationNav = new presentationNav();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livres Disponibles</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center">Bibliothèque Solicode</h1>
        <br>
        <h4>Livres disponibles :</h4>
        <div class="input-group mb-3 search-bar">
            <form action="">
            <div class="input-group my-3 w-100 mx-auto">
    <input type="text" class="form-control" placeholder="Rechercher un livre" style="width : 300px">
    <button class="btn btn-primary" type="button">Recherche</button>
</div>

     
            </form>
    </div>        <div class="row">
            <!-- Affichage des livres disponibles -->
            <?php $presentationNav->run(); ?>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
