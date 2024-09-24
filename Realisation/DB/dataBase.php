<?php

 class dataBase{
    private $filePath = 'DB/livres.txt';
    public $livres=[];

        public function __construct()
        {
            return $this->getData();
        }
        private function getData(){
            //recuperer tous les données 
            $jsonData = file_get_contents($this->filePath);
            //unserialisation 
            $data = unserialize($jsonData);
            //recuperer livres 
            $this->livres = $data->livres ;

        }
        private function setData(){
            //serialisation
            $jsonData = serialize($this);
            //
            file_put_contents( $this->filePath, $jsonData );

        }

        public function enregisterData(){
            return $this->setData();
        }

 }