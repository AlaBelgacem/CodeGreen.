<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Twilio\Rest\Client;
include $_SERVER['DOCUMENT_ROOT'] .'/Gestion_compte/php/views/mailer/autoload.php';
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
		function verifierM($Email)
		{
			$sql="SELECT * from membres where email='" . $Email . "'";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$membre=$query->fetch();
				$n=$query->rowCount();
				return $n;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function insertToken($em, $token)
		{
			$sql = "INSERT INTO mails (mail, token) VALUES ('$em','$token')";
			$db = config::getConnexion();
			try {
				$query = $db->prepare($sql);
				$query->execute();
			} catch (Exception $e) {
				echo 'Erreur: ' . $e->getMessage();
			}
		}
		
function resetmail($email, $message)
    {
        $mail = new PHPMailer();
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'cyrine.maamer@esprit.tn';                      //email mteik
        $mail->Password   = '201JFT2037';   
		$mail->SMTPSecure = 'ssl';                                  //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->isHTML(true);

        $mail->setFrom('cyrine.maamer@esprit.tn', 'Code Green');
        // email eli bch tabath bih
        $mail->addAddress($email);   // email leli theb tabaathloo

        $mail->Subject = 'New Password';
        $mail->Body    = $message;
        $mail->send();
    }
		

	

	function checkToken($token)
    {
        $sql = "SELECT * FROM mails WHERE token=:t";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':t', $token);
            $query->execute();
            return $query;
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
	function updatePass($pass, $email)
    {
        $hashed = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "UPDATE membres SET Pass='" . $hashed . "'WHERE Email=:e";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':e', $email);
            $query->execute();
            $sql = "DELETE from mails where mail='$email'";
            $query = $db->prepare($sql);
            $query->execute();
            
        header("location:signIn.php");
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

}
