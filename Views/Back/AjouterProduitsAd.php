
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
        
        <form id="AjoutArticle" method="post">
            <h3>Add Product</h3>
            <fieldset>
                <!--<input placeholder="Id de l'article" type="text" tabindex="1" name="IdArticle" id="IdArticle" >
            </fieldset>-->
            <fieldset>
                <label for="Id Categorie">Category : </label>
                <select name="IdCategorie" id="IdCategorie" tabindex=1 placeholder="Select ID">
                <option value="">  --SELECT--  </option>
                <?php
                 $cat=new categorieC();
                 $liste=$cat->afficherCategories();
                 foreach($liste as $aux){
                ?>
                <option><?php echo $aux['IdCategorie'].'.'.$aux['NomCategorie'];?></option>
                <?php
                }?>
                </select>
            </fieldset>
            <fieldset>
            <label for="NomArticle">Product name: </label>
                <input  type="text"  tabindex="3" name="NomArticle" id="NomArticle" >
            </fieldset>
            <fieldset>
            <label for="ImageArticle">Product image: </label>
                <input placeholder="photo" type="file" tabindex="4" name="ImageArticle" accept="image/png, image/jpeg" id="ImageArticle" >
             </fieldset>
            <fieldset>
            <label for="Description">Description: </label>
                <textarea tabindex="5" name="DescriptionArticle" id="DescriptionArticle" pattern="[0-9a-zA-Z-\.]{0,12}"></textarea>
            </fieldset>
            <fieldset>
            <label for="PrixArticle">Product price: </label>
                <input  type="text" tabindex="6" name="PrixArticle" id="PrixArticle" >
            </fieldset>
            <fieldset>
            <label for="QuantiteArticle">Product quantity: </label>
                <input  type="text" tabindex="7" name="QuantiteArticle" id="QuantiteArticle" >
            </fieldset>
            <br><br>
            <fieldset>
            <p id="erreur"></p>
            </fieldset>
            <fieldset>
                <button name="submit" type="submit" id="submit" class="btn btn-warning" >Submit</button>
            </fieldset> 
            <fieldset>           
            <button><a href="AfficherProduitsAd.php" class="btn btn-warning"></a>Cancel</button>
            </fieldset>           
            

        </form>

        <p><a href="AfficherProduitsAd.php">Back to the products list</a></p>

        <p>In case of any problem please contact us <a href="#">Click Here</a></p>
       
       
        
      </div>
    </div>
      
    </div>
  </section>


        
 

  
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

