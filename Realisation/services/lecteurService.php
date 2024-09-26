<?php
require_once '../dataAccess/lecteurDAO.php'   ;
class lecteurService{
    private $lecteurDAO ;
    public function __construct()
    {
        $this->lecteurDAO = new lecteurDAO();
    }


    public function getLecteurs(){
        return $this->lecteurDAO->getLecteurs();
    }

    public function addLecteur($lecteur){
        return $this->lecteurDAO->addLecteur($lecteur);
    }
    public function deleteLecteur($id){
        return $this->lecteurDAO->deleteLecteur($id);
    }
    public function updateLecteur($id ,$nouveauLecteur){
        return $this->lecteurDAO->updateLecteur($id, $nouveauLecteur);
    }

}