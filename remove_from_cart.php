<?php
include "connection.php";
session_start();
$un = $_SESSION['b_username'];
$p_id = $_GET['p_id'];

if(empty($un) || empty($p_id))
{
    header("location:goto_login.php");
}
error_reporting(0);

$sql = "SELECT * FROM $t2 WHERE username='$un'";
$q = mysqli_query($con,$sql);
$res= mysqli_fetch_assoc($q);

$b_id = $res['b_id'];

$sql = "SELECT * FROM `cart` WHERE p_id='$p_id' AND b_id='$b_id'";
$q = mysqli_query($con,$sql);
$row = mysqli_num_rows($q);
if($row == 1)
{
    $sql = "DELETE FROM `cart` WHERE p_id='$p_id' AND b_id='$b_id'";
$q = mysqli_query($con,$sql);
    
    if($q)
    {
    echo "<script>alert('Product Is Removed From Cart Successfully !');window.location.href='mycart_buyer.php?p_id=$p_id';</script>";
    }
    else {
        echo "<script>alert('Error In Removing Product From The Cart !');window.location.href='mycart_buyer.php?p_id=$p_id';</script>";
    }
}

else {
   header("location:mycart_buyer.php");
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Remove From Carts </title>
</head>
<body>
    
</body>
</html>