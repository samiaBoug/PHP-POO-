<?php

class DataBase {
    public $livres =[] ;
    private $filePath = 'DB/livres.txt';
    public function __construct()
    {
        return $this->getData();
    }

    private function getData() {
        if (file_exists($this->filePath)) {
            $jsonData = file_get_contents($this->filePath);
            $data = unserialize($jsonData);
            $this->livres = $data->livres ;
        }
      
    }

    private function setData() {
        $jsonData = serialize($this);
        file_put_contents($this->filePath, $jsonData);
    }

    public function enregistrerData(){
        return $this->setData();
    }
}
