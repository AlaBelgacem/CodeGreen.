<?php
	include '../config.php';
	include_once '../Model/membre.php';
	class membreC {
		function afficherM(){
			$sql="SELECT * FROM membres";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
		}
		function supprimerM($Id){
			$sql="DELETE FROM membres WHERE id=:Id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':Id', $Id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
		}
		function ajouterM($membre){
			$sql="INSERT INTO membres (First_Name,Last_Name,Email,phone,Pass,Region,City,Zip_Code) 
			VALUES (:Nom,:Prenom, :Email,:phone,:Pass, :Region,:City,:Zip_Code)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'Nom' => $membre->getNom(),
					'Prenom' => $membre->getPrenom(),
					'Pass' => $membre->getPass(),
					'phone' => $membre->getPhone(),
					'Email' => $membre->getEmail(),
					'Region' => $membre->getRegion(),
                    'City' => $membre->getCity(),
                    'Zip_Code' => $membre->getCodePostal()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererM($Id){
			$sql="SELECT * from membres where id=$Id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$membre=$query->fetch();
				return $membre;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		/*function modifierM($membre, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE membres SET 
                        Pass= :Pass,
						Email= :Email, 
						Region= :Region
					WHERE id= :Id'
				);
				$query->execute([
					'Email' => $membre->getEmail(),
					'Region' => $membre->getRegion(),
                    'Pass' => $membre->getPass(),
					'Id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				die('Erreur: '.$e->getMessage());
			}
		}*/

	}
?>