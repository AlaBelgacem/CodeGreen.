<?php
	class Membre{
        private $id=NULL;
		private $nom=null;
		private $prenom=null;
		private $phone=null;
		private $email=null;
        private $pass=null;
        private $region=null;
        private $city=null;
		private $code_postal=null;
		private $role=null;

		function __construct($id,$nom, $prenom,$phone,$email, $pass,$region,$city,$code_postal,$role){
            $this->id=$id;
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->phone=$phone;
			$this->email=$email;
            $this->pass=$pass;
            $this->region=$region;
            $this->city=$city;
            $this->code_postal=$code_postal;
			$this->role=$role;

		}
        function getId(){
			return $this->id;
		}
		function getNom(){
			return $this->nom;
		}
		function getPrenom(){
			return $this->prenom;
		}
		function getPhone(){
			return $this->phone;
		}
		function getEmail(){
			return $this->email;
		}
		function getPass(){
			return $this->pass;
		}
        function getRegion(){
			return $this->region;
		}
        function getCity(){
			return $this->city;
		}
        function getCodePostal(){
			return $this->code_postal;
		}
		function getRole(){
			return $this->role;
		}
		function setNom(string $nom){
			$this->nom=$nom;
		}
		function setPrenom(string $prenom){
			$this->prenom=$prenom;
		}
		function setEmail(string $email){
			$this->email=$email;
		}
		function setPhone(int $phone){
			$this->phone=$phone;
		}
		function setPass(string $pass){
			$this->pass=$pass;
		}
        function setRegion(string $pass){
			$this->region=$pass;
		}
        function setCodePostal(string $pass){
			$this->code_postal=$pass;
		}
		function setRole(string $r){
			$this->role=$r;
		}
		
	}


?>