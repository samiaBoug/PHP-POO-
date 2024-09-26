<?php
require_once '../DB/dataBase.php';
class lecteurDAO{
    private $dataBase ;

    public function __construct()
    {
        $this->dataBase = new dataBase();
    }

    public function getLecteurs(){
        return $this->dataBase->lecteurs;

    }
    public function addLecteur($lecteur){
        array_push($this->dataBase->lecteurs , $lecteur);
        $this->dataBase->enregisterData();
    }
    public function deleteLecteur ($id){
        $lecteurs = $this->dataBase->lecteurs ;
        foreach($lecteurs as $index=>$lecteur){
            if($lecteur->getId() === $id ){
                unset($lecteurs[$index]);
            }
        }
        $this->dataBase->lecteurs = $lecteurs ;
        $this->dataBase->enregisterData();
    }
    public function updateLecteur($id , $nouveauLecteur){
        $lecteurs = $this->dataBase->lecteurs ;
        foreach($lecteurs as $index=>$lecteur){
            if($lecteur->getId()=== $id){
                $lecteur[$index] = $nouveauLecteur;
            }
        }
        $this->dataBase->lecteurs = $lecteurs ;
        $this->dataBase->enregisterData();
    }
    
}