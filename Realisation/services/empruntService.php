<?php 
require_once '../dataAccess/empruntDAO.php';
class empruntService{
    private $DAO;
    public function __construct(){
        $this->DAO = new empruntDAO();
    }

    public function getemprunts(){
       return $this->DAO->getemprunts();
    }

    public function setemprunt($emprunt){
        return $this->DAO->setemprunt($emprunt);
    }

    public function deleteemprunt($id){
        return $this->DAO->deleteemprunt($id);
    }

    public function updateemprunt($id , $nouveauemprunt){
        return $this->DAO->updateemprunt($id , $nouveauemprunt);

    } 
}