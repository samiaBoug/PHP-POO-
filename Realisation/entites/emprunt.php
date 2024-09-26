<?php 
class emprunt {
    private $id ;
    private $datDebut ;
    private $dateReteurPrevu ;
    private $dateReteurReel ;
    private $id_lecteur ;
    private $id_livre ;

    public function __construct($datDebut, $dateReteurPrevu, $dateReteurReel, $id_lecteur, $id_livre)
    {
        $this->id = time();
        $this->datDebut = $datDebut;
        $this->dateReteurPrevu = $dateReteurPrevu;
        $this->dateReteurReel = $dateReteurReel ;
        $this->id_lecteur = $id_lecteur ;
        $this->id_livre = $id_livre;
    }


    public function getId()
    {
        return $this->id;
    }


    public function getDatDebut()
    {
        return $this->datDebut;
    }

 
    public function getDateReteurPrevu()
    {
        return $this->dateReteurPrevu;
    }

    public function getDateReteurReel()
    {
        return $this->dateReteurReel;
    }


    public function getId_lecteur()
    {
        return $this->id_lecteur;
    }


    public function getId_livre()
    {
        return $this->id_livre;
    }
}