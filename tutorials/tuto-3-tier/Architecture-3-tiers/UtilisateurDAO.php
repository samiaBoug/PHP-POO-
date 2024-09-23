<?php
class UtilisateurDAO {
    private $pdo;

    public function __construct() {
        
            $this->pdo = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '0000');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    }
    

    public function ajouterUtilisateur($nom, $email) {
        $sql = "INSERT INTO utilisateurs (nom, email) VALUES (:nom, :email)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    }
}
?>
