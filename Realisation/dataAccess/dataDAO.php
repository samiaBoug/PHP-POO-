<?php 
require_once 'DB/dataBase.php';
class livreDAO{
    private $dataBase ;
    
    public function __construct()
    {
        $this->dataBase = new dataBase();
    }

    public function getLivre(){
       return $this->dataBase->livres ;
    }

    public function addLivre($livre){
        //puch array
        array_push($this->dataBase->livres , $livre);
        $this->dataBase->enregisterData();
    }
}