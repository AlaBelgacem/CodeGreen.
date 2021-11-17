<?php
    session_start();    
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

    <title>CodeGreen. | Cart</title>
    <style>
        /****************** qty *****************/
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

/**************************************************/
    </style>
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
 <!-- Shopping Cart -->
 <div class="shopping-cart section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Shopping Summery -->
                <table class="table shopping-summery">
                    <thead>
                        <tr class="main-hading">
                            <th>PRODUCT</th>
                            <th>NAME</th>
                            <th class="text-center">UNIT PRICE</th>
                            <th class="text-center">QUANTITY</th>
                            <th class="text-center">TOTAL</th> 
                            <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        
                        require 'config.php';
                        $stmt = $conn->prepare("SELECT * FROM panier");
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $subtotal = 0;
                        $shipping = 10;
                        $grand_total = 0;
                        while($row = $result->fetch_assoc()):
                        ?>
                        <tr>
                            <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                            <td class="image" data-title="No"><img src="<?= $row['product_image'] ?>" alt="#" width="100px" height="100px"></td>
                            <td class="product-des" data-title="Description">
                                <p class="product-name"><a href="#"><?= $row['product_name'] ?></a></p>
                                <p class="product-des">Maboriosam in a tonto nesciung eget  distingy magndapibus.</p>
                            </td>
                            <td class="price" data-title="Price"><span><?= number_format($row['product_price'],2) ?> </span></td>
                            <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                            <td class="qty" data-title="Qty"><!-- Input Order -->
                                <div class="input-group">
                                    <input type="number" name="quant[1]" min="1" class="input-number itemQty"  data-min="1" data-max="100" 
                                    value="<?= $row['qty'] ?>">
                                </div>
                                <!--/ End Input Order -->
                            </td>
                            <td class="total-amount" data-title="Total"><span><?= number_format($row['totalprice'],2) ?></span></td>
                            <td class="action" data-title="Remove"><a href="action.php?remove=<?= $row['id'] ?>" 
                            onclick="return confirm('are you sure?');"><i class="ti-trash remove-icon"></i></a></td>
                        </tr>
                        <?php 
                            $subtotal += $row['totalprice'];
                        ?>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <!--/ End Shopping Summery -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Total Amount -->
                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-5 col-12">
                            <div class="left">
                                <div class="coupon">
                                    <form action="#" target="_blank">
                                        <input name="Coupon" placeholder="Enter Your Coupon">
                                        <button class="btn">Apply</button>
                                    </form>
                                </div>
                                <div class="checkbox">
                                    <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-7 col-12">
                            <div class="right">
                                <?php $grand_total = $subtotal+ $shipping ?>
                                <ul>
                                    <li>Cart Subtotal<span>$<?= number_format($subtotal,2) ?></span></li>
                                    <li>Shipping<span>$<?= number_format($shipping,2) ?></span></li>
                                    <li>You Save<span>$0.00</span></li>
                                    <li class="last">You Pay<span>$<?= number_format($grand_total,2) ?></span></li>
                                </ul>
                                <div class="button5">
                                    <a href="#" class="btn">Checkout</a>
                                    <a href="index.php" class="btn">Continue shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Total Amount -->
            </div>
        </div>
    </div>
</div>
<!--/ End Shopping Cart -->
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

        $(".itemQty").on('change',function(){
            var $el = $(this).closest('tr');

            var pid = $el.find('.pid').val();
            var pprice = $el.find('.pprice').val();
            var qty = $el.find('.itemQty').val();
            location.reload(true); 
            $.ajax({
                url:'action.php',
                method : 'post',
                cache : false,
                data : {qty:qty,pid:pid,pprice:pprice},
                success: function(response){
                    console.log(response);
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