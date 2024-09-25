<?php
    require_once '../dataAccess/livreDAO.php';

    class livreService{
        private $DAO ;

        public function __construct()
        {
            $this->DAO = new livreDAO ;
        }

        public function getLivres(){
            return $this->DAO->getLivre();
        }

        public function setLivre($livre){
            return $this->DAO->addLivre($livre);
        }

        public function deleteLivre($ISBN){
            return $this->DAO->deleteLivre($ISBN);
        }

        public function updateLivre($ISBN, $nouveauLivre){
            return $this->DAO->updateLivre($ISBN ,$nouveauLivre);
        }
    }