<?php
//afficher les livres 
//ajouter livres

// class Livre{
//     public $isbn;
//     public $titre;
//     public $auteurs =[];
//     public $datePub ;
//     public $disponibilite ;

//     public function __construct($isbn, $titre, $auteurs, $datePub, $disponibilite){
//         $this->isbn = $isbn ;
//         $this->titre = $titre ;
//         $this->auteurs = $auteurs ;
//         $this->datePub = $datePub ;
//         $this->disponibilite = $disponibilite ;

//     }

//     public function afficherLivre(){
     
//     }

//     public function ajouterLivre(){
     
//     }

// }

// class Auteur{
//     public $nom ;
//     public $prenom ;
//     public $nationalite ;
//     public $livres = [];
// }

// // Fonction pour enregistrer un objet Livre dans un fichier JSON
// function enregistrerLivreDansFichier(Livre $livre, string $fichier) {
//     $json = json_encode($livre, JSON_PRETTY_PRINT);
//     file_put_contents($fichier, $json);
// }

// // Fonction pour lire un objet Livre depuis un fichier JSON
// function lireLivreDepuisFichier(string $fichier) : Livre {
//     $json = file_get_contents($fichier);
//     return json_decode($json);
// }