<?php
require "../config.php";
session_start();
$db = config::getConnexion();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $password = $hash;
    $sql = "SELECT * from membres where Email='" . $email . "'";
    try {
        $query = $db->prepare($sql);
        $query->execute();
        $user = $query->fetch();
        $_SESSION["role"] = $user["role"];
        $_SESSION["nom"] = $user["First_Name"];
        $_SESSION["prenom"] = $user["Last_Name"];
        $_SESSION["email"] = $email;
        $_SESSION["id"] = $user["id"];
        $verif = password_verify($_POST['password'], $user["Pass"]);
        if ($verif) {
            if ($user["role"] == "client" && $user["Etat"] == NULL) {
                header("location:profil.php");
            }
            if ($user["role"] == "admin" && $user["Etat"] == NULL) {
                header("location:tables.php");
            }
            if ($user["Etat"] !== NULL) {
                header("location:blocked.php");
            }

        }
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
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
    <title>CodeGreen. | Sign In</title>
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

    <section class="banner">
        <!-- ============================================================== -->
        <!-- Insertion Image De Fond -->
        <img src="assets/back.png" class="back">
        <!-- ============================================================== -->
        <!-- Insertion Rectangle Form -->
        <div class="rect">
        </div>
        <label class="signIn">Sign In</label>
        <!-- ============================================================== -->
        <!-- Formulaire -->
        <form action="#" method="POST">
            <label class="insc">Email:</label>
            <br><br> <input class="mail" type="email" name="email" placeholder="contact@gmail.com" size="50" required><br><br>
            <label class="insc">Password:</label>
            <br><br><input class="password" type="password" name="password" size="50" required><br>
            <br><a href="password.php" class="forgot_password">Forgot Your Password</a><br><br>
            <div class="inputBx">
                <input class="signIn_button" type="submit" value="Sign In">
            </div>
            <a href="signUp.php" class="signup_link">Sign Up</a><br><br>
        </form>


    </section>
    <!-- ============================================================== -->
    <!-- Scroll Java script -->
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