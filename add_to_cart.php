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
    echo "<script>alert('This Product Is Already Added To The Cart !');window.location.href='view_product_buyer.php?p_id=$p_id';</script>";
}

else {
$sql = "INSERT INTO `cart`(p_id,b_id) VALUES('$p_id','$b_id')";
$q = mysqli_query($con,$sql);
    if($q)
{
    echo "<script>alert('Product Is Added To Cart Successfully...!!!');window.location.href='view_product_buyer.php?p_id=$p_id';</script>";
}
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add To Cart | </title>
</head>
<body>
    
</body>
</html>