<?php 
require_once '../dataAccess/auteurDAO.php';
class auteurService{
    private $DAO;
    public function __construct(){
        $this->DAO = new auteurDAO();
    }

    public function getAuteurs(){
       return $this->DAO->getAuteurs();
    }

    public function setAuteur($auteur){
        return $this->DAO->setAuteur($auteur);
    }

    public function deleteAuteur($id){
        return $this->DAO->deleteAuteur($id);
    }

    public function updateAuteur($id , $nouveauAuteur){
        return $this->DAO->updateAuteur($id , $nouveauAuteur);

    } 
}