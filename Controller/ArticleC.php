<?php
    require_once "../../config.php";
    class articleC{
        public function afficherArticles() {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM article '
                );
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function getArticleById($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM article WHERE IdArticle = :id'
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
        public function getArticleByName($Nom) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM article WHERE NomArticle = :Nom'
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
        public function AjouterArticle($Art) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO article (IdCategorie,NomArticle,ImageArticle,DescriptionArticle,PrixArticle,QuantiteArticle) 
                VALUES (:IdCategorie, :NomArticle, :ImageArticle,:DescriptionArticle,:PrixArticle,:QuantiteArticle)'
                );
                $query->execute([
                //'IdArticle' =>$Art->getIdArticle(),
                'IdCategorie' => $Art->getIdCategorieArticle(),
                 'NomArticle' => $Art->getNomArticle(),
                 'ImageArticle' => $Art->getImageArticle(),
                 'DescriptionArticle' => $Art->getDescriptionArticle(),
                 'PrixArticle' => $Art->getPrixArticle(),
                 'QuantiteArticle' => $Art->getQuantiteArticle()
                ]);
                echo "erreur";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function UpdateArticle($Art, $id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'UPDATE article SET IdCategorie= :IdCategorie,NomArticle=:NomArticle,
                     ImageArticle=:ImageArticle,DescriptionArticle = :DescriptionArticle,PrixArticle=:PrixArticle,QuantiteArticle=:QuantiteArticle
                     WHERE IdArticle = :id'
                );
                $query->execute([
                'IdCategorie' => $Art->getIdCategorieArticle(),
                'NomArticle' => $Art->getNomArticle(),
                'ImageArticle' => $Art->getImageArticle(),
                'DescriptionArticle' => $Art->getDescriptionArticle(),
                'PrixArticle' => $Art->getPrixArticle(),
                'QuantiteArticle' => $Art->getQuantiteArticle(),
                'id' => $id
                ]);
                echo $query->rowCount() . " records UPDATED successfully";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function DeleteArticle($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'DELETE FROM article WHERE IdArticle = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function TriArticlesAd(){
            try{
                $pdo=getConnexion();
                $query=$pdo->prepare("SELECT * FROM article ORDER BY NomArticle ");
                $query->execute();
                return $query->fetchAll();
            }
            catch (PDOException $e) {
                $e->getMessage();
            }
        }
        public function TriArticlesPlus(){
            try{
                $pdo=getConnexion();
                $query=$pdo->prepare("SELECT * FROM article ORDER BY PrixArticle");
                $query->execute();
                return $query->fetchAll();
            }
            catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function TriArticlesMoins(){
            try{
                $pdo=getConnexion();
                $query=$pdo->prepare("SELECT * FROM article ORDER BY PrixArticle DESC");
                $query->execute();
                return $query->fetchAll();
            }
            catch (PDOException $e) {
                $e->getMessage();
            }
        }
 
       
       
        
    }
    