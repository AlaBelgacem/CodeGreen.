<?php 
    //storing data in database

    session_start();
    require 'config.php';


    if(isset($_POST['pid'])){
        $pid = $_POST['pid'];
        $pname = $_POST['pname'];
        $pimage = $_POST['pimage'];
        $pprice = $_POST['pprice'];
        $pcode = $_POST['pcode'];
        $pquantite = $_POST['pquantite'];
        
        
        $pqty = 1;
        
        $stmt = $conn->prepare("SELECT product_code FROM panier WHERE product_code=?");
        $stmt->bind_param("s",$pcode);
        $stmt->execute();
        $res = $stmt->get_result();
        $r = $res->fetch_assoc();
        $code = $r['product_code'];

        if(!$code){
            $query = $conn->prepare("INSERT INTO panier (id,product_name,product_price,product_image, qty,product_qty,totalprice,product_code) 
            VALUES (?,?,?,?,?,?,?,?)");
            $query->bind_param("isssiiss",$pid,$pname,$pprice,$pimage,$pqty,$pquantite,$pprice,$pcode);
            $query->execute();
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Item added to your cart!</strong>
          </div>';
        }
        else{
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Item is already added in your cart!</strong>
          </div>';
        }

    }


    if(isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item' ){
        $stmt = $conn->prepare("SELECT * FROM panier");
        $stmt->execute();
        $stmt->store_result();
        $rows = $stmt->num_rows;
        
        echo $rows;

    }


    if(isset($_GET['remove'])){
        $id = $_GET['remove'];

        $stmt = $conn->prepare("DELETE FROM panier WHERE id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();

        $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'Item removed from cart';
        header('location:cart.php');
    }


    if(isset($_POST['qty'])){
        $qty = $_POST['qty'];
        $pid = $_POST['pid'];
        $pprice = $_POST['pprice'];

        $tprice = $qty*$pprice;

        $stmt = $conn->prepare("UPDATE panier SET qty=?, totalprice=? WHERE id=?");
        $stmt->bind_param("isi",$qty,$tprice,$pid);
        $stmt->execute();
    }





    if(isset($_POST['action'])&& isset($_POST['action'])=='order'){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $products = $_POST['products'];
        $grand_total = $_POST['grand_total'];
        $address = $_POST['address'];
        $pmode = $_POST['pmode'];
        $IdArticle = $_POST['IdArticle'];
        $qty = $_POST['pqty'];
        $QuantiteArticle = $_POST['QuantiteArticle'];
        $status = 1;
       /* var_dump($products);
        preg_match_all('!\d+!', $products, $matches);
        $test = $matches[0];
        print_r($test); */

         
        $newqty = $QuantiteArticle-$qty;
        $query = $conn->prepare("UPDATE article SET QuantiteArticle=? WHERE IdArticle=?");
        $query->bind_param("ii",$newqty,$IdArticle);
        $query->execute();


        $data = '';

        $stmt = $conn->prepare("INSERT INTO orders (first_name,last_name,email,phone,address,pmode,products,amount_paid,status) 
        VALUES(?,?,?,?,?,?,?,?,?)");
        $stmt ->bind_param("ssssssssi",$fname,$lname,$email,$number,$address,$pmode,$products,$grand_total,$status);
        $stmt->execute();
        
        require '../php_mailer/mail.php';
        $data .= '<div class=thankyoucontent>
        <div class="wrapper-1">
           <div class="wrapper-2">
              <img src="https://i.ibb.co/Lkn7rkG/thank-you-envelope.png" alt="thank-you-envelope" border="0">
            <h1>Thank you!</h1>
             <p>for shopping with us, we will reply promptly</p> 
             <p>once your order is received. </p>
             <button class="go-home"><a href="index.php">
               home page</a>
             </button>
           </div>
       </div>';
       /* $data .='<div class="container">
        <h1>THANK YOU FOR YOUR PURCHASE</h1>
        <h2>Order placed successfully!</h2>
        <h4>Items Purchased : '.$products.'</h4>
        <h4>Name : '.$fname.' '.$lname.'</h4>
        <h4>Your E-mail : '.$email.'</h4>
        <h4>Phone Number : '.$number.'</h4>
        <h4>Total Amount Paid : '.$grand_total.'$'.'</h4>
        <h4>Payment Mode : '.$pmode.'</h4>
        </div>';*/
        echo $data;

    }




?>