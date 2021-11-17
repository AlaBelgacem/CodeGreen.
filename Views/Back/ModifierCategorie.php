<HTML> 

<head>
    <meta charset="utf-8">
    <title>Modify Category</title>
</head>
<body>
<?PHP
include "../../Model/Categorie.php";
include_once "../../config.php";
include_once "../../Controller/CategorieC.php";

if (isset($_GET['IdCategorie'])){
	$catC=new categorieC();
    $result=$catC->getCategorieById($_GET['IdCategorie']);
	foreach($result as $row){ 
?>
 

 <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            <script src="control.js"> </script>
            <link rel="stylesheet" href="assets/css/ajouter.css">
            <div class="container">  
            <form id="contact" action="" method="post" name='registration'>
            <h3>Modify category</h3>
            <fieldset>
            <label for="IdCategorie">Category ID: </label>
                <input value="<?= $row['IdCategorie']?>" type="text" tabindex="1" name="IdCategorie" id="IdCategorie" readonly>
            </fieldset>
            <fieldset>
            <label for="NomCategorie">Category name: </label>
                <input value="<?= $row['NomCategorie']?>" type="text" tabindex="2" name="NomCategorie" id="NomCategoie">
            </fieldset> 
            <fieldset>
            <label for="ImageCategorie">Category image: </label>
                <input value="<?= $row['ImageCategorie']?>" type="text" tabindex="3" name="ImageCategorie" id="ImageCategoie">
            </fieldset>             
            <fieldset>
            <label for="Description">Description: </label>
                <input value="<?= $row['Description']?>" tabindex="4" name="Description" id="Description" type="text" >
            </fieldset>
            <fieldset>
             <button name="modifier" type="submit" id="contact-submit" class="btn btn-warning" >Submit</button>
            </fieldset> 
            <fieldset>           
            <button><a href="AfficherProduitsAd.php" ></a>Cancel</button>
            </fieldset>           

        </form>
   
</div>
<?php
	}
}

if (isset($_POST['modifier'])){
	$cat=new categorie($_POST['NomCategorie'],$_POST['ImageCategorie'],$_POST['Description']);
	$catC-> UpdateCategorie($cat,$_POST['IdCategorie']);
   header('refresh:1 ;url=AfficherProduitsAd.php');


}
?>
</body>
</HTMl>