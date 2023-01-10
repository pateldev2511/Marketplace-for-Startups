<?php
include "connection.php";
session_start();
$b_id = $_GET['b_id'];

if(empty($b_id))
{
    header("location:goto_login.php");
}
else {
    $sql = "SELECT * FROM $t2 WHERE b_id='$b_id'";
    $q = mysqli_query($con,$sql);
    $res = mysqli_fetch_assoc($q);
}

//echo "<h1>welcome...".$un."</h1>";
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile |
        <?php echo $res['username']; ?>
    </title>
    <link rel="shortcut icon" href="images/logo.png">
    <!-- css files -->
    <link rel="stylesheet" href="common.css">

    <link rel="stylesheet" href="profile_entrepreneur.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fsonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
  <script src="index.js"></script>
    <script>
       

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

        document.getElementById("open1").addEventListener("click", function(){
 open_en_login();
});
        
    </script>

    <style>
        .eqi_title {

    font-size: 20px;
    font-weight: 300;
    font-family: fantasy;
    letter-spacing: 2px;


}

#e_eqi {
    color: red;
    font-size: 30px;
    font-family: cursive;
    text-shadow: 1px 1px 1px green, 1.5px 1.5px 2px blue;
}

.slash_eqi {
    font-size: 30px;
}

#total {
    font-size: 35px;
}

.dont_know {
    font-size: 15px;
    letter-spacing: 1px;
}

.click_here {
    text-decoration: none;
    font-size: 12px;

    
}
        .common_btn_1 {
    background-color: #0088ff;
    font-family: verdana;
    font-size: 15px;
    color: white;
    height: 30px;
    border-radius: 10%;
    box-shadow: 1px 1px 1px red, 2px 2px 1.5px green, 3px 3px 2px blue;

}
        
        .field_more {
            width: 300px;
            height: 100px;
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
  
<?php
      if((isset($_SESSION['b_username'])))
{
          
               echo "<div id='navbar'>
        <center>
            <div id='navbar_container'>

                <ul>
                       <li><a href='home_buyer.php'>Home</a></li>
                    <li><a href='search_buyer.php'>Search</a></li>
                    <li><a href='mycart_buyer.php'>My Cart</a></li>
                    <li><a href='myorders_buyer.php'>My Orders</a></li>
                    <li><a href='notification_buyer.php'>Notifications</a></li>
                     <li><a href='services_buyer.php'>Services</a></li>
                    <li><a href='profile_buyer.php'>My Profile</a></li>
                    <li><a href='logout.php'>Log Out</a></li>
               
               
                </ul>


            </div>
        </center>
    </div>";
          
  
    }
    else if((isset($_SESSION['username'])))
    {
        echo "
         <div id='navbar'>
        <center>
            <div id='navbar_container'>

                   <li><a href='home_entrepreneur.php'>Home</a></li>
                    <li><a href='search_entrepreneur.php'>Search</a></li>
                    <li><a href='add_new_product.php'>Add New Product</a></li>
                    <li><a href='notification_entrepreneur.php' >Notifications</a></li>
                    <li><a href='pending_orders.php'>Pending Orders</a></li>
                    <li><a href='profile_entrepreneur.php'>My Profile</a></li>
                    <li><a href='logout.php'>Log Out</a></li>


            </div>
        </center>
    </div>
        ";
    }
    else {
      echo "<div id='navbar'>


        <center>
            <div id='navbar_container'>

                <ul>
                    <li><a href='index.php'>Home</a></li>
                    <li><a href='index.php'>About</a></li>
                    <li><a href='index.php'>Gallery</a></li>
                    <li><a href='index.php>Success Stories</a></li>
                    <li><a href='index.php'>Inquiry</a></li>
                    <li onclick='open_signup_popup();'><a href='#'>Sign Up</a></li>
                    <li onclick='open_login_popup();' id='open1'><a href='#'>Log In</a></li>
                </ul>


            </div>
        </center>
    </div>"; 
    
    }

    ?>
  

    <div id="main">
        <p id="profile_title">Profile : </p>
        <hr>
        <?php
    $sql = "SELECT * FROM $t2 WHERE b_id='$b_id'";
    $q = mysqli_query($con,$sql);
    $res = mysqli_fetch_assoc($q);
    
    ?>
        <table id="profile_table_container" cellpadding="20px">
            <tr>
                <td align="center" class="l_border">

                    <center> <img src="<?php echo $res['profile_image']; ?>" id="profile_img">
                    </center>
        
                </td>
                <td>
                    <p class="labl">About : </p>
                    <?php
                echo "<span id='bio_span'>".$res['bio']."</span>";
                ?>
                 
                    <?php
            
                if(isset($_POST['change_bio_btn'])){
                   $n_b = $_POST['new_bio']; 
                      
                     $sql2 = "UPDATE $t1 SET bio='$n_b' WHERE username='$un'";
                      $q2 = mysqli_query($con,$sql2);
                    echo "<script>refresh_1();</script>"; 
                    
                }
            ?>
                </td>

               
            </tr>

            <tr>
                <td colspan="3">
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan="3" width="100%">
                    <fieldset>
                        <legend class="leg_c">Personal Details : </legend>
                        <table name="personal_detail_container">
                            <tr>
                                <td>
                                    <label class="sub_labl">Name : </label>
                                </td>
                                <td>
                                    <input class="sub_field_r" type="text" value="<?php echo $res['name']; ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="sub_labl">Company Name : </label>
                                </td>
                                <td>
                                    <input class="sub_field_r" type="text" value="<?php echo $res['company_name']; ?>" readonly>
                                </td>
                            </tr>
                           
                            <tr>
                                <td>
                                    <label class="sub_labl">
                                        Company Address :
                                    </label>
                                </td>
                                <td>
                                    <textarea class="field field_more  sub_field_r" id="company_address" name="company_address"><?php echo $res['company_address']; ?></textarea>
                                </td>
                            </tr>
                          
                        </table>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <fieldset>
                        <legend class="leg_c">Contact & Account Details : </legend>
                        <table name="personal_detail_container">
                            <tr>
                                <td>
                                    <label class="sub_labl">Userame : </label>
                                </td>
                                <td>
                                    <input class="sub_field_r" type="text" value="<?php echo $res['username']; ?>" readonly>
                                </td>
                            </tr>
                        
                            <tr>
                                <td>
                                    <label class="sub_labl">Email : </label>
                                </td>
                                <td>
                                    <input class="sub_field_r" type="email" value="<?php echo $res['email']; ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="sub_labl">Mobile No. : </label>
                                </td>
                                <td>
                                    <input class="sub_field_r" type="tel" value="<?php echo $res['mobile_no']; ?>" readonly>
                                </td>
                            </tr>

                        </table>
                    </fieldset>
                </td>
            </tr>
            
            
        </table>
                        
                  
        
            
            
            
            
     
        <script>
            function on() {
                document.getElementById("overlay").style.display = "block";
            }


            function off() {
                document.getElementById("overlay").style.display = "none";
            }

        </script>
    </div>

<style>
    #r_a_p {
        height: 500px;
        overflow: scroll;
    }
    .product_box {
        background-color: lightblue;
        padding: 5px;
        border-radius: 5px;
        width: 80%;
        margin: 0 auto;
    
        
    }
    
    #p_table {
        width: 80%;
        margin: 0 auto;
        padding: 0;
    }
  
    #d_p_img {
     width: 100px; 
        border-radius: 50%;
        height: 100px;
        padding: 10px;
    }
    #d_p_name {
        padding: 15px;
        font-size: 20px;
        font-family: Helvetica;
        text-decoration: underline;
    }
    #d_p_category {
        float: right;
        position: relative;
        right: 20px;
    }
    .fa-tags {
        padding: 5px;
    }
    </style>


</body>

</html>

<?php
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
