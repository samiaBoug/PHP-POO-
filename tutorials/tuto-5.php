<?php
// Relation Un à Un : Personne et Passeport
class personne {
    private $nom ;
    private $id ;
    private $passport ;

    public function setPassport (passport $passport) :void{
        $this->passport = $passport ;
        $passport -> setPersonne($this);

    }
}

class Passport {
    private $id ;
    private $num ;
    private $personne ;

    public function setPersonne(personne $personne):void{
        $this->personne = $personne ;
      
    }
}
// Relation Un à Plusieurs : Auteur et Livre
class Auteur{
    private $id;
    private $nom;
    private $livres=[];

    public function addLivre():void{
        $this->livres[] = $livres;
        $livres->setAuteur($this);
    }
}

class Livres{
    private $id ;
    private $titre ;
    private $auteur ;

    public function setAuteur(auteur $auteur):void{
        $this->auteur = $auteur ;
        
    }
}

//Relation Plusieurs à Plusieurs : Étudiant et Cours (avec table d’association) 
class Etudient{
    private $id ;
    private $nom;
    private $cours=[];

    public function ajouterCours(cours $cours):void{
        $this->cours[]= $cours ;
        $cours-> ajouterEtudient($this);
    }
}

class Cour{
    private $id ;
    private $etudient=[];

    public function ajouterEtudient(etudient $etudient):void{
     $this->etudient[]= $etudient ;

    }
}
// 
// Configuration de Doctrine (simplifiée)
use Doctrine\ORM\EntityManager;

$entityManager = EntityManager::create(/* ... paramètres de connexion ... */);

// Création d'un nouvel auteur et de livres associés
$auteur = new Auteur();
$auteur->setNom('Dumas');

$livre1 = new Livre();
$livre1->setTitre('Les Trois Mousquetaires');
$livre1->setAuteur($auteur);

$entityManager->persist($auteur);
$entityManager->persist($livre1);
$entityManager->flush();