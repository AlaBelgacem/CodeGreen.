<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/products.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <title>CodeGreen. | Products </title>
    <style>
        img{
            width:auto;
            length : 450px
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <nav class="nav">
                <a href="#" class="logo">CodeGreen.</a>
                <ul class="nav-list">
                    <li>
                        <a href="index.html" class="nav-link">Home</a>
                    </li>
                    <li class="has-children active">
                        <a href="#" class="nav-link">Shop</a>
                        <ul class="dropdown arrow-top">
                            <li>
                                <a href="#">Healthy and Beauty</a>
                            </li>
                            <li>
                                <a href="#">Home and Life</a>
                            </li>
                            <li>
                                <a href="#">Fashion</a>
                            </li>
                        </ul>
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

                   <!--
                                            <li>
                        <a href="#" class="nav-link icons">
                            <i class="bi bi-person"></i>
                        </a>
                    </li>
                   -->
                    <li>
                        <a href="#" class="nav-link icons">
                            <i class="bi bi-basket"></i>
                        </a>
                    </li>
                </ul>
               <!-- <img src="assets/moon.png" id="icon">
                   <a href="#" id="nav-cta">Donate</a> --> 
            </nav>
        </div>
    </header>
    <section class="banner">
        <div class="caption">        
            <h1>Welcome to our shop</h1>
            <span>Let's make our lives less PLASTIC</span>
           <!--
            <div id="next" class="fas fa-chevron-right" onclick="next()"></div>
            <div id="prev" class="fas fa-chevron-left" onclick="prev()"></div>
           --> 
        </div>
    </section>
    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                    <h2 class="mb-5 line">
                       OUR PRODUCTS
                    </h2>
                </div>
            </div>
            <div class="row">
                <?php
                include_once "../../Model/articles.php";
                include_once "../../Controller/articleC.php";
                include_once "../../config.php";
                $Art=new articleC();
                        $Arts=$Art->afficherArticles();
                        foreach ($Arts as $aux) {
                ?>
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="categorie text-center">
                        <a class="d-block mb-0 thumbnail" >
                         <img class="img-fluid" src="assets/<?php echo $aux["ImageArticle"];?>" alt="Image" >
                          </a>
                        <div class="categorie-body">
                            <h3 class="heading mb-0">
                                <a ><?php echo $aux["NomArticle"]; ?></a>
                                <p ><?php echo $aux["IdCategorie"]; ?></p>

                            </h3>
                            <h4 class="idd"><span><?php echo '*** '. $aux["DescriptionArticle"] . ' ***'; ?></span></h4>
                             <h5 class="idd" color="red"><span><?php echo 'Quantity: '.$aux["QuantiteArticle"]; ?></span></h5>
                            <h2> <?php echo 'Price: ' . $aux["PrixArticle"].'DT'; ?> </h2>
                        </div>
                    </div>
                </div>
               
               
                
                <?php }?> 
                </div>
                </div>
     
    <script src="javascript/scroll.js"></script>       

</body>
</html>