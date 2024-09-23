<?php
require_once 'UtilisateurService.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];

    $service = new UtilisateurService();
    $service->ajouterUtilisateur($nom, $email);

    echo "Utilisateur ajouté avec succès.";
}
?>
