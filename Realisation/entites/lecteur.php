<?php

class lecteur{
    private $id ;
    private $nom;
    private $prenom ;
    private $numCarte ;
    private $adresse ;
    private $id_emprunt ;

    public function __construct($nom, $prenom , $numCarte, $adresse)
    {
        $this->id = time();
        $this->nom = $nom;
        $this->prenom = $prenom ;
        $this->numCarte = $numCarte;
        $this->adresse = $adresse ;
        $this->id_emprunt = null;
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

    public function getNumCarte()
    {
        return $this->numCarte;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }
}