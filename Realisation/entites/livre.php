<?php

class livre{
    private $id ;
    private $titre ;
    private $ISBN ;
    private $id_Auteur ;
    private $id_emprunt ;
    private $dataPublication ;

    public function __construct($titre , $ISBN  , $id_Auteur)
    {
        $this->id = time();
        $this->titre = $titre;
        $this->ISBN = $ISBN ;
        $this->id_Auteur = $id_Auteur; 
    }

    public function getTitre(){
        return $this->titre ;
    }
    public function setTitre($titre){
        $this->titre = $titre ;
    }
    public function getISBN(){
        return $this->ISBN ;
    }
    public function setISBN($ISBN){
     $this->ISBN = $ISBN ;
    }

    public function getId_Auteur()
    {
        return $this->id_Auteur;
    }

    public function setId_Auteur($id_Auteur)
    {
        $this->id_Auteur = $id_Auteur;

        return $this;
    }
}