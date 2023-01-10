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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MarketPlace For Startups</title>
    <!-- Fav Icon -->
    <link rel="shortcut icon" href="images/logo.png">
    <!-- css files -->
    <link rel="stylesheet" href="common.css">
    <link rel="stylesheet" href="index.css">
<!--    <link rel="stylesheet" href="entrepreneur_login.css">-->
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
#login_container {
    color: black;
   
    width: 80%;
    margin: 0 auto;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    
}
            
    #login_title {
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
width: 40%;
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

        .s_link {
            text-decoration: none;
            color: aliceblue;
            font-family: verdana;
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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php">About</a></li>
                    <li><a href="index.php">Gallery</a></li>
                    <li><a href="index.php">Success Stories</a></li>
                    <li><a href="index.php">Inquiry</a></li>
                    <li onclick='open_signup_popup();'><a href="#">Sign Up</a></li>
                    <li onclick='open_login_popup();'><a href="#" class="active">Log In</a></li>
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

   
   <div id="login_container">
   <center><p id="login_title">Log In As Entrepreneur</p></center>
    <form name="f1" method="post">


            <table id="form_container"s>

                <tr>

                    <td id="lab_con"><label>Username : </label></td>
                    <td id="field_con"><input class="field" name="login_username" id="login_username" type="text" required></td>

                </tr>
                 <tr>

                    <td id="lab_con"><label>Password : </label></td>
                    <td id="field_con"><input class="field" name="login_password" id="login_password" type="password" required></td>

                </tr>
                 <tr>
                    <td id="btn_con" colspan="2">
                        <br>
                        <center><button class="common_btn" name="login_btn" type="submit"><span class='btn_title'>Log In</span></button></center>
                    </td>
                </tr>
                
                 <tr>
                    <td colspan="2">
                        <br>
                        <center>
                            <a href="forgot_pass.php" class='s_link'>Forgot Password ?</a>
                            <br><br>
                            <a href="entrepreneur_signup.php" class="s_link">Not Account Yet ?</a>
                            
                        </center>
                    </td>
                </tr>
        </table>
       </form>
    
      
   </div>

    
  

</body>


</html>






