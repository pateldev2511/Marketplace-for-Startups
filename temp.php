<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>MarketPlace For Startups</title>
    <!-- Fav Icon -->
    <link rel="shortcut icon" href="images/logo.png">
    <!-- css files -->
    <link rel="stylesheet" href="temp.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <script src="index.js"></script>

</head>

<body>
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
                    <li><a href="" class="active">Home</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Gallery</a></li>
                    <li><a href="">Success Stories</a></li>
                    <li><a href="">Inquiry</a></li>
                    <li onclick='open_signup_popup();'><a href="#">Sign Up</a></li>
                    <li><a href="">Log In</a></li>
                </ul>


            </div>
        </center>
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

    </body>
</html>