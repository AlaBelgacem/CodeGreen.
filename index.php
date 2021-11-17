<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/products.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    
    <title>CodeGreen.</title>
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
                    <li class="parent">
                        <a href="#" class="nav-link">Shop</a>
                        <ul class="child">
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
                        <a href="cart.php" class="nav-link icons">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                        <div id="cart-item" class="cart-icon">
                            <span>
                                
                            </span>
                        </div>
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
        <div id="message"></div>
            <div class="row">
                <?php
                    include 'config.php';
                    $stmt = $conn->prepare("SELECT * FROM article");
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while($row = $result->fetch_assoc()):
                ?>
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="categorie text-center">
                        <a class="d-block mb-0 thumbnail" href="#">
                            <img class="img-fluid" src="<?= $row['ImageArticle']  ?>" alt="Image">
                        </a>
                        <div class="categorie-body">
                            <h3 class="heading mb-0">
                                <a href="#"><?= $row['NomArticle'] ?> </a>
                            </h3>
                            <h3 style="font-weight:300; font-size:18px "><?= number_format($row['PrixArticle'],2) ?></h3>
                        </div>
                        <form action="" class="form-submit">
                            <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                            <input type="hidden" class="pname" value="<?= $row['NomArticle'] ?>">
                            <input type="hidden" class="pimage" value="<?= $row['ImageArticle'] ?>">
                            <input type="hidden" class="pprice" value="<?= $row['PrixArticle'] ?>">
                            <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                        <button class="btn button btn-info btn-block addItemBtn" style="background-color: #fff; border:none; color :black; padding: 10px 32px;
                        text-align:center; text-decoration:none; display:inline-block; font-size:15px; cursor:pointer;">
                        <i id="plus" class="fas fa-plus"></i>add to cart
                        </button>
                        </form>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="javascript/scroll.js"></script>
<script src="javascript/cart.js"></script>
</body>
</html>