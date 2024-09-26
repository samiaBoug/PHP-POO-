<?php 
class auteur {
    private $id;
    private $nom ;
    private $prenom ;
    private $nationalite ;


    public function __construct($nom , $prenom , $nationalite)
    {
        $this->id = time();
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->nationalite = $nationalite;
      
    }


    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }


    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getNationalite()
    {
        return $this->nationalite;
    }
}