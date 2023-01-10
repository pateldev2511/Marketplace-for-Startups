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
    <link rel="stylesheet" href="entrepreneur_signup.css">
    <link rel="stylesheet" href="common.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <script src="index.js"></script>
    <script>


        function change_country()
          {
          
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.open("GET","ajax.php?country="+document.getElementById("country_dd").value,false);
              xmlhttp.send(null);
              document.getElementById("state").innerHTML = xmlhttp.responseText;
          }

       function change_state()
          {
              
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.open("GET","ajax1.php?state="+document.getElementById("state_dd").value,false);
              xmlhttp.send(null);
              document.getElementById("city").innerHTML = xmlhttp.responseText;
          }

        
        
        
    </script>
<style>
    
    #signup_title {
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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php">About</a></li>
                    <li><a href="index.php">Gallery</a></li>
                    <li><a href="index.php">Success Stories</a></li>
                    <li><a href="index.php">Inquiry</a></li>
                    <li onclick='open_signup_popup();'><a href="#" class="active">Sign Up</a></li>
                    <li><a href="index.php">Log In</a></li>
                </ul>


            </div>
        </center>
    </div>
    <div id="res">

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
    <div class="main_container">

<center><p id="signup_title">Sign Up As A Buyer </p></center>
        <form name="f1" method="post" enctype="multipart/form-data">


            <table id="form_container">

                <tr>

                    <td id="lab_con"><label>Name : </label></td>
                    <td id="field_con"><input class="field" name="b_name" id="b_name" type="text" required></td>

                </tr>
                <tr>

                    <td id="lab_con"><label>Organization / Company Name : </label></td>
                    <td id="field_con"><input class="field" name="company_name" id="company_name" type="text" required></td>


                </tr>
                <tr>

                    <td id="lab_con"><label>Address : </label></td>
                    <td id="field_con"><textarea class="field field_more" name="address" id="address" type="text" required></textarea></td>


                </tr>
                <tr>

                    <td id="lab_con"><label>Organization / Company Address : </label></td>
                    <td id="field_con"><textarea class="field field_more" id="company_address" name="company_address" type="text" required></textarea></td>


                </tr>
                <tr>

                    <td id="lab_con"><label>Date Of Birth : </label></td>
                    <td id="field_con"><input class="field" name="dob" id="dob" type="date" required></td>


                </tr>
                <tr>

                    <td id="lab_con"><label>Gender : </label></td>
                    <td id="field_con">
                        <input id="gender" name="gender" type="radio" value="male"><span class="field" required>Male</span>
                        <input id="gender" name="gender" type="radio" value="female"><span class="field" required>Female</span>
                    </td>
                </tr>
                <tr>

                    <td id="lab_con"><label>Username : </label></td>
                    <td id="field_con">
                        <input type="text" id="username_con" class="field" name="un" required>

                    </td>
                </tr>

                <tr>

                    <td id="lab_con"><label>Password : </label></td>
                    <td id="field_con">
                        <input type="password" id="password" class="field" name="pw_1" required>

                    </td>
                </tr>
                <tr>

                    <td id="lab_con"><label>Confirm Password : </label></td>
                    <td id="field_con">
                        <input type="password" id="password" class="field" name="pw_2" required>

                    </td>
                </tr>
                <tr>

                    <td id="lab_con"><label>Email : </label></td>
                    <td id="field_con">
                        <input type="email" id="password" class="field" name="email" required>

                    </td>
                </tr>
                <tr>

                    <td id="lab_con"><label>Mobile No : </label></td>
                    <td id="field_con">
                        <input type="tel" id="mobile_no" class="field" name="mobile_no" required>

                    </td>
                </tr>

                <tr>

                    <td id="lab_con"><label>Country : </label></td>
                    <td id="field_con">

                        <select class="field" id="country_dd" onchange="change_country();" name="country" required>
                            <option value="">select</option>
                            <?php 
                 $sql = "select * from $countries";
                $q = mysqli_query($con,$sql);
                while($res = mysqli_fetch_assoc($q))
                {
                 echo "<option value='".$res['id']."'>".$res['name']."</option>";
                }
                ?>
                        </select>

                    </td>

                </tr>

                <tr>
                    <td id="lab_con">

                        <label>State : </label></td>

                    <td id="field_con">
                        <div id="state">
                            <select class="field" id="state_dd" onchange="change_state();" name="state" required>
                                <option>select</option>

                            </select>


                        </div>
                    </td>
                </tr>
                <tr>
                    <td id="lab_con">
                        <label>City : </label></td>



                    <td id="field_con">
                        <div id="city">
                            <select class="field" name="city" id="city_dd" required>
                                <option>select</option>

                            </select>


                        </div>
                    </td>

                </tr>
                
                 <tr>
                    <td id="lab_con">
                        <label>Select Security Question : </label></td>



                    <td id="field_con">
                            <select class="field" name="s_q" id="s_q" required>
                                <option value="">Select Questions</option>
                                <option value="What Is Your 10th Percentage ?">What Is Your 10th Percentage ?</option>
                                <option value="In Which Year You Bought Your First Vehicle ?">In Which Year You Bought Your First Vehicle ?</option>
                                <option value="What Is Your Favourite Book Name ?">What Is Your Favourite Book Name ?</option>
                                <option value="What Is Your Favourite Color ?">What Is Your Favourite Color ?</option>
                                <option value="What Is Your Nick Name ?">What Is Your Nick Name ? </option>
                        
                        </select>

                    </td>

                </tr>
                 <tr>

                    <td id="lab_con"><label>Answer : </label></td>
                    <td id="field_con">
                        <input type="text" class="field" name="s_a" required>

                    </td>
                </tr>

                
                <!--
                <tr>
                    <td id="lab_con">
                        <label>Profile Image : </label></td>
                    <td id="field_con">
                        <input  class="field"  type="file" name="file" accept="image/*">
                    </td>
                </tr>
-->
                <tr>
                    <td id="btn_con" colspan="2">
                        <br>
                        <center><button class="common_btn" name="signup_btn" type="submit"><span class='btn_title'>Sign Up</span></button></center>
                    </td>
                </tr>
            </table>

        </form>

    </div>



</body>


</html>


<?php

if(isset($_POST['signup_btn']))
{
    $name = $_POST['b_name'];
    $com_name = $_POST['company_name'];
    $address = $_POST['address'];
    $com_address = $_POST['company_address'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    
    $c_id = $_POST['country'];
    $s_id = $_POST['state'];
    $ci_id = $_POST['city'];
    
    $x = "default.png";
    $path = "profile_images/".$x;
    $bio = "Hey ! I'm  Available In ValueMart !";
    
    $sql = "SELECT * FROM $countries WHERE id='$c_id'";
    $q = mysqli_query($con,$sql);
    $r = mysqli_fetch_assoc($q);
    
    $country = $r['name'];
    
    $sql = "SELECT * FROM $states WHERE id='$s_id'";
    $q = mysqli_query($con,$sql);
    $r = mysqli_fetch_assoc($q);
    
    $state = $r['name'];
    
    $sql = "SELECT * FROM $cities WHERE id='$ci_id'";
    $q = mysqli_query($con,$sql);
    $r = mysqli_fetch_assoc($q);
    
    $city = $r['name'];
    
    $un = $_POST['un'];
    $pw1 = $_POST['pw_1'];
    $pw2 = $_POST['pw_2'];
    $email = $_POST['email'];
    $mobileno = $_POST['mobile_no'];
    $isverified = "NO";
    
    $s_q = $_POST['s_q'];
    $s_a = $_POST['s_a'];
    
    $sql = "SELECT * FROM $t2 WHERE username='$un'";
    $q = mysqli_query($con,$sql);
    $r = mysqli_num_rows($q);
    
    if($r == 1)
    {
      echo "<script>alert('An Account Already Exists With This Username...!!!');</script>";  
    }
    else {
      $sql = "SELECT * FROM $t2 WHERE email='$email'";
      $q = mysqli_query($con,$sql);
      $r = mysqli_num_rows($q);  
        
        if($r == 1)
        {
            echo "<script>alert('An Account Already Exists With This Email...!!!');</script>"; 
        }
        else {
           $sql = "SELECT * FROM $t2 WHERE mobile_no='$mobileno'";
           $q = mysqli_query($con,$sql);
           $r = mysqli_num_rows($q);  
           
           if($r == 1)
            {
               echo "<script>alert('An Account Already Exists With This Mobile No...!!!');</script>"; 
            }
            else {
              if($pw1 != $pw2)
              {
                    echo "<script>alert('Both Passwords Should Be Same...!!!');</script>";
              }
              else { 
                  
                 
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
        $mail->setFrom('noreply@valuemart.com','ValueMart');
        $mail->addAddress($email);   
        $mail->isHTML(true); 
        $mail->Subject = 'ValueMart';
        $mail->Body    = 
        "<h2>Hey , $un </h2>
        <font style='font-family:cursive;'>Thanks For Signing Up @ <b> ValueMart </b> <br>
        <br><div style='text-align: center;'><img src='https://psalmisadora.com/wp-content/uploads/2016/05/thank-you.png' width='150px' height='100px' align='center'></div><br>Click On The Following Button To Verify Your Mail.<br><div style='text-align:center;'><br><a href='http://localhost/MarketplaceForStartups/verify_email_buyer.php?stream=b&email=$email&username=$un&token=$token'><button style='width: 50%;height: 30px;background-color: black;color:white;font-size: 20px;border-radius: 20px;'>Verify My Email </button> </a></div></font><p align='right'><i>Regards</i></p><p align='right'><b>-ValueMart.</b></p>";
           
                  
                    if(!$mail->send()) {
                        echo "<script>alert('Message could not be sent.');</script>";
                     
                    } else {
                      
                        $sql = "insert into $t2(name,company_name,address,company_address,date_of_birth,gender,country,state,city,profile_image,bio,username,password,mobile_no,email,isverified,s_q,s_a,token) values('$name','$com_name','$address','$com_address','$dob','$gender','$country','$state','$city','$path','Hi','$un','$pw1','$mobileno','$email','$isverified','$s_q','$s_a','$token')";
                    $q = mysqli_query($con,$sql);
                    if($q)
                    {
                        echo '<script>alert("Account Created...!!!\nPlease Verify Your Email To Log In !");</script>';
                    }
                    else {
                        echo "<script>alert('Account Not Created...!!!');</script>";    
                    }
                    }
                  
                
              }      
           }
        }
    }
}
    
//     $f_name = $_FILES['file']['name'];
//    $file_basename = substr($f_name, 0, strripos($f_name, '.'));
//   
//    $t_name = $_FILES['file']['tmp_name'];
//    $t = explode(".", $f_name);
//  $extension = end($t);
//    $x = $file_basename.date('ymdhis').".".$extension;
//  $path = "uploads/".$x;
//    move_uploaded_file($t_name,$path);
 

?>
