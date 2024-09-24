<?php 
//livreService 
require_once 'dataAccess/livreDAO.php';

class livreService{
    private $livreDAO ;

    public function __construct()
    {
        $this->livreDAO = new livreDAO();
    }

    public function getLivres(){
        return $this->livreDAO->getLivre();
    }
    public function addLivre($livre){
       $this->livreDAO->addLivre($livre);
    }


}

