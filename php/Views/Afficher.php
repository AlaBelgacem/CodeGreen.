<?php
session_start();
include '../Controller/membreC.php';
$membreC = new membreC();
$list =$membreC->afficherM();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>List des Membres</title>
</head>
<body>
<button ><a href="../logout.php">Log out</a></button>
    <h1>Liste des Membres</h1>
    <table  align="center">
        <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Password</th>
            <th>Region</th>
            <th>City</th>
            <th>Zip Code</th>
            <th>Role</th>
        </tr>
        <?php 
        foreach($list as $member){
        ?>
        <tr>
            <td><?php echo $member['id']; ?></td>
            <td><?php echo $member['First_Name']; ?></td>
            <td><?php echo $member['Last_Name']; ?></td>
            <td><?php echo $member['Email']; ?></td>
            <td><?php echo $member['phone']; ?></td>
            <td><?php echo $member['Pass']; ?></td>
            <td><?php echo $member['Region']; ?></td>
            <td><?php echo $member['City']; ?></td>
            <td><?php echo $member['Zip_Code']; ?></td>
            <td><?php echo $member['role']; ?></td>
            
            <?php $m=$member['id'];$t=1; if($_SESSION["role"]=="admin"){echo"<td>
                <button><a href='ModifierA.php?id=$m&type=$t'>Admin</a></button>
                </td>";}?>
                <?php $m=$member['id'];$t=2; if($_SESSION["role"]=="admin"){echo"<td>
                <button><a href='ModifierA.php?id=$m&type=$t'>Collecteur</a></button>
                </td>";}?>
                <?php $m=$member['id'];$t=3; if($_SESSION["role"]=="admin"){echo"<td>
                <button><a href='ModifierA.php?id=$m&type=$t'>Client</a></button>
                </td>";}?>
                <?php $m=$member['id']; if($_SESSION["role"]=="admin"){echo"<td>
                                <button><a href='SupprimerM.php?id=$m'>Supprimer</a></button>
                </td>";}?>
        </tr>
        <?php }?>
    </table>

</body>
</html>