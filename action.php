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
        $pqty = 1;

        $stmt = $conn->prepare("SELECT product_code FROM panier WHERE product_code=?");
        $stmt->bind_param("s",$pcode);
        $stmt->execute();
        $res = $stmt->get_result();
        $r = $res->fetch_assoc();
        $code = $r['product_code'];

        if(!$code){
            $query = $conn->prepare("INSERT INTO panier (product_name,product_price,product_image, qty,totalprice,product_code) 
            VALUES (?,?,?,?,?,?)");
            $query->bind_param("sssiss",$pname,$pprice,$pimage,$pqty,$pprice,$pcode);
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

?>