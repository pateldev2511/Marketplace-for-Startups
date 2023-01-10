<?php
include "connection.php";
session_start();

$p_id = $_GET['p_id'];
$un = $_SESSION['username'];

//echo "<h1>welcome...".$un."</h1>";

$sql = "SELECT * FROM $t3 WHERE p_id='$p_id'";
$q = mysqli_query($con,$sql);
$res = mysqli_fetch_assoc($q);

$row = mysqli_num_rows($q);

if(!$un || empty($p_id) || $row == 0)
{
    if(!$un)
    {
     header("location:goto_login.php");  
    }
    else {
        header("location:profile_entrepreneur.php");
    }
}
error_reporting(0);


$path = $res['main_path']; 
unlink($res['p_img']);
unlink($res['p_img1']);
unlink($res['p_img2']);
unlink($res['p_img3']);

$rem = rmdir($path);

$sql = "DELETE FROM $t3 WHERE p_id='$p_id'";
$q = mysqli_query($con,$sql);

if($q)
{
    echo "<script>alert('Product Successfully Deleted...!!!');</script>";
    echo "<script>window.location.href='profile_entrepreneur.php';</script>";
}
else {
    echo "<script>alert('Error In Deleting The Product...!!!');</script>";
     echo "<script>window.location.href='profile_entrepreneur.php';</script>";
}
?>