<?php

require_once 'DB/dataBase.php';

class LivreDAO {

    public function getLivres() {
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
