<?php

 class dataBase{
    private $filePath = '../DB/db.txt';
    public $livres=[];
    public $auteurs =[];
    public $lecteurs = [];
    public $emprunts = [];

        public function __construct()
        {
            return $this->getData();
        }
        private function getData(){
            if(file_exists($this->filePath)){
                            //recuperer tous les données 
            $jsonData = file_get_contents($this->filePath);
            //unserialisation 
            $data = unserialize($jsonData);
            //recuperer livres 
            $this->livres = $data->livres ;
            $this->auteurs = $data->auteurs ;
            $this->lecteurs = $data->lecteurs ;
            $this->emprunts = $data->emprunts ;
            }


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