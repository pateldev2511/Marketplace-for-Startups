<?php
include "connection.php";
$email = $_GET['email'];
$username = $_GET['username'];
$token = $_GET['token'];
if(empty($email) || empty($username) || empty($token))
{
    header("location:goto_login.php");
}
else {
    $sql = "SELECT * FROM $t2 WHERE email='$email' AND username='$username' AND token='$token'";
    $q = mysqli_query($con,$sql);
    
    $row = mysqli_num_rows($q);
    
    if($row == 1)
    {
        $verify = "YES";
        $t = 0;
        $sql = "UPDATE $t2 SET isverified='$verify',token='$t' WHERE username='$username'";
        $q = mysqli_query($con,$sql);
        echo '<script>alert("Your Email Is Verifed...!!!\nNow You Can Log In !");</script>';
        echo "<script>window.location.href = 'buyer_login.php';</script>";
    }
    else {
        echo "<script>alert('Invalid Username , Email Or Token ...!!!');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
    }
}

?>