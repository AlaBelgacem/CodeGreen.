<?php 
    session_start();
    if($_SESSION["role"]=="visiteur"){
        if($_GET['check']==1){
            
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="register.css">
    <title>login</title>
</head>
<body>
    <div class ="header">
        <h2>login</h2>
    </div>

    <form method="post" action ="">

        <div class = "input-groupe">
            <label>Email</label>
            <input type="text" name="email">
        </div>

        <div class = "input-groupe">
            <label>password</label>
            <input type="password" name="password">
        </div>

        <div class = "input-groupe">
            <button type="submit" name="login" class ="btn" >login</button>
        </div>

        <p>
            Not a member ? <a href ="registration.php">Sign Up</a>
        </p>
        
    </form>
</body>
</html>