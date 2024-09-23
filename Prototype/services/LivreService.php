<?php
// service/livreService.php
require_once 'dataAccess/livreDAO.php';
require_once 'entities/livre.php';

class LivreService {
    private $livreDAO;

    public function __construct() {
        $this->livreDAO = new LivreDAO();
    }

    public function afficherLivres() {
        $livres = $this->livreDAO->db->getData(); // Récupère les données du DAO
        if (empty($livres)) {
            echo "Aucun livre disponible.\n";
            return;
        }

        foreach ($livres as $livre) {
            echo "ID: " . $livre['id'] . " - Titre: " . $livre['titre'] . " - ISBN: " . $livre['ISBN'] . "\n";
        }
    }

    public function ajouterLivre($id, $titre, $ISBN) {
        $livre = new Livre($id, $titre, $ISBN);
        try {
            $this->livreDAO->addLivre($livre);
            echo "Livre ajouté avec succès.\n";
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage() . "\n";
        }
    }
}
?>
