<?php 

require '../config.php';


$id = $_GET['id'];
$status = $_GET['status'];
$email = $_GET['email'];
$stmt = $conn->prepare("UPDATE orders SET status=? WHERE id=?");
$stmt->bind_param("ii",$status,$id);
$stmt->execute();


if($status==2){
    require '../../php_mailer/status_mail.php';
}
else if($status==3){
    require '../../php_mailer/cancelled_mail.php';
}


header('location:panier.php');


?>