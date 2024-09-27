<?php
    require_once '../dataAccess/livreDAO.php';
    require_once '../dataAccess/empruntDAO.php';

    class livreService{
        private $DAO ;

        public function __construct()
        {
            $this->DAO = new livreDAO ;
        }

        public function getLivres(){
            return $this->DAO->getLivres();
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

        public function getDispoLivres(){
            $livres = $this->getLivres();
            $empruntDAO = new empruntDAO();
            $emprunts = $empruntDAO->getEmprunts();
            $livresDisponibles = [];
        foreach ($livres as $livre) {
            $estDisponible = true; 
            foreach ($emprunts as $emprunt) {
                if ($emprunt->getId_livre() == $livre->getId() ) {
                    if($emprunt->getDateReteurReel() === null || empty($emprunt->getDateReteurReel())){
                    $estDisponible = false; 
                    break; 
                    }
                }
            }
    
            if ($estDisponible) {
                $livresDisponibles[] = $livre;
            }
        }
        return $livresDisponibles;
        }
    }