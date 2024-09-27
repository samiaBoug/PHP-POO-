<?php 
require_once '../dataAccess/empruntDAO.php';
class empruntService{
    private $DAO;
    public function __construct(){
        $this->DAO = new empruntDAO();
    }

    public function getEmprunts(){
       return $this->DAO->getEmprunts();
    }

    public function addEmprunt($emprunt){
        return $this->DAO->setEmprunt($emprunt);
    }

    public function deleteEmprunt($id){
        return $this->DAO->deleteEmprunt($id);
    }

    public function updateEmprunt($id , $nouveauemprunt){
        return $this->DAO->updateEmprunt($id , $nouveauemprunt);

    } 
}