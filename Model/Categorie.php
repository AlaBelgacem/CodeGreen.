<?php
    class categorie{
        private int $IdCategorie;
        private string $NomCategorie;
        private string $ImageCategorie;
        private string $Description;

        public function __construct($NomCategorie,$ImageCategorie,$Description){
           // $this->IdCategorie = $IdCategorie;
            $this->NomCategorie= $NomCategorie;
            $this->ImageCategorie= $ImageCategorie;
            $this->Description= $Description;

        }

        //getters
        public function getIdCategorie(){
            return $this->IdCategorie;
        }
        public function getNomCategorie(){
            return $this->NomCategorie;
        }
        public function getDescriptionCategorie(){
            return $this->Description;
        }
        public function getImageCategorie(){
            return $this->ImageCategorie;
        }


        //setters
        public function setIdCategorie($IdCategorie){
            return $this->IdCategorie;
        }
        public function setNomCategorie($NomCategorie){
            return $this->NomCategorie;
        }
        public function setDescriptionCategorie($Description){
            return $this->Description;
        }
        public function setImageCategorieCategorie($ImageCategorie){
            return $this->ImageCategorie;
        }
    }
?>