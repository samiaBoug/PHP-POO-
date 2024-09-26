<?php
require_once '../DB/dataBase.php';
class auteurDAO{
    private $baseDonne ;
    public function __construct()
    {
        $this->baseDonne = new dataBase();
    }

    public function getAuteurs(){
        return $this->baseDonne->auteurs ;
    }

    public function setAuteur($auteur){
        //ajouter au table auteurs 
        array_push($this->baseDonne->auteurs , $auteur);
        //
        $this->baseDonne->enregisterData();
    }

    public function deleteAuteur($id){
        $auteurs = $this->baseDonne->auteurs ;
        foreach($auteurs as $index=>$auteur){
            if($auteur->getId() === $id){
                unset($auteur[$index]);
            }
        }
    }

    public function updateAuteur($id , $nouvauAuteur){

    }
}