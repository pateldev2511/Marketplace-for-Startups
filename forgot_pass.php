<?php
include "connection.php";

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

        #forgot_password_container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
        }
        
    #forgot_title {
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




#forgot_container {
   
    text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: black;
    
}

.label_forgot {
    font-size: 30px;
    width: 40%;
    font-family: monospace;
    text-align: center;
    color: white;
}

#forgot_table_container {
    padding: 20px;
}

.field {
    height: 30px;
    padding: 5px;

    border-radius: 5px;
    margin: 5px 0;
    width: 300px;
   
    color:black;
    font-size: 20px;

}




.field_forgot {
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


    <div id="forgot_password_container">
        <center>
            <p id="forgot_title">Forgot Password ?</p>
        </center>

        <form name="forgot_password" method="post">

            <table id="forgot_table_container" align="center">

                <tr>
                    <td class="label_forgot">
                        <label>Username: </label>
                    </td>
                    <td class="field_forgot">
                        <input type="text" name="forgot_username" class="field">
                    </td>
                </tr>




                <tr>
                    <td class="label_forgot">
                        <label>Email : </label>
                    </td>
                    <td class="field_forgot">
                        <input type="email" name="forgot_email" class="field">
                    </td>
                </tr>




                <tr>
                    <td id="btn_con" colspan="2">
                        <br>
                        <center><button class="common_btn" type="submit" name="forgot_pass_btn"><span class='btn_title'>Send Mail</span></button></center>
                    </td>
                </tr>



            </table>


        </form>

    </div>

</body>

</html>




<?php


if(isset($_POST['forgot_pass_btn']))
{
    $un = $_POST['forgot_username'];
    $email = $_POST['forgot_email'];
    
    
    if(empty($un) || empty($email))
    {
        echo "<script>alert('Please Enter All The Fields...!!!');</script>";
    }
    else {
        
        $sql = "SELECT * FROM $t1 WHERE username='$un' AND email='$email'";
        $q = mysqli_query($con,$sql);
        $row = mysqli_num_rows($q);
        
        if($row == 1)
        {
            $sql = "SELECT * FROM $t1 WHERE username='$un' AND email='$email' AND isverified='YES'";
            $q = mysqli_query($con,$sql);
            $row = mysqli_num_rows($q);
            if($row == 1)
            {
                                  $token = mt_rand(111111111,999999999);

              
                      require 'PHPMailerAutoload.php';
            
                    $mail = new PHPMailer;
                    $mail->SMTPDebug = 0;
                     $mail->isSMTP();                     
                    $mail->Host = 'smtp.gmail.com'; 
                    $mail->SMTPAuth = true;                  
                    $mail->Username = 'noreply.valuemart@gmail.com';               
                    $mail->Password = 'valuemart123';                         
                    $mail->SMTPSecure = 'tls';                       
                    $mail->Port = 587;                            
                    $mail->setFrom('noreply.valuemart@gmail.com','ValueMart');
                    $mail->addAddress($email);   
                    $mail->isHTML(true); 
                    $mail->Subject = 'ValueMart Forgot Password';
                    $mail->Body    = 
                    "<h2>Hey , $un </h2>
                    <font style='font-family:cursive;'>We Have Received Request Of Forgot Password For Your Account.  <br>
                    <br><br>Click On The Following Button To Change Your Password.<br><div style='text-align:center;'><br><a href='http://localhost/MarketplaceForStartups/reset_pass.php?email=$email&username=$un&token=$token'><button style='width: 30%;height: 30px;background-color: black;color:white;font-size: 20px;border-radius: 20px;'>Reset Password </button> </a></div></font><p align='right'><i>Regards</i></p><p align='right'><b>-ValueMart.</b></p>";

                  
                    if(!$mail->send()) {
                        echo "<script>alert('Message could not be sent.');</script>";
                     
                    }
                    else {
                       $sql = "UPDATE $t1 SET token='$token' WHERE username='$un'";
                       $q = mysqli_query($con,$sql); 
                
                        if($q)
                        {
                        echo '<script>alert("A Reset Password Mail Is Sent To Your Email..!!!");</script>';
                        }
                        else {
                           echo "<script>alert('Account Not Created...!!!');</script>";    
                        }
                    }
            }      
        }
        else {
            echo "<script>alert('Sorry , Your Account Is Not Verified Till Now...!!!');</script>";  
        }
     
     
    }
}

?>
