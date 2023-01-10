<?php 
session_start();
include ("connection.php");
$username = $_SESSION['username'];
session_unset();
header('location:index.php');  

 

?>