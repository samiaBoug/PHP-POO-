<?php 
class auteur {
    private $id;
    private $nom ;
    private $prenom ;
    private $nationalite ;


    public function __construct($nom , $prenom , $nationalite)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->nationalite = $nationalite;
      

    }
}