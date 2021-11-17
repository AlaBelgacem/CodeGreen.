<?php

  include_once "../../Model/Categorie.php";
  include_once "../../config.php";
  include_once "../../Controller/CategorieC.php";
  
  $cat=new categorieC();

if(isset($_GET['IdCategorie']))
{
    $id=$_GET['IdCategorie'];
    $cat-> DeleteCategorie($id);
    echo "succeeeesssss supprimer";
   header('Location: AfficherProduitsAd.php');

}
header("refresh:1;url=AfficherProduitsAd.php");
?>