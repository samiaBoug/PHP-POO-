<?php
    require_once 'dataAccess/dataDAO.php';

    class livreService{
        private $DAO ;

        public function __construct()
        {
            $this->DAO = new livreDAO ;
        }

        public function getLivre(){
            return $this->DAO->getLivre();
        }

        public function setLivre($livre){
            return $this->DAO->addLivre($livre);
        }
    }