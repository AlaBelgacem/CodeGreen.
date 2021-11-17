<?php
    include_once '../Model/Plastique.php';
    include_once '../Controller/PlastiqueC.php';

    $error = "";

    // create plastic
    $Plastique = null;

    // create an instance of the controller
    $PlastiqueC = new PlastiqueC();
    if (
        isset($_POST["ID"]) &&
		isset($_POST["Quantity"]) &&		
        isset($_POST["DateOfRecuperation"])&&
        isset($_POST["Adress"])&&
        isset($_POST["Note"])
    ) {
        if (
            !empty($_POST["ID"]) &&
            !empty($_POST["Quantity"]) &&		
            !empty($_POST["DateOfRecuperation"])&&
            !empty($_POST["Adress"])&&
            !empty($_POST["Note"])
        ) {
            $Plastique = new Plastique(
                $_POST["ID"] ,
                $_POST["Quantity"] ,		
                $_POST["DateOfRecuperation"],
                $_POST["Adress"],
                $_POST["Note"]
            );
            $PlastiqueC->modifierPlastique($Plastique, $_POST["ID"]);
            header('Location:DisplayProductsPerClient.php');
        }
        else
            $error = "Missing information";
    }    
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
    <title>CodeGreen. | UpdatePlastic</title>
    
</head>
<body>   
  <header>
    <div class="container">
        <nav class="nav">

            
            <a href="index.html" class="logo">CodeGreen.</a>
            <ul class="nav-list">
                <li>
                    <a href="index.html" class="nav-link">Home</a>
                </li>
                <li>
                    <a href="#" class="nav-link">Shop</a>
                </li>
                <li>
                    <a href="#" class="nav-link">Accounts</a>
                </li>
                <li>
                    <a href="#" class="nav-link">About</a>
                </li>
                <li>
                    <a href="#" class="nav-link">Contact Us</a>
                </li>
              
            </ul>
            
        </nav>
    </div>
</header>
  
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
   
        <h2>Update plastic</h2>
        
       
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        <?php
			if (isset($_POST['ID'])){
				$Plastique = $PlastiqueC->recupererPlastique($_POST['ID']);
				
		?>
        <form action="" method="POST">
        <div class="inputBx">
            <input type="text" name="ID" id="ID" value="<?php echo $Plastique['ID']; ?>" maxlength="100">
            <span>ID</span>
            <i class="fas fa-user"></i>
          </div>
          <div class="inputBx">
            <input type="number" step="0.10" name="Quantity" id="Quantity" value="<?php echo $Plastique['Quantity']; ?>">
            <span>Quantity (kg)</span>
            <i class="fas fa-balance-scale"></i>
          </div>
          <div class="inputBx">
            <input type="date" name="DateOfRecuperation" id="DateOfRecuperation" value="<?php echo $Plastique['DateOfRecuperation']; ?>">
            <span>Date of recuperation</span>
            <i class="fas fa-calendar-alt"></i>
          </div>
          <div class="inputBx">
            <input type="text" name="Adress" value="<?php echo $Plastique['Adress']; ?>" id="Adress">
            <span>Adress</span>
            <i class="fas fa-map-marked-alt"></i>
          </div>
          <div class="inputBx">
            <input type="text" name="Note" value="<?php echo $Plastique['Note']; ?>" id="Note">
            <span>Note</span>
            <i class="fas fa-edit"></i>
          </div>
        
          <div class="inputBx">
          <input type="submit" name="Update" value="Update">
            
          </div>

          <div class="inputBxr">
            <input type="reset" value="Cancel"> 
          </div>

        </form>

        <?php
		}
		?>
        <p><a href="DisplayProductsPerClient.php">Back to the plastics list</a></p>

        <p>In case of any problem please contact us <a href="#">Click Here</a></p>
       
       
        
      </div>
    </div>
      
    </div>
  </section>
  

  <div class="footer-basic">
    <footer>
        <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Home</a></li>
            <li class="list-inline-item"><a href="#">Shop</a></li>
            <li class="list-inline-item"><a href="#">About</a></li>
            <li class="list-inline-item"><a href="#">Blog</a></li>
            <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
        </ul>
        
        <p class="copyright">Copyright © 2021</p>
    </footer>
 

  
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