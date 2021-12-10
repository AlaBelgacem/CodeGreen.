<?php
include_once '../Model/membre.php';
include_once '../Controller/membreC.php';
include_once '../config.php';
$membreC = new membreC();
if (isset($_POST['email'])) {
    $n = $membreC->verifierM($_POST['email']);
    if ($n == 1) {
        $m=$_POST['email'];
        $token=uniqid(md5(time()));
		$membreC->insertToken($m,$token);
        $message= "Hi $m,<br> Click <a href='http://localhost/Gestion_compte/php/Views/change_password.php?token=$token'>here</a> to reset your password. ";
        $membreC->resetmail($m,$message);
        header("location:mail.php");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <title>CodeGreen. | Get Password</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Barre Acceuil Haut  -->
    <header>
    <div class="cercle">
        </div>
        <div>
            <img class="icon" src="assets/icon.png">
        </div>
        <div class="container">
            <nav class="nav">
                <a href="index.html" class="logo">CodeGreen</a>
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
    <div class="cercle">
        </div>
        <div>
            <img class="icon" src="assets/icon.png">
        </div>
    <section class="banner">
        <!-- ============================================================== -->
        <!-- Insertion Image De Fond -->
        <img src="assets/back.png" class="back">
        <!-- ============================================================== -->
        <!-- Insertion Rectangle Form -->
        <div class="rect8">
        </div>

        <!-- ============================================================== -->
        <!-- Formulaire -->
        <form  method="POST">
            <label class="insc">Email:</label>
            <br><br> <input class="mail" type="email" name="email" placeholder="contact@gmail.com" size="50" style="height:25px;" required><br><br>
            <div class="supprimer">

                <!--button class='btn_delete'><a href='mail.php?email=$m' style='font-size:15px;width: 150px;'>Send Validation Code</a></button>-->
                <input class="boutonm" type="submit" value="Send Validation Code" style="font-size:15px;width: 190px;left:50px;top:10px;" required><br><br>
            </div>





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