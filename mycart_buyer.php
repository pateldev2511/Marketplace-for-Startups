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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Cart | <?php echo $un; ?></title>
    <link rel="shortcut icon" href="images/logo.png">
    <!-- css files -->
    <link rel="stylesheet" href="common.css">
    
    <link rel="stylesheet" href="home_buyer.css">
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fsonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
   <style>
       .t_link {
           color: black;
           text-decoration: none;
           font-family: helvetica;
       }
       
       .main_c_title {
           
           color: white;
           margin: 2px;
           animation: t_s 3s infinite;
       }
       @keyframes t_s {
           0% {
             text-shadow: 1px 1px 2px red;  
           }
           25% {
               text-shadow: 1px 1px 2px yellow; 
           }
           50% {
               text-shadow: 1px 1px 2px blue; 
           }
           75% {
            text-shadow: 1px 1px 2px lawgreen;    
           }
           100% {
               text-shadow: 1px 1px 2px aliceblue; 
           }
       }
       
       .common_btn_1 {
    background-color: #0088ff;
    font-family: verdana;
    width: auto;
    font-size: 20px;
    color: white;
    height: 30px;
    border-radius: 5%;
    box-shadow: 1px 1px 1px red,2px 2px 1.5px green,3px 3px 2px blue;
}
.common_btn_1:hover {
    cursor: pointer;
    color: black;
}
       
#main_container {
    width: 80%;
    margin: 10px auto;
    background-color: aliceblue;
   
    
 
}
       #mycart_container {
           background-color: aliceblue;
           width: 60%;
           margin: 0 auto;
            border-radius: 10px;
       }
       
       #p_table {
           background-color: aquamarine;
           padding: 10px;
           border-radius: 10px;
       }
       
   </style>
   <script>
    
    
    </script>
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
                    <li><a href="mycart_buyer.php" class="active1">My Cart</a></li>
                    <li><a href="myorders_buyer.php" >My Orders</a></li>
                    <li><a href="notification_buyer.php">Notifications</a></li>
                     <li><a href="services_buyer.php">Services</a></li>
                    <li><a href="profile_buyer.php">My Profile</a></li>
                    <li><a href="logout.php">Log Out</a></li>
               
                </ul>


            </div>
        </center>
    </div>
    
<div id="mycart_container">
    <?php
    
    $sql = "SELECT * FROM $t2 WHERE username='$un'";
    $q = mysqli_query($con,$sql);
    $res = mysqli_fetch_assoc($q);
    
    $b_id = $res['b_id'];
    
      $sql = "SELECT * FROM `cart` WHERE b_id='$b_id' ORDER BY id DESC";
    $q = mysqli_query($con,$sql);
    
    $rows = mysqli_num_rows($q);
    if($rows == 0)
    {
        echo "<center><h1><br>No Products Are Added To Your Cart Till Now...</h1>";
        echo "<a href='home_buyer.php'><input type='button' value='Explore Now' class='common_btn_1'></a><br><br>
                         </center>";
    }
    else {
                echo "<p align='right' style='padding:10px;'><span style='color:red;'>Total Products Available In Your Cart :</span> <b><span style='color:green;'>".$rows."</span></b></p>";

    while($res = mysqli_fetch_assoc($q))
    {
    $p_id = $res['p_id'];
    
    $sql2 = "SELECT * FROM $t3 WHERE p_id='$p_id'";
    $q2 = mysqli_query($con,$sql2);
    
    $res2 = mysqli_fetch_assoc($q2);
        
        
        $sql3 = "SELECT * FROM $t3 WHERE p_id='$p_id'";
        $q3 = mysqli_query($con,$sql3);
        $res3 = mysqli_fetch_assoc($q3);
        $seller_id = $res3['e_id'];
       
        
        $sql4 = "SELECT * FROM $t1 WHERE e_id='$seller_id'";
        $q4 = mysqli_query($con,$sql4);
        $res4 = mysqli_fetch_assoc($q4);
        
        $seller = $res4['name'];
        $e_id = $res4['e_id'];
        
        echo "<div class='product_box'>";
        
                            echo "<table id='p_table' width='60%' style='margin: 0 auto;'>";
                            echo "<tr>";
                            echo "<td colspan='2' rowspan='2' width='20%' align='center'>";
                            echo "<img id='d_p_img' src='".$res2['p_img']."' align='top' width='100px' height='100px'></td>";
                           echo "<td>".$res2['p_name']."
                           <br>By <span id='c_name'><a href='view_profile.php?e_id=$e_id'>".$seller."</a></span></td>";
                            echo "<td width='15%' align='center'><i class='fas fa-tags'></i>".$res2['p_category']."</td>";
                           
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td>Price : ".$res2['p_price']."</td>";
                            echo "<td>Quantity : ".$res2['p_quantity']."</td>";
                          
                            echo "</tr>";
                            echo "<tr>
                            <td colspan='4'>Description : ".$res2['p_desc']."<br><br></td>
                            </tr>";
                           echo "<tr><td colspan='4'><center><form='view_form'>
                           <a href='remove_from_cart.php?p_id=".$res2['p_id']."'><input type='button' value='Remove From Cart' class='common_btn_1'></a> &nbsp;&nbsp;&nbsp;
                          <a href='view_product_buyer.php?p_id=".$res2['p_id']."'><input type='button' value='View Product' class='common_btn_1'></a>
                          &nbsp;&nbsp;&nbsp;
                          <a href='buy_product_buyer.php?p_id=".$res2['p_id']."'><input type='button' value='Buy Product' class='common_btn_1'></a>
                            </form></center>";
                            
        
                            echo " </td></tr>";
                           echo "</table>";
                            echo "</div><br>";
    }
    }
    ?>
  
</div>    
    </body>
    </html>
    