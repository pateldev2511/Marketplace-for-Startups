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


    function change()
{
 
    if(i == arr.length)
       {
        i = 0;
           
       }
    
    document.getElementById("slide").src = arr[i];
    i++;
    
    
}
  var res =  setInterval(change, 2000);
 

function prev()
{
 clearInterval(res);
    i--;
    if(i < 0)
       {
       i = arr.length-1;
       }
    
     document.getElementById("slide").src = arr[i];
   
    
}

function next()
{
    clearInterval(res);
      i++;
    if(i >= arr.length)
       {
       i = 0;
       }
   // alert(i);
     document.getElementById("slide").src = arr[i];
   
}
        function set_interval(){
            res =  setInterval(change,2000);
        }

    </script>
    <style>


        #footer_table
    {
      background-color: floralwhite;
        width: 80%;
        margin: 0 auto;
    }
    #quick_links_container {
        width: 35%;
        padding: 10px;
    }
    #footer_title {
        text-align: center;
        font-family: verdana;
        font-weight: 100;
        font-size: 20px;
        padding: 20px;
        letter-spacing: 2px;
    }
        .footer_link {
    text-align: center;
    text-decoration: none;
    color:blue;
    transition: opacity 2s ease;
}

.footer_link:hover {
    text-align: center;
    text-decoration: underline;
    color: black;
    opacity: 0.5;
}
        #footer_sub_table {
 text-align: center;   
    
}
        .bdr {
            border-right: 2px solid;
        }
        .fa-envelope {
    font-size: 25px;
            padding: 20px;
 
}
.contact_details {
    font-family: arial;
    padding: 20px;
    font-size: 20px;
}
        .link:hover {
            color: black;
        }
.wid_set {
   width: 33%; 
    text-align: center;
}
        .link {
    text-decoration: none;
    color: blue;
}
.fab  {
            cursor: pointer;
        }
        #c {
    font-size: 25px;
    font-weight: bold;
            text-shadow: 1px 1px 1px black;
}
/*

        #slide {
            animation:  an1 4s infinite ease;
            transition: opacity 4s;
        }
        @keyframes an1 {
            from {
                opacity: 0.2;
            }
            to {
                opacity: 1;
            }
        }
*/
/*
        #slide_c {
           position: inherit;
            width: 80%;
            margin: 0 auto;
        }
        
        #slider_container {
            width: 80%;
            margin: 0 auto;
            
        }
        #slider {
            position: absolute;
            display: inline;
        }

        #prev {
            position: absolute;
            top: 50%;
            cursor: pointer;
        }
        #next {
           position: absolute;
            top: 50%;
            right: 0%;
            cursor: pointer;
        }
        
*/
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

<div id="img_animation_container">
    
</div>
<!--
<div id="slide_c">
<div id="slider_container">
 <div id="slider">
        <button onclick="prev()" onmouseout="set_interval();" id='prev'>Previous</button>
        <img id="slide" src="images/1.jpg" width="800px" height="500px">
        <button onclick="next()" onmouseout="set_interval();" id='next'>Next</button>

    </div>
    </div>
    </div>
-->

    <div id="marq_container">
        <marquee onmouseover="stop(this);" onmouseout="start(this);">Welcome To The ValueMart...!!!<span id='marq_s1'> Join To Our Community For The Latest Upadates...</span></marquee>
    </div>

    <div id="main_container">
        <div id="part0">
            <center>
                <p id="title_0">Be The Part Of Most Precious MarketPlace !</p>
            </center>
            <div id="part0_1">
                <p id="part0_1_main_title">Choose Your Stream : </p>
                <table width="100%">
                    <tr>
                        <td class="part0_1_tr">
                            <p id='part0_1_title_en'>Are You An Entrepreneur ?</p>
                            <form name="f1">
                                <a href="login.php"><button class="common_btn" type="button" name="en_login_btn"><span class='btn_title'>Yes , I'm Existing Entrepreneur</span></button></a>
                                <br><br>
                                <a href="signup.php"><button class="common_btn" type="button" name="en_login_btn"><span class='btn_title'>No, I'm New Entrepreneur</span></button></a>
                            </form>
                        </td>

                        <td id="part0_1_tr">
                            <p id='part0_1_title_bu'>Are You A Buyer ?</p>
                            <form name="f1">
                                <a href="login.php"><button class="common_btn" type="button" name="en_login_btn"><span class='btn_title'>Yes , I'm Existing Buyer</span></button></a>
                                <br><br>
                                <a href="signup.php"><button class="common_btn" type="button" name="en_login_btn"><span class='btn_title'>No, I'm New Buyer</span></button></a>
                            </form>
                        </td>

                    </tr>
                </table>
            </div>
        </div>
        <div id="part1">
            <span id="div_title">Success Stories : </span>
            <hr>
            <table id="part1_table" width="80%" cellspacing="20px" style="margin: 0 auto;">
                <tr class="block">
                    <td class="block_container">
                        <center><img id="ss_img" src="images/1.jpg"> </center>
                        <p class="part1_title">
                            Mr. X
                        </p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit similique in nostrum excepturi exercitationem fuga accusantium, facere nisi unde deserunt consequatur, atque temporibus autem inventore ratione quisquam quo voluptate eum.
                    </td>


                    <td class="block_container">
                        <center><img id="ss_img" src="images/2.jpg"> </center>
                        <p class="part1_title">

                            Mrs. Y
                        </p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci nulla, architecto unde voluptas obcaecati labore distinctio. Harum corporis, accusantium minus, sunt repellat corrupti culpa doloribus esse sit laboriosam adipisci consequuntur.

                    </td>


                    <td class="block_container">
                        <center><img id="ss_img" src="images/3.jpg"></center>
                        <p class="part1_title">
                            Mr. Z
                        </p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro reiciendis accusantium voluptates quae ad, maxime, mollitia quaerat alias illo, repellendus hic sequi. Atque ullam tempora ipsam explicabo itaque repudiandae delectus?
                    </td>
                </tr>
            </table>
            <center>
                <a href="sucess_stories.php"><button class="common_btn" type="submit" name="signup_btn"><span class='btn_title'>View More</span></button></a></center>
        </div>
    </div>

    <div id="footer">
        <table id="footer_table" width="80%" style="margin: 0 auto;">
            <tr>
                <th id="footer_title">
                    Quick Links :
                </th>
                <th id="footer_title">
                    Contact Us Via :
                </th>
                <th id="footer_title">
                    Connect With Us :
                </th>
            </tr>
            <tr>
                <td class="wid_set bdr" id="quick_links_container">
                    <table id="footer_sub_table" align="center" width="80%" cellpadding="5px" cellspacing="5px">
                        <tr>
                            <td><a class="footer_link" href="index.php">Home</a></td>
                            <td><a class="footer_link" href="about.php">About</a></td>
                        </tr>
                        <tr>
                            <td><a class="footer_link" href="gallery.php">Gallery</a></td>
                            <td><a class="footer_link" href="success_storiess.php">Success Stories</a></td>
                        </tr>
                        <tr>
                            <td><a class="footer_link" href="#top" onclick="open_signup_popup();">Sign Up</a></td>
                            <td><a class="footer_link" href="#top" onclick="opsen_login_popup();">Log In</a></td>
                        </tr>
                    </table>

                </td>
                <td class="wid_set bdr" id="contact_details_container">
                    <p><i class="fas fa-phone"></i> <span class="contact_details"><a href="tel:09876543210" class="link"> +91 9876543210</a></span></p>

                    <p>
                        <i class="far fa-envelope"><span class="contact_details"><a href="index.php" class="link">contact@valuemart.com</a></span></i>
                    </p>
                </td>

                <td class="wid_set" id="social_links_container">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-snapchat-ghost"></i>
                </td>
            </tr>
            <tr>
                <td colspan="3" ids="copyright_container">
                    <br>
                    <center><span id="c">&copy;
                            <?php echo date('Y'); ?> ValueMart. All Rights Reserved.</span></center>

                </td>
            </tr>
        </table>

    </div>

   

    <!--    <a name='end' href='#start'>go to top</a>-->

 <div id="slider1">
     <div id="s">
        <img class="slide1" src="images/1.jpg" width="500px" height="400px">
        <img class="slide1" src="images/2.jpg" width="500px" height="400px">
        <img class="slide1" src="images/3.jpg" width="500px" height="400px">
        <img class="slide1" src="images/4.jpg" width="500px" height="400px">
  
   </div>
    </div>
    
    
   
</body>


</html>
