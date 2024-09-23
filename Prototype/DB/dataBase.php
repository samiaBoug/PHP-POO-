<?php 
// method pour retirée ou ajouté les donnée 

class DataBase{
private $filePath = 'DB/livres.json';

public function __construct()
{
    $this-> getData();
}
public function getData(){
 $jsonData = file_get_contents($this->filePath);
 return json_decode($jsonData, true);
}

public function setData(){
    $jsonData = json_encode($this , JSON_PRETTY_PRINT);
    file_put_contents($this->filePath ,$jsonData);
    
}
public function enregistrerData(){
    $this->setData();
}

}