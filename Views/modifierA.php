<?php
session_start();
include_once '../Model/membre.php';
include_once '../Controller/membreC.php';
include_once '../config.php';
$id = $_GET['id'];
$t = $_GET['type'];
$error = "";
$db = config::getConnexion();
if($t==1){
$sql= "UPDATE membres SET role = 'admin' where id='".$id."'";
}
if($t==2){
    $sql= "UPDATE membres SET role = 'collecteur' where id='".$id."'";
    }
    if($t==3){
        $sql= "UPDATE membres SET Etat = NULL where id='".$id."'";
        }
        if($t==4){
            $sql= "UPDATE membres SET Etat = '1' where id='".$id."'";
            }
try
        {
            $query = $db->prepare($sql);
            $query->execute();
            header("location:tables.php");
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }


?>