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

    <section class="banner">
        <!-- ============================================================== -->
        <!-- Insertion Image De Fond -->
        <img src="assets/back.png" class="back">
        <!-- ============================================================== -->
        <!-- Insertion Rectangle Form -->
        <div class="rect8">
            <label class="text_block">Your Account Has Been Blocked  <br>To learn more and find support please visit our <a href="help.php"class="text_block2">Help Center</a></label>
        </div>

    </section>


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