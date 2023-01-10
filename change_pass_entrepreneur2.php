<?php
include "connection.php";
session_start();
$token = $_GET['token'];
$un = $_SESSION['username'];

//echo "<h1>welcome...".$un."</h1>";

if(!$un || empty($token))
{
  header("location:goto_login.php");  
}
error_reporting(0);

$sql = "SELECT * FROM $t1 WHERE username='$un' AND token='$token'";
$q = mysqli_query($con,$sql);
$res = mysqli_fetch_assoc($q);

$row = mysqli_num_rows($q);

if($row == 0)
{
    header("location:goto_login.php"); 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Password | <?php echo $un; ?></title>
    <link rel="shortcut icon" href="images/logo.png">
    <!-- css files -->
    <link rel="stylesheet" href="common.css">
    
    <link rel="stylesheet" href="home_entrepreneur.css">
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fsonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
   <style>
    #change_pass_container {
    color: black;
   
    width: 80%;
    margin: 0 auto;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    
}
            
    #change_pass_title {
    font-size: 40px;
    font-family: cursive;
    text-align: center;
    animation: an_title 1s infinite;
    width: 80%;
    margin: 5px auto;
 color: aliceblue;
}

@keyframes an_title {
    0% {
        text-shadow: 1px 1px 1px blue;
    }

    50% {
        text-shadow: 2px 2px 2px orange;
    }

    100% {
        text-shadow: 3px 3px 3px green;
    }

}
        #form_container {
    width: 60%;
    margin: 30px auto 0 auto;
    color: aliceblue;
    font-family: 'Playfair Display', serif;  
}
        #lab_con {
   
    font-size: 30px;

    padding-right: 20px;
    font-family: monospace;
  text-align: right;
            
      
}
.field {
    height: 30px;
    padding: 5px;
    
    border-radius: 5px;
    margin: 5px 0;
    width: 300px;
    text-align: left;
    
float: left;
}

    </style>
</head>

<body>
   
   
       <div id="header_container">
        <table id="table_header">
            <tr>
                <td id="logo_container_td"><img src="images/logo.png" alt="Logo" id="logo" align="center"></td>
                <td id="title_container_td"><span id="web_title">ValueMart</span>
                    <br><span id='sub_title'>A Premium Business Partner...</span></td>
                <td id="social_container_td"><i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-snapchat-ghost"></i></td>
            </tr>
        </table>
    </div>
    <div id="navbar">
        <center>
            <div id="navbar_container">

                <ul>
                    <li><a href="home_entrepreneur.php">Home</a></li>
                    <li><a href="search_entrepreneur.php">Search</a></li>
                    <li><a href="add_new_product.php" >Add New Product</a></li>
                    <li><a href="pending_orders.php">Pending Orders</a></li>
                    <li><a href="profile_entrepreneur.php">My Profile</a></li>
                    <li><a href="logout.php">Log Out</a></li>
               
                </ul>


            </div>
        </center>
    </div>


<div id="change_pass_container">
   <center><p id="change_pass_title">Change Password</p></center>
    <form name="f1" method="post">


            <table id="form_container" width='100%'>

                <tr>

                    <td id="lab_con"><label>Enter Current Password : </label></td>
                    <td id="field_con"><input type="password" class="field" name="pw" id="pw" required></td>

                </tr>
                 <tr>

                    <td id="lab_con"><label>Enter New Password : </label></td>
                    <td id="field_con"><input type="password" class="field" name="new_pw1" id="new_pw1" required></td>

                </tr>
                 <tr>

                    <td id="lab_con"><label>Confirm New Password : </label></td>
                    <td id="field_con"><input type="password" class="field" name="new_pw2" id="new_pw2" required></td>

                </tr>
                 <tr>
                    <td id="btn_con" colspan="2">
                        <br>
                        <center><button class="common_btn" name="change_pass_btn" type="submit"><span class='btn_title'>Change Password</span></button></center>
                    </td>
                </tr>
                
                
        </table>
       </form>
    
      
   </div>

    




</body>

</html>


<?php

if(isset($_POST['change_pass_btn']))
{

    $pw = $_POST['pw'];
    $pw1 = $_POST['new_pw1'];
    $pw2 = $_POST['new_pw2'];
    
    
    if(empty($pw) || empty($pw1) || empty($pw1))
    {
     echo "<script>alert('Please Enter All The Fields...!!!');</script>";   
    }
    else {
        $sql = "SELECT * FROM $t1 WHERE username='$un' AND password='$pw'";
        $q = mysqli_query($con,$sql);
        $row = mysqli_num_rows($q);
        
        if($row == 1)
        {
        
            if($pw1 == $pw2)
            {
                $sql = "UPDATE $t1 SET password='$pw1' WHERE username='$un' AND token='$token'";
                $q = mysqli_query($con,$sql);
                $sql = "UPDATE $t1 SET token=0 WHERE username='$un'";
                $q = mysqli_query($con,$sql);
                if($q)
                {
                echo "<script>alert('Account Password Successfully Changed...!!!');</script>";
                 echo "<script>window.location.href='profile_entrepreneur.php';</script>";
                }
                else {
                    echo "<script>alert('Error In Changing Account Password...!!!');</script>";
                }
            }
            else {
             echo "<script>alert('Both New Passwords Must Be Same...!!!');</script>";   
            }
        }
        else {
            echo "<script>alert('You Have Entered Wrong Password Of Current Account...!!!');</script>";
            echo "<script>window.location.href='profile_entrepreneur.php';</script>";
        }
        
    }
    
    
   
}


?>