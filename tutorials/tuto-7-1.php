<?php
class Livre {
    private $id;
    private $titre;
    private $ISBN;

    public function __construct($id, $titre, $ISBN) {
        $this->id = $id;
        $this->titre = $titre;
        $this->ISBN = $ISBN;
    }

    public function serialize() {
        return serialize([
            'id' => $this->id,
            'titre' => $this->titre,
            'ISBN' => $this->ISBN,
        ]);
    }

    public static function unserialize($data) {
        $instance = new self(0, '', '');
        $unserializedData = unserialize($data);
        $instance->id = $unserializedData['id'];
        $instance->titre = $unserializedData['titre'];
        $instance->ISBN = $unserializedData['ISBN'];
        return $instance;
    }

    public function afficher() {
        echo "ID: $this->id, Titre: $this->titre, ISBN: $this->ISBN\n";
    }
}

// Utilisation
$livre = new Livre(1, "Titre du Livre", 123456);
$serializedLivre = $livre->serialize();
echo "Livre sérialisé : " . $serializedLivre . "\n";

$livreDésérialisé = Livre::unserialize($serializedLivre);
echo "Livre désérialisé : ";
$livreDésérialisé->afficher();

// Sauvegarde dans un fichier
file_put_contents('livre.txt', $serializedLivre);

// Chargement depuis un fichier
$loadedData = file_get_contents('livre.txt');
$livreDésérialisé = Livre::unserialize($loadedData);
echo "Livre chargé depuis le fichier : ";
$livreDésérialisé->afficher();
?>
