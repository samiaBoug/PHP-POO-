<?php
require_once '../DB/dataBase.php';
class empruntDAO{
    private $baseDonne ;
    public function __construct()
    {
        $this->baseDonne = new dataBase();
    }

    public function getEmprunts(){
        return $this->baseDonne->emprunts ;
    }

    public function setEmprunt($emprunt){
        //ajouter au table emprunts 
        array_push($this->baseDonne->emprunts , $emprunt);
        //
        $this->baseDonne->enregisterData();
    }

    public function deleteEmprunt($id){
        $emprunts = $this->baseDonne->emprunts ;
        foreach($emprunts as $index => $emprunt){
            if($emprunt->getId() === $id){
                unset($emprunts[$index]);
                break;
            }
        }
        $this->baseDonne->emprunts = array_values($emprunts);
        $this->baseDonne->enregisterData();
    }

    public function updateEmprunt($id , $nouvauemprunt){
        // trouver id 
        $emprunts = $this->baseDonne->emprunts ;
        foreach($emprunts as $index=>$emprunt){
            if($emprunt->getId()=== $id){
                $emprunts[$index]= $nouvauemprunt ;
            }
        }
        $this->baseDonne->emprunts = $emprunts ;
        $this->baseDonne->enregisterData();
    }
}