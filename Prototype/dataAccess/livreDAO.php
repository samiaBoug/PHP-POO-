<?php
// pour faire les requetes afficher et ajouter 

require_once 'DB/dataBase.php';

class LivreDAO {

    public function getLivre() {
        $dataBase = new DataBase();
  
        return $dataBase->livres ;

    }

    public function addLivre($livre) {
      $dataBase = new dataBase();
      $dataBase->livres[] = $livre ;
      $dataBase->enregistrerData();

    }
}
?>
