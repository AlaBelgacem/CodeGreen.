<HTML> 

    <head>
    <title>Modify product</title>
    <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

    <style> 
    body {
       background-color: blanchedalmond;
       background-attachment: fixed;
       background-position:center;
    }
    </style>
    </head>
<body>
    <?PHP
include "../../Model/articles.php";

include_once "../../config.php";
include_once "../../Controller/articleC.php";

if (isset($_GET['IdArticle'])){
	$ArtC=new articleC();
    $result=$ArtC->getArticleById($_GET["IdArticle"]);
	foreach($result as $row){
   


     
?>

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            
                
            </div>
            <script src="control.js"> </script>
            <link rel="stylesheet" href="assets/css/ajouter.css">
            <div style="border-radius: 36px ; background : #a52a2a78; margin-top : 200px ;width : 720px" class="container">  
            <form id="contact" action="" method="post" name='registration'>
            <h3>Modify product</h3>

            <fieldset>
            <label for="Id Article">Product ID: </label>
                <input value="<?= $row['IdArticle']?>" type="text" tabindex="1" name="IdArticle" id="IdArticle" readonly>
            </fieldset>
            <fieldset>
                <label for="Nom Categorie">Category Id: </label>
                <input value="<?= $row['IdCategorie']?>" type="text" tabindex="2" name="IdCategorie" id="IdCategorie" readonly >
            </fieldset>
            <fieldset>
                <label for="NomArticle">Product Name: </label>
                <input value="<?= $row['NomArticle']?>" type="text"  tabindex="3" name="NomArticle" id="NomArticle" >
            </fieldset>
            <fieldset>
                <label for="ImageArticle">Product image: </label>
                <input value="<?= $row['ImageArticle']?>" type="text" tabindex="4" name="ImageArticle" accept="image/png, image/jpeg" id="ImageArticle" >
             </fieldset>
            <fieldset>
                 <label for="Description">Description: </label>
                <input value="<?= $row['DescriptionArticle']?>" tabindex="5" name="Description" id="Description" >
            </fieldset>
            <fieldset>
                <label for="PrixArticle">Product price: </label>
                <input value="<?= $row['PrixArticle']?>" type="number" tabindex="6" name="PrixArticle" id="PrixArticle"  min="5" max="100" oninput="validity.valid||(value='')" >
            </fieldset>

            <fieldset>
                <label for="QuantiteArticle">Product quantity: </label>
                <input value="<?= $row['QuantiteArticle']?>" type="number" tabindex="7" name="QuantiteArticle" id="QuantiteArticle"  min="15" max="100" oninput="validity.valid||(value='')" >
            </fieldset>
            <fieldset>
                <button name="modifier" type="submit" id="contact-submit" class="btn btn-warning" style=" border-color :#ff0059 ;background: #ff0059;" >Submit</button>
                      
            <button href="AfficherProduitsAd.php" class="btn btn-warning" style=" border-color :#ff0059; background: #ff0059;">Cancel</button>
            </fieldset>     
            
            

        

        </form>
   
</div>
<?php
  }

}
if (isset($_POST['modifier'])){
	$Art=new articles($_POST['IdCategorie'],$_POST['NomArticle'],$_POST['ImageArticle'],$_POST['Description'],$_POST['PrixArticle'],$_POST['QuantiteArticle']);
    $ArtC-> UpdateArticle($Art,$_POST['IdArticle']);
	
	header('refresh:1 ;url=AfficherProduitsAd.php');
}
?>

</body>
</HTMl>

