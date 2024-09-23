<?php
// pour faire les requetes afficher et ajouter 

require_once 'DB/dataBase.php';
require_once 'entities/livre.php';

class LivreDAO {
    private $db;

    public function __construct() {
        $this->db = new DataBase();
    }

    public function getLivre() {
        $data = $this->db->getData() ;
        $livres = $data['livres'] ;

        foreach ($livres as $livre) {

            return new Livre($livre['id'], $livre['titre'], $livre['ISBN']);
        }
       
    }

    public function addLivre($livre) {
      //verifier si le livre n'existe pas 

        $livres[] = [
            'id' => $livre->getId(),
            'titre' => $livre->getTitre(),
            'ISBN' => $livre->getISBN()
        ];

        $this->db->setData($livres) ;
    }
}
?>
