<?php
include "connection.php";
session_start();


if(isset($_POST['login_btn']))
{
    $username = $_POST['login_username'];
    $password = $_POST['login_password'];
    
    if(empty($username) || empty($password))
    {
     echo "<script>alert('Please Enter Your Login Credentials...!!!');</script>";   
    }
    else {
        $status = "YES";
        $sql = "select * from $t1 where username='$username' AND password='$password'";
        $q = mysqli_query($con,$sql);
        $row = mysqli_num_rows($q);
        if($row == 1){
            $sql = "select * from $t1 where username='$username' AND password='$password' AND isverified='$status'";
                    $q = mysqli_query($con,$sql);
                    $row = mysqli_num_rows($q);
            if($row == 1)
            {
                $_SESSION['username'] = $username;
           
            header("location:home_entrepreneur.php");     
            }
            else {
                echo "<script>alert('Please Verify Your Email To Log In !');</script>";
            }
            
           
        }
        else {
            echo "<script>alert('Please Enter Correct LogIn Credentials...!!!');</script>"; 
        }
    }
}

?>