<?php
    session_start();   
	require 'config.php';

	if($_SESSION["role"]=="visiteur"){
		header('location:login.php?check=1');
	}
	else{
		header('location:checkout.php');
	} 

	
	$grand_total = 10;
	$sub_total = 0;
	$allItems = '';
	$items = array();
	$qty = array();
	$items2 = array();
	$allitems2 = '';

	$sql = "SELECT CONCAT(product_name,'(',qty,')') AS ItemQty, totalprice, qty,id FROM panier ";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while($row = $result->fetch_assoc()){
		$sub_total+=$row['totalprice'];
		$items[] = $row['ItemQty'];
		$qty[]=$row['qty'];
	}
	$allItems = implode(", ",$items);
	$grand_total += $sub_total;
	/*echo $allItems;
	echo $sub_total;
	echo $grand_total;
	echo '<br>';
	print_r($qty);*/
	//echo session_id();

	//$query = "SELECT panier.id, CONCAT(article.NomArticle,panier.qty) AS nom FROM panier INNER JOIN article ON panier.id = article.IdArticle ";
	//$stmt2 = $conn->prepare($query);
	//$stmt2->execute();
	//$result2 = $stmt2->get_result();
	//while($row2 = $result2->fetch_assoc()){
	//	$items2[]= $row2['nom'];
	//}
	//$allitems2 = implode(", ",$items2);
	//echo $allitems2;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="css/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="css/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="css/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/cart.css">
	<link rel="stylesheet" href="thankyou.css">

    <title>CodeGreen. | Checkout</title>

</head >
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
	<!-- Breadcrumbs
        <div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">Cart</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
    -->
	
	<!-- End Breadcrumbs -->
		<!-- Start Checkout -->
		<section class="shop checkout section" id="order">
			<div class="container">
				<div class="row"> 
					<div class="col-lg-8 col-12 " >
						<div class="checkout-form">
							<h2>Make Your Checkout Here</h2>
							<p>Please register in order to checkout more quickly</p>
							<!-- Form -->
							<form class="form" method="post" id="placeOrder" action="#">
								<input type="hidden" name="products" value="<?= $allItems;?>">
								<input type="hidden" name="grand_total" value="<?= $grand_total;?>">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>First Name<span>*</span></label>
											<input type="text" name="fname" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Last Name<span>*</span></label>
											<input type="text" name="lname" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Email Address<span>*</span></label>
											<input type="email" name="email" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Phone Number<span>*</span></label>
											<input type="number" name="number" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Country<span>*</span></label>
											<select name="country_name" id="country">
												<option value="JP">Japan</option>
												<option value="JE">Jersey</option>
												<option value="VC">Saint Vincent and the Grenadines</option>
												<option value="WS">Samoa</option>
												<option value="SM">San Marino</option>
												<option value="ST">São Tomé and Príncipe</option>
												<option value="SA">Saudi Arabia</option>
												<option value="SN">Senegal</option>
												<option value="RS">Serbia</option>
												<option value="SC">Seychelles</option>
												<option value="SL">Sierra Leone</option>
												<option value="SG">Singapore</option>
												<option value="SK">Slovakia</option>
												<option value="SI">Slovenia</option>
												<option value="SB">Solomon Islands</option>
												<option value="SO">Somalia</option>
												<option value="ZA">South Africa</option>
												<option value="GS">South Georgia</option>
												<option value="KR">South Korea</option>
												<option value="ES">Spain</option>
												<option value="LK">Sri Lanka</option>
												<option value="SD">Sudan</option>
												<option value="SR">Suriname</option>
												<option value="SJ">Svalbard and Jan Mayen</option>
												<option value="SZ">Swaziland</option>
												<option value="SE">Sweden</option>
												<option value="CH">Switzerland</option>
												<option value="SY">Syria</option>
												<option value="TW">Taiwan</option>
												<option value="TJ">Tajikistan</option>
												<option value="TZ">Tanzania</option>
												<option value="TH">Thailand</option>
												<option value="TL">Timor-Leste</option>
												<option value="TG">Togo</option>
												<option value="TK">Tokelau</option>
												<option value="TO">Tonga</option>
												<option value="TT">Trinidad and Tobago</option>
												<option value="TN" selected="selected">Tunisia</option>
												<option value="TR">Turkey</option>
												<option value="TM">Turkmenistan</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>State <span>*</span></label>
											<select name="state-province" id="state-province">
												<option value="divition" selected="selected">Tunis</option>
												<option>Bizerte</option>
												<option>Gafsa</option>
												<option>Kef</option>
												<option>Gabes</option>
												<option>Nabeul</option>
												<option>Kelibia</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Address Line <span>*</span></label>
											<input type="text" name="address" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Postal Code<span>*</span></label>
											<input type="text" name="post" placeholder="" required="required">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group create-account">
											<input id="cbox" type="checkbox">
											<label>Create an account?</label>
										</div>
									</div>
								</div>

						</div>
					</div>
					<div class="col-lg-4 col-12">
						<div class="order-details">
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>CART  TOTALS</h2>
								<div class="content">
									<ul>
										<?php
										$stmt2 = $conn->prepare("SELECT article.NomArticle, article.QuantiteArticle,article.IdArticle,
										qty FROM panier INNER JOIN article ON panier.id = article.IdArticle");
										$stmt2->execute();
										$result2 = $stmt2->get_result();
										while($row2 = $result2->fetch_assoc()):
										?>
										<input type="hidden" class="IdArticle" name="IdArticle" value="<?= $row2['IdArticle'] ?>">
										<input type="hidden" class="pqty" name="pqty" value="<?= $row2['qty'] ?>">
                           				<input type="hidden" class="QuantiteArticle" name="QuantiteArticle" value="<?= $row2['QuantiteArticle'] ?>">	
										<li><?= $row2['NomArticle'] ?>  <span><?=$row2['qty'] ?></span></li>
										<?php endwhile;?>
										<li>Sub Total<span>$<?= number_format($sub_total,2) ?></span></li>
										<li>(+) Shipping<span>$10.00</span></li>
										<li class="last">Total<span>$<?= number_format($grand_total,2) ?></span></li>
									</ul>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>Payments</h2>
								<div class="content">
									<div class="checkbox">
										<label class="checkbox-inline" for="1"><input name="pmode" id="1" type="checkbox" value="cards"> Credit Card</label>
										<label class="checkbox-inline" for="2"><input name="pmode" id="2" type="checkbox" value="cod"> Cash On Delivery</label>
										<label class="checkbox-inline" for="3"><input name="pmode" id="3" type="checkbox" value="points"> Points</label>
									</div>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Payment Method Widget -->
							<div class="single-widget payement">
								<div class="content">
									<img src="assets/payment-method.png" alt="#">
								</div>
							</div>
							<!--/ End Payment Method Widget -->
							<!-- Button Widget -->
							<div class="single-widget get-button">
								<div class="content">
									<div class="button">
										<input type="submit" name="submit" value="Place Order" class="btn">
									</div>
								</div>
							</div>
							<!--/ End Button Widget -->
							</form>
							<!--/ End Form -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Checkout -->
		
		<!-- Start Shop Services Area  -->
		<section class="shop-services section home">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="ti-rocket"></i>
							<h4>Free shiping</h4>
							<p>Orders over $100</p>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="ti-reload"></i>
							<h4>Free Return</h4>
							<p>Within 30 days returns</p>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="ti-lock"></i>
							<h4>Sucure Payment</h4>
							<p>100% secure payment</p>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="ti-tag"></i>
							<h4>Best Price</h4>
							<p>Guaranteed price</p>
						</div>
						<!-- End Single Service -->
					</div>
				</div>
			</div>
		</section>
		<!-- End Shop Services -->
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Jquery -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.0.js"></script>
<script src="js/jquery-ui.min.js"></script>
<!-- Popper JS -->
<script src="js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="js/bootstrap.min.js"></script>
<!-- Color JS -->
<script src="js/colors.js"></script>
<!-- Slicknav JS -->
<script src="js/slicknav.min.js"></script>
<!-- Owl Carousel JS -->
<script src="js/owl-carousel.js"></script>
<!-- Magnific Popup JS -->
<script src="js/magnific-popup.js"></script>
<!-- Fancybox JS -->
<script src="js/facnybox.min.js"></script>
<!-- Waypoints JS -->
<script src="js/waypoints.min.js"></script>
<!-- Countdown JS -->
<script src="js/finalcountdown.min.js"></script>
<!-- Nice Select JS -->
<script src="js/nicesellect.js"></script>
<!-- Ytplayer JS -->
<script src="js/ytplayer.min.js"></script>
<!-- Flex Slider JS -->
<script src="js/flex-slider.js"></script>
<!-- ScrollUp JS -->
<script src="js/scrollup.js"></script>
<!-- Onepage Nav JS -->
<script src="js/onepage-nav.min.js"></script>
<!-- Easing JS -->
<script src="js/easing.js"></script>
<!-- Active JS 
<script src="javascript/cart.js"></script> -->
<script src="js/active.js"></script>
<script src="javascript/scroll.js"></script>

<script>
    $(document).ready(function(){

		$("#placeOrder").submit(function(e){
			e.preventDefault();
			$.ajax({
				url : 'action.php',
				method : 'post',
				data : $('form').serialize()+"&action=order",
				success: function(response){
					$("#order").html(response);
				}
			});
		});

    load_cart_item_number();

    function load_cart_item_number(){
        $.ajax({
            url: 'action.php',
            method : 'get',
            data : {cartItem:"cart-item"},
            success : function(response){
                $('#cart-item').css("background-color","#32af32");
                $('#cart-item').css("color","#fff");
                $('#cart-item').css("font-size","11px");
                $('#cart-item').css("font-weight","bold");
                $('#cart-item').css("position","relative");
                $('#cart-item').css("z-index","100");
                $('#cart-item').css("width","20px");
                $('#cart-item').css("height","16px");
                $('#cart-item').css("line-height","16px");
                $('#cart-item').css("text-align","center");
                $('#cart-item').css("border-radius","9px");
                $('#cart-item').css("box-shadow","0px 1px 2px 1px rgba(0,0,0,0.2)");
                $('#cart-item').css("bottom","33px");
                $('#cart-item').css("right","-30px");
                $("#cart-item").html(response);
            }
        });
    }

});
</script>
</body>
</html>