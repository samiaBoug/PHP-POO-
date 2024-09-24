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
    }