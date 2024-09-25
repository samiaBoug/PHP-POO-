<?php 
require_once '../DB/dataBase.php';
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

        array_push($this->dataBase->livres , $livre);
        $this->dataBase->enregisterData();
    }

    public function deleteLivre($ISBN) {
        $livres = $this->dataBase->livres;
        foreach ($livres as $index => $livre) {
            if ($livre->getISBN() === $ISBN) {
                unset($livres[$index]);
                break; 
            }
        }
        $this->dataBase->livres = array_values($livres);
        $this->dataBase->enregisterData();
    }

    public function updateLivre($ISBN, $nouveauLivre) {
        $livres = $this->dataBase->livres;   
        foreach ($livres as $index => $livre) {
            if ($livre->getISBN() === $ISBN) {
                $livres[$index] = $nouveauLivre;
                break; 
            }
        }   
        $this->dataBase->livres = $livres;
        $this->dataBase->enregisterData();
    }
    
    
}