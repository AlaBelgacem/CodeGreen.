<?php
  include_once "../../config.php";

include "../../Model/categorie.php";
include "../../Controller/categorieC.php";


$error = "";

$categorie = null;

// create an instance of the controller
$categorieC = new categorieC();
if (
   // isset($_POST["IdCategorie"]) &&
    isset($_POST['NomCategorie']) &&
    isset ($_POST['ImageCategorie']) &&
    isset($_POST["Description"]) 

) {
        $categorie = new categorie(
           // $_POST['IdCategorie'],
            $_POST['NomCategorie'],
            $_POST['ImageCategorie'],
            $_POST['Description']
            
  
        );
        $categorieC-> AjouterCategorie($categorie);
       header('Location:AfficherProduitsAd.php');
    }
    else
        $error = "Missing information";

?>

<HTML>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            <title>Add category</title>
        </head>
        <body>
        <link rel="stylesheet" href="assets/css/ajouter.css">
        <div class="container">  
          <form id="categorie" name="MonForm"  method="post" >
            <h3>Add category</h3>
            
            <!--<fieldset>
              <input placeholder="Id Categorie" type="text" tabindex="1" name="IdCategorie" id="IdCategorie" readonly>
            </fieldset>-->
            <fieldset>
            <label for="NomCategorie">Category name: </label>
              <input type="text" tabindex="1" name="NomCategorie" id="NomCategorie" >
            </fieldset>
            <fieldset>
            <label for="ImageCategorie">Category Image: </label>
                <input  type="file" tabindex="2" name="ImageCategorie" accept="image/png, image/jpeg" id="ImageCategorie" >
             </fieldset>
            <fieldset>
            <fieldset>
            <label for= "Description" >Description: </label>
              <input  type="text" tabindex="3" name="Description" id="Description">
            </fieldset>
            <fieldset>
              <button name="submit" type="submit" value="submit" id="categorie submit" class="btn btn-warning">Submit</button>
            </fieldset>
            <fieldset>
              <button formaction="AfficherProduitsAd.php" ><a href="AfficherProduitsAd.php" ></a>Cancel</button>
            </fieldset>
          </form >     
        </div>
        
     
        
        </body>
        </HTMl>