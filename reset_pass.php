<?php

include "connection.php";
$email = $_GET['email'];
$username = $_GET['username'];
$token = $_GET['token'];

if(empty($email) || empty($username) || empty($token))
{
    header("location:entrepreneur_login.php");
}
else {
    $sql = "SELECT * FROM $t1 WHERE email='$email' AND username='$username' AND token='$token'";
    $q = mysqli_query($con,$sql);
    
    $row = mysqli_num_rows($q);
    
    if($row == 0)
    {
         echo "<script>alert('Invalid Username , Email Or Token...!!!');</script>";
                echo "<script>window.location.href = 'entrepreneur_login.php';</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MarketPlace For Startups</title>
    <!-- Fav Icon -->
    <link rel="shortcut icon" href="images/logo.png">
    <!-- css files -->
    <link rel="stylesheet" href="common.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">

    <script src="index.js"></script>
    <script>
        var arr = ["images/1.jpg","images/2.jpg","images/3.jpg","images/4.jpg"];
var i = 0;

    function open_login_popup()
{ 
    document.getElementById("login_popup_box").style.display = "block";  
}
function close_login_popup()
{ 
    document.getElementById("login_popup_box").style.display = "none";
}
function open_en_login()
{   
    window.location.href = "entrepreneur_login.php";
}
function open_b_login()
{
    window.location.href = "buyer_login.php";
}
    </script>
    <style>

        #reset_password_container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
        }
        
    #reset_title {
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




#reset_container {
   
    text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: black;
    
}

.label_reset {
    font-size: 30px;
    width: 60%;
    font-family: monospace;
    text-align: right;
    color: white;
}

#reset_table_container {
    padding: 20px;
   
}

.field {
    height: 40px;
    padding: 5px;

    border-radius: 5px;
    margin: 5px;
    width: 300px;
   
    color:black;
    font-size: 20px;
   

}




.field_reset {
    height: 30px;
    border-radius: 5px;
    margin: 5px 0;
}

    
    </style>
</head>

<body onload="change()">
    <a name='start' href='#end'></a>
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
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="index.php">About</a></li>
                    <li><a href="index.php">Gallery</a></li>
                    <li><a href="index.php">Success Stories</a></li>
                    <li><a href="index.php">Inquiry</a></li>
                    <li onclick='open_signup_popup();'><a href="#">Sign Up</a></li>
                    <li onclick='open_login_popup();'><a href="#">Log In</a></li>
                </ul>


            </div>
        </center>
    </div>

    <div id="login_popup_box">
        <p id="close_con"><i class="fas fa-times" onclick="close_login_popup();"></i></p>
        <br>
        <p>Select Appropriate Category : </p>
        <br>
        <form name="f1">
            <input type="radio" name="pop_btn_en" id="pop_btn_en" onclick="open_en_login();">I 'm An Entrepreneur
            <br><br>
            <input type="radio" name="pop_btn_en" id="pop_btn_b" onclick="open_b_login();">I 'm A Buyer
        </form>
    </div>

    <div id="signup_popup_box">
        <p id="close_con"><i class="fas fa-times" onclick="close_signup_popup();"></i></p>
        <br>
        <p>Select Appropriate Category : </p>
        <br>
        <form name="f1">
            <input type="radio" name="pop_btn_en" id="pop_btn_en" onclick="open_en_signup();">I 'm An Entrepreneur
            <br><br>
            <input type="radio" name="pop_btn_en" id="pop_btn_b" onclick="open_b_signup();">I 'm A Buyer
        </form>
    </div>


    <div id="reset_password_container">
        <center>
            <p id="reset_title">Reset Password </p>
        </center>

        <form name="reset_password" method="post">

            <table id="reset_table_container" align="center">

                <tr>
                    <td class="label_reset">
                        <label>Enter New Password : </label>
                    </td>
                    <td class="field_reset">
                        <input type="password" name="reset_pw1" class="field">
                    </td>
                </tr>




                <tr>
                    <td class="label_reset">
                        <label>Confirm Password : </label>
                    </td>
                    <td class="field_reset">
                        <input type="password" name="reset_pw2" class="field">
                    </td>
                </tr>




                <tr>
                    <td id="btn_con" colspan="2">
                        <br>
                        <center><button class="common_btn" type="submit" name="reset_pass_btn"><span class='btn_title'>Reset Password</span></button></center>
                    </td>
                </tr>



            </table>


        </form>

    </div>

</body>

</html>




<?php

if(isset($_POST['reset_pass_btn']))
{
    
    $pw1 = $_POST['reset_pw1'];
    $pw2 = $_POST['reset_pw2'];
    
    if(empty($pw1) || empty($pw2))
    {
        echo "<script>alert('Please Fill The All Fields...');</script>";
    }
    else {
        if($pw1 == $pw2)
        {
            
            $sql = "UPDATE $t1 SET password='$pw1',token='0' WHERE username='$username' AND email='$email'";
            $q = mysqli_query($con,$sql);
            if($q)
            {
                echo "<script>alert('Your Account Password Is Successfully Reset...!!!');</script>";
                echo "<script>window.location.href = 'entrepreneur_login.php';</script>";
            }
            else {
                
                echo "<script>alert('Error In Resetting Your Account Password...!!!');</script>";
            }
            
        }
        else {
            echo "<script>alert('Both Passwords Must Be Same...!!!');</script>";
        }
    }
    
}


?>
