<?php
session_start();
include_once '../Model/membre.php';
include_once '../Controller/membreC.php';
include_once '../config.php';
$id = $_GET['id'];
$error = "";

// create adherent
$member = null;

// create an instance of the controller
$membreC = new membreC();
$db = config::getConnexion();
if(isset($_GET['token']))
{
	$token=$_GET['token'];
	$query=$membreC->checkToken($token);
	if($query->rowCount()!=0)
	{
		$row=$query->fetch();
		$token=$row['token'];
		$email=$row['mail'];
	}
    
}
else
{
	header('location:index.php');
}
if(isset($_POST['password'])&& isset($_POST['password2']))
{
if ($_POST['password']==$_POST['password2'])
{
    $membreC->updatePass($pass,$email);
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="SignUp.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <title>CodeGreen. | Set New Password</title>
</head>

<body>

    <header>
    <div class="cercle">
        </div>
        <div>
            <img class="icon" src="assets/icon.png">
        </div>
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
                        <a href="#" class="nav-link">Contact</a>
                    </li>
                </ul>

            </nav>
        </div>
    </header>

    <section class="banner">


        <img src="assets/back.png" class="back">
        <div class="rect">
        </div>
        <label class="signIn">Reset Password</label>
        <form action="" method="POST">

           
            
        <label class="insc">Password:</label>
        <br><input type="password" name="password" id="pass" size="50"  required>
        <div id="error_mdp" class="error"></div><br><br><br>
        <label class="insc">Password Confirmation:</label>
        <br><input type="password" name="password2" id="pass2" size="50"  required>
           

            <input class="signIn_button" type="submit" value="Save Password" style="position:absolute;top:160px;" required><br><br><br>

            

        </form>

    </section>
    <div class="footer-basic">
        <footer>
            <div class=rect5></div>
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



        <script src="javascript/scroll.js">
            var slides = document.querySelectorAll('.testimonial');
            var index = 0;

            function next() {
                slides[index].classList.remove('active');
                index = (index + 1) % slides.length;
                slides[index].classList.add('active');
            }

            function prev() {
                slides[index].classList.remove('active');
                index = (index - 1 + slides.length) % slides.length;
                slides[index].classList.add('active');
            }
        </script>

</body>

</html>