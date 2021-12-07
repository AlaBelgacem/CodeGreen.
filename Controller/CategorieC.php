<?php
    require_once "../../config.php";
    class categorieC{
        public function afficherCategories() {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM categorie'
                );
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getCategorieById($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM categorie WHERE IdCategorie = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
/*
        public function getCategorieByName($Nom) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM categorie WHERE NomCategorie = :Nom'
                );
                $query->execute([
                    'Nom' => $Nom
                ]);
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
*/
        public function AjouterCategorie($Cat) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO categorie (NomCategorie,ImageCategorie,Description) 
                VALUES ( :NomCategorie, :ImageCategorie,:Description)'
                );
                $query->execute([
                   // 'IdCategorie' => $Cat->getIdCategorie(),
                     'NomCategorie' => $Cat->getNomCategorie(),
                    'Description' => $Cat->getDescriptionCategorie(),
                    'ImageCategorie' => $Cat->getImageCategorie()
                ]);
                
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function UpdateCategorie($Cat, $id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'UPDATE categorie SET NomCategorie= :NomCategorie,ImageCategorie:=ImageCategorie,Description = :Description  WHERE IdCategorie = :id'
                );
                $query->execute([
                    'NomCategorie' => $Cat->getNomCategorie(),
                    'ImageCategorie' => $Cat->getImageCategorie(),
                    'Description' => $Cat->getDescriptionCategorie(),
                    'id' => $id
                ]);
                echo $query->rowCount() . " records UPDATED successfully";
                return $query->fetch();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function DeleteCategorie($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'DELETE FROM categorie WHERE IdCategorie = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function TriCategoriesAd(){
            try{
                $pdo=getConnexion();
                $query=$pdo->prepare('SELECT * FROM categorie ORDER BY NomCategorie DESC');
                $query->execute();
                return $query->fetchAll();
            }
            catch (PDOException $e) {
                $e->getMessage();
            }

        } 

       
        
        
    }