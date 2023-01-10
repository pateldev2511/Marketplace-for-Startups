<?php
include "connection.php";
session_start();

$un = $_SESSION['b_username'];

//echo "<h1>welcome...".$un."</h1>";

if(!$un)
{
  header("location:goto_login.php");  
}
error_reporting(0);

$sql = "SELECT * FROM $t2 WHERE username='$un'";
$q = mysqli_query($con,$sql);
$res = mysqli_fetch_assoc($q);


if(isset($_POST['change_pass_btn']))
{

    $token = mt_rand(111111111,999999999);
    
    $sql = "update $t2 set token='$token' where username='$un'";
    $q = mysqli_query($con,$sql);
    
    $ans = $_POST['s_a'];
    
    $temp = $res['s_a'];
    
    
    if($ans == $temp)
    {
        header("location:change_pass_buyer2.php?token=$token");
    }
    else {
        echo "<script>alert('Sorry , Wrong Answer...!!!');</script>";
            echo "<script>window.location.href='profile_buyer.php';</script>";
    }
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
    width: 60%;
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
                          <li><a href="home_buyer.php">Home</a></li>
                    <li><a href="search_buyer.php">Search</a></li>
                    <li><a href="mycart_buyer.php">My Cart</a></li>
                    <li><a href="myorders_buyer.php" >My Orders</a></li>
                    <li><a href="notification_buyer.php">Notifications</a></li>
                     <li><a href="services_buyer.php">Services</a></li>
                    <li><a href="profile_buyer.php">My Profile</a></li>
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

                    <td id="lab_con" colspan="2"><label>Question : <?php echo $res['s_q']; ?></label></td>
              

                </tr>
                 <tr>

                    <td id="lab_con"><label>Answer : </label></td>
                    <td id="field_con"><input class="field" name="s_a" id="s_a" required></td>

                </tr>
                 <tr>
                    <td id="btn_con" colspan="2">
                        <br>
                        <center><button class="common_btn" name="change_pass_btn" type="submit"><span class='btn_title'>Next</span></button></center>
                    </td>
                </tr>
                
                
        </table>
       </form>
    
      
   </div>

    




</body>

</html>
