<?php
// service/livreService.php
require_once 'dataAccess/livreDAO.php';


class LivreService {
    private $livreDAO ;
    public function __construct()
    {
        $this-> livreDAO = new livreDAO();
    }
    
    public function getLivres() {
    return $this->livreDAO->getLivre();
    }

    public function setLivre($livre) {
       $this->livreDAO->addLivre($livre);
    }
}
?>
