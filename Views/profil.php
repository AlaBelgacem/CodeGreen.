<?php
session_start();
include '../Controller/membreC.php';
$membreC = new membreC();
$membre = $membreC->recupererM($_SESSION["id"]);
$membre2 = null;

if (
    isset($_POST["mail"]) &&
    isset($_POST["region"]) &&
    isset($_POST["p"])
) {
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
    <title>CodeGreen. | Profile</title>
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
                    <li class="btn_log">
                        <a href="../logout.php">Log out</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="banner">
        <!-- ============================================================== -->
        <!-- Insertion Image De Fond -->
        <img src="assets/back2.png" class="back2">
        <!-- ============================================================== -->
        <!-- Titre Avec Nom Prenom -->
        <label class="signIn">My Profile: <?php echo $_SESSION["nom"]; ?> <?php echo $_SESSION["prenom"]; ?></label>
        <!-- ============================================================== -->
        <!-- Insertion Rectangle Form -->
        <div class="rect3">
        </div>
        <!-- ============================================================== -->
        <!-- Formulaire -->
        <form action="ModifierM.php" method="GET">
            <!-- Moitie Droite -->
            <div class="partie1">
                <label class="insc">Email</label>
                <br><br> <input class="mail" type="email" name="email" value=<?php echo $membre['Email']; ?> size="50" required><br><br>
                <label class="insc">Region</label>
                <br><input type="text" name="region" size="40" required value=<?php echo $membre['Region']; ?>><br><br>
                <label class="insc">Phone Number</label>
                <br><input type="text" name="p" value=<?php echo $membre['phone']; ?> size="50" required><br><br>
                <input class="boutonm" type="submit" value="Make Modifications" required><br><br>
                <div class="supprimer">
                    <?php $m = $membre['id'];
                    echo "
                <button class='btn_delete'><a href='SupprimerM.php?id=$m' >Delete Account</a></button>
                "; ?></div>
                <input type="hidden" value=<?php echo $membre['id']; ?> name='id'>

            </div>



            <br><br><br><br>
            <!-- Moitie Gauche -->
            <div class="partie2">
                <label class="insc"> Collected Points</label>
                <br><br> <input type="text" placeholder="20.000" size="50"><br><br>
                <label class="insc">Recycled Plastic</label>
                <br><input class="password" type="text" placeholder="2.000Kg" name="pass" size="50"><br><br>
                <label class="insc">Appointement</label>
                <br><input class="password" type="text" placeholder="05/06/22 6PM-7PM" name="pass" size="50"><br><br><br>
                <input type="button" class="AddPlastic_button" value="Add Plastic"><br><br>
            </div>

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