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
                    <li><a href="index.php" class="active">Inquiry</a></li>
                    <li onclick='open_signup_popup();'><a href="#">Sign Up</a></li>
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

<center><p id="signup_title">Ask You Doubt... </p></center>
        <center><p style='color:white;font-family: calibri;font-size: 20px;'>Feel Free To Ask A Question.</p></center>
        <form name="f1" method="post" enctype="multipart/form-data">


            <table id="form_container">

                <tr>

                    <td id="lab_con"><label>Name : </label></td>
                    <td id="field_con"><input class="field" name="name" id="e_name" type="text" required></td>

                </tr>
                <tr>

                    <td id="lab_con"><label>Organization / Company Name : </label></td>
                    <td id="field_con"><input class="field" name="company_name" id="company_name" type="text" required></td>


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

                    <td id="lab_con"><label>Describe Your Question : </label></td>
                    <td id="field_con"><textarea class="field field_more" name="question" id="address" type="text" required></textarea></td>


                </tr>
               
                
                <tr>
                    <td id="btn_con" colspan="2">
                        <br>
                        <center><button class="common_btn" name="submit_btn" type="submit"><span class='btn_title'>Submit</span></button></center>
                    </td>
                </tr>
            </table>

        </form>

    </div>



</body>


</html>




<?php
include "connection.php";

if(isset($_POST['submit_btn']))
{
    $name = $_POST['name'];
    $c_name = $_POST['company_name'];
    $email = $_POST['email'];
    $mobile_no = $_POST['mobile_no'];
    $question = $_POST['question'];
    
    
    date_default_timezone_set("Asia/Kolkata");
    $time = date('d-m-Y , h:i:s A');
    
    $sql = "INSERT INTO `inquiry`(`name`, `company_name`, `email`, `mobile_no`, `question`, `time`) VALUES ('$name','$c_name','$email','$mobile_no','$question','$time')";
    
    $q = mysqli_query($con,$sql);
    
    if($q)
    {
        echo "<script>alert('Your Response Is Submitted...!!!');</script>";
    }
    else {
            echo "<script>alert('Error In Submitting Your Response.');</script>";
    }
    
}

?>