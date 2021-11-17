<?php
include "../../Model/articles.php";
include "../../Controller/articleC.php";
include "../../Model/categorie.php";
include "../../Controller/categorieC.php";


$error = "";

// create user
$article = null;

// create an instance of the controller
$articleC = new articleC();
if (
    //isset($_POST["IdArticle"]) &&
    isset($_POST["IdCategorie"]) &&
    isset($_POST["NomArticle"]) &&
    isset($_POST["ImageArticle"]) &&
    isset($_POST["DescriptionArticle"]) &&
    isset($_POST["PrixArticle"]) &&
    isset ($_POST['QuantiteArticle']) 
) {
        $article = new articles(
           // $_POST['IdArticle'],
            $_POST['IdCategorie'],
            $_POST['NomArticle'],
            $_POST['ImageArticle'],
            $_POST['DescriptionArticle'],
            $_POST['PrixArticle'],
            $_POST['QuantiteArticle']
        );
        $articleC->AjouterArticle($article);
        header('Location:AfficherProduitsAd.php');
    }
    else
        $error = "Missing information";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/styleaddplastic.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="control.js"> </script>
    <link rel="stylesheet" href="assets/css/ajouter.css">
    <title>CodeGreen. | </title>
    
</head>
<body>   

  
<section class="banner">
  
    
    <div class="box">
      
      <div class="square" style="--i:0;"></div>
      <div class="square" style="--i:1;"></div>
      <div class="square" style="--i:2;"></div>
      <div class="square" style="--i:3;"></div>
      <div class="square" style="--i:4;"></div>
      <div class="square" style="--i:5;"></div>
      
     <div class="containerA"> 
      <div class="form"> 
   
        <h2>Add Product</h2>
        <?PHP
include "../../Model/articles.php";

include_once "../../config.php";
include_once "../../Controller/articleC.php";

if (isset($_GET['IdArticle'])){
	$ArtC=new articleC();
    $result=$ArtC->getArticleById($_GET["IdArticle"]);
	foreach($result as $row){
   


     
?>
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
                <input value="<?= $row['PrixArticle']?>" type="text" tabindex="6" name="PrixArticle" id="PrixArticle" >
            </fieldset>
            <fieldset>
                <label for="QuantiteArticle">Product quantity: </label>
                <input value="<?= $row['QuantiteArticle']?>" type="text" tabindex="7" name="QuantiteArticle" id="QuantiteArticle" >
            </fieldset>
            <fieldset>
                <button name="modifier" type="submit" id="contact-submit" class="btn btn-warning" >Submit</button>
            </fieldset> 
            <fieldset>           
            <button href="AfficherProduitsAd.php" class="btn btn-warning">Cancel</button>
            </fieldset>           

        </form>

        <p><a href="AfficherProduitsAd.php">Back to the products list</a></p>

        <p>In case of any problem please contact us <a href="#">Click Here</a></p>
       
       
        
      </div>
    </div>
      
    </div>
  </section>


  <?php
  }

}
if (isset($_POST['modifier'])){
	$Art=new articles($_POST['IdCategorie'],$_POST['NomArticle'],$_POST['ImageArticle'],$_POST['Description'],$_POST['PrixArticle'],$_POST['QuantiteArticle']);
    $ArtC-> UpdateArticle($Art,$_POST['IdArticle']);
	
	header('refresh:1 ;url=AfficherProduitsAd.php');
}
?>
 

  
  <script>src="javascript/addplastic.js"</script>
  <script src="javascript/scroll.js">

    var slides = document.querySelectorAll('.testimonial');
    var index = 0;

    function next(){
        slides[index].classList.remove('active');
        index = (index+1) % slides.length;
        slides[index].classList.add('active');  
    }

    function prev(){
        slides[index].classList.remove('active');
        index = (index - 1 + slides.length) % slides.length;
        slides[index].classList.add('active');  
    }

</script>
</body>
</html>