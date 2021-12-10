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
if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["phone"]) &&
    isset($_POST["password"]) &&
    isset($_POST["region"]) &&
    isset($_POST["city"]) &&
    isset($_POST["code"])
) {

    $sql = "UPDATE membres SET 
        First_Name ='" . $_POST["nom"] . "',
        Last_Name ='" . $_POST["prenom"] . "',
        Email ='" . $_POST["email"] . "',
        phone ='" . $_POST["phone"] . "',
        Pass ='" . $_POST["password"] . "',
        Region ='" . $_POST["region"] . "',
        City ='" . $_POST["city"] . "',
        Zip_Code ='" . $_POST["code"] . "' WHERE id ='" . $id . "'";
    try {
        $query = $db->prepare($sql);
        $query->execute();

        if ($_SESSION["role"] == "admin") {
            header("location:tables.php");
        }
        if ($_SESSION["role"] == "client") {
            header("location:profil.php");
        }
    } catch (PDOException $e) {
    }
    // header('Location:afficherListeAdherents.php');
} else
    $error = "Missing information";



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
    <title>CodeGreen. | Sign Up</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Barre Acceuil Haut  -->

    <header>
        <div class="container">
            <div class="cercle">
            </div>
            <div>
                <img class="icon" src="assets/icon.png">
            </div>
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
        <?php if (isset($_GET['id'])) {
            $member = $membreC->recupererM($_GET['id']);
        } ?>
        <!-- ============================================================== -->
        <!-- Insertion Image De Fond -->
        <img src="assets/back.png" class="back">
        <!-- ============================================================== -->
        <!-- Insertion Rectangle Form -->
        <div class="rect2">
        </div>
        <label class="signIn">Modify</label>
        <!-- ============================================================== -->
        <!-- Formulaire -->
        <form action="" method="POST">

           
            <label class="insc">Email:</label>
            <br><input type="email" name="email" id="email" size="50" value=<?php echo $member["Email"]; ?>><br><br><br>

            <label class="insc">Phone:</label>
            <br><input type="number" name="phone" id="email" size="50" value=<?php echo $member["phone"]; ?>><br><br><br>

            <label>Password:</label>
            <br><input type="text" name="password" id="pass" size="50"><br><br><br>
            <div id="error_mdp" style="color: red;"></div><br>

            <label>Region:</label>
            <br><input type="text" name="region" id="region" size="50" value=<?php echo $member["Region"]; ?>><br><br><br>

            <label>City:</label>
            <br><input type="text" name="city" id="city" size="50" value=<?php echo $member["City"]; ?>><br><br><br>

            <label>Zip Code:</label>
            <br><input type="number" name="code" id="code_postal" size="50" value=<?php echo $member["Zip_Code"]; ?>><br><br><br>

            <input class="bouton" type="submit" value="Modifier" style="font-size:15px;height:25px;width:100px;" required><br><br><br>



        </form>

        <!--
            <div id="next" class="fas fa-chevron-right" onclick="next()"></div>
            <div id="prev" class="fas fa-chevron-left" onclick="prev()"></div>
           -->

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