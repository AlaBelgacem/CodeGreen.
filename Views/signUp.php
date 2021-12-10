<?php
include_once '../Model/membre.php';
include_once '../Controller/membreC.php';

$error = "";

// create adherent
$membre = null;

// create an instance of the controller
$membreC = new membreC();
if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["phone"]) &&
    isset($_POST["password"]) &&
    isset($_POST["region"]) &&
    isset($_POST["city"]) &&
    isset($_POST["phone"]) &&
    isset($_POST["code"])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["password"]) &&
        !empty($_POST["phone"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["region"]) &&
        !empty($_POST["city"]) &&
        !empty($_POST["phone"]) &&
        !empty($_POST["code"])
    ) {
        $pass = $_POST['password'];
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $membre = new membre(
            NULL,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['phone'],
            $_POST['email'],
            $hash,
            $_POST['region'],
            $_POST['city'],
            $_POST['code'],
            NULL
        );
        $membreC->ajouterM($membre);
        header('Location:signin.php');
    } else
        $error = "Missing information";
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
    <script src="javascript/signup.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <title>CodeGreen. | Sign Up</title>
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
        <div class="rect2">
        </div>
        <label class="signIn">Sign Up</label>
        <!-- ============================================================== -->
        <!-- Formulaire -->
        <form action="" method="POST">
            <label class="insc">First Name:</label>
            <br><input type="text" name="nom" id="nom" size="50" required>
            <div id="error_nom" class="error"></div><br><br><br>
            <label class="insc">Last Name:</label>
            <br><input type="text" name="prenom" id="prenom" size="50" required>
            <div id="error_prenom" class="error"></div><br><br><br>
            <label class="insc">Email:</label>
            <br><input type="email" name="email" id="email" size="50" placeholder="contact@gmail.com" required><br><br><br>
            <label class="insc">Phone:</label>
            <br><input type="number" name="phone" id="phone" size="50" required>
            <div id="error_phone" class="error"></div><br><br><br>
            <label class="insc">Password:</label>
            <br><input type="password" name="password" id="pass" size="50" required>
            <div id="error_mdp" class="error"></div><br><br><br>
            <label class="insc">Password Confirmation:</label>
            <br><input type="password" name="password2" id="pass2" size="50" required>
            <div id="error_mdpc" class="error"></div><br><br><br>
            <label class="insc">Region:</label><br>
            <select name="region" id="region">
                <option value=non></option>
                <option value=Tunis>Tunis</option>
                <option value=Ariana>Ariana</option>
                <option value=Ben_Arous>Ben Arous</option>
                <option value=Gabés>Gabés</option>
                <option value=Gafsa>Gafsa</option>
                <option value=Jendouba>Jendouba</option>
                <option value=kairaouan>kairaouan</option>
                <option value=Gasserine>Gasserine</option>

            </select>
            <div id="error_region" class="error"></div><br><br><br>

            <label class="insc">City:</label>
            <br><input type="text" name="city" id="city" size="50" required><br><br><br>
            <label class="insc">Zip Code:</label>
            <br><input type="number" name="code" id="code_postal" size="50" required>
            <div id="error_code" class="error"></div><br><br><br>
            <input class="signUp_button" type="submit" id="boutonn" onclick="return verif();" value="Sign Up" required><br><br><br>

            <a href="signIn.php" class="signIn_link">Already a member ?</a><br><br>

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