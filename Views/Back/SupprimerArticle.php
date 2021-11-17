<?php
include "../../Model/articles.php";

  include_once "../../config.php";
  include_once "../../Controller/articleC.php";
  
  $Art=new ArticleC();

if(isset($_GET['IdArticle']))
{
    $id=$_GET['IdArticle'];
    $Art-> DeleteArticle($id);
    echo "succeeeesssss supprimer";
   header('Location: AfficherProduitsAd.php');

}
header("refresh:1;url=AfficherProduitsAd.php");
?>