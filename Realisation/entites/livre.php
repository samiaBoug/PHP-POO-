<?php

class livre{
    private $id ;
    private $titre ;
    private $ISBN ;

    public function __construct($titre , $ISBN)
    {
        $this->id = time();
        $this->titre = $titre;
        $this->ISBN = $ISBN ;
    }

    public function getId(){
        return $this->id;
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

}