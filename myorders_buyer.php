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
    <title>Orders | <?php echo $un; ?></title>
    <link rel="shortcut icon" href="images/logo.png">
    <!-- css files -->
    <link rel="stylesheet" href="common.css">
    
    <link rel="stylesheet" href="home_buyer.css">
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fsonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
   <style>
  
       
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
           width: 60%;
           margin: 10px auto;
           background-color: aliceblue;
           border-radius: 5px;
           padding: 5px;
       }
       #product_container {
           background-color: aquamarine;
           width: 60%;
           margin: 10px auto;
           border-radius: 10px;
       }
       #product_table {
           padding: 20px;
           width: 100%;
       }
        .t_link {
           color: black;
           text-decoration: none;
           font-family: helvetica;
            font-weight: bold;
       }
        .s_link {
           color: blue;
           text-decoration: none;
           font-family: helvetica;
           
       }
   </style>
   <script>
    </script>
  
</head>

<body onload="set_int();">
   
   
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
                    <li><a href="myorders_buyer.php" class="active1"s>My Orders</a></li>
                    <li><a href="notification_buyer.php">Notifications</a></li>
                     <li><a href="services_buyer.php">Services</a></li>
                    <li><a href="profile_buyer.php">My Profile</a></li>
                    <li><a href="logout.php">Log Out</a></li>
               
                </ul>


            </div>
        </center>
    </div>

<div id="main_container">

   <?php
    
    $sql = "SELECT * FROM $t2 WHERE username='$un'";
    $q = mysqli_query($con,$sql);
    $res = mysqli_fetch_assoc($q);
    $b_id = $res['b_id'];
    
    $sql = "SELECT * FROM `purchases` WHERE b_id='$b_id' ORDER BY time DESC";
    $q = mysqli_query($con,$sql);
    $row = mysqli_num_rows($q);
    
    if($row == 0)
    {
     echo "<center> <h1>You Have Not Bought Product Till Now...!!!</h1>"; 
        echo " <a href='home_buyer.php'><input type='button' value='Shop Now' class='common_btn_1'></a><br><br>
                         </center>";
    }
    else {
         echo "<p align='right' style='padding:10px;'><span style='color:red;'>Total Products You Bought Till Now :</span> <b><span style='color:green;'>".$row."</span></b></p>";
    while($res = mysqli_fetch_assoc($q))
    {
     $pr_id = $res['p_id'];
         echo "<div id='product_container'>";
        echo "<table id='product_table'>";
        echo "<tr>";
        $sql2 = "SELECT * FROM $t3 WHERE p_id='$pr_id'";
        $q2 = mysqli_query($con,$sql2);
        while($res2 = mysqli_fetch_assoc($q2))
        {
           
            $e_id = $res2['e_id'];
        $sql3 = "SELECT * FROM $t1 WHERE e_id='$e_id'";
            $q3 = mysqli_query($con,$sql3);
            $res3 = mysqli_fetch_assoc($q3);
            
            $e_name = $res3['name'];
            
            
        echo "<td><a href='view_product_buyer.php?p_id=".$res['p_id']."' class='t_link'><img src='".$res2['p_img']."' width='100px' height='100px' style='border-radius:50%;'></a></td>";
          echo "<td><span><a href='view_product_buyer.php?p_id=".$res['p_id']."' class='t_link'><span style='font-size:20px;'>".$res2['p_name']."</span></a></span>
          <br><span>By <a class='s_link' href='view_profile.php?e_id=".$e_id."'>".$e_name."</span></span></td>";
            echo "<td width='20%'><i class='fas fa-tags' style='padding-right:5px;'></i>".$res2['p_category']."</td>";
            echo "<td></td>";
            echo "<tr><td colspan='4'><center><b>Quantity</b> : ".$res['p_quantity'];
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Total Price</b> : ".$res['p_price']."</center></td>";
            echo "</tr>";
            echo "<tr><td colspan='4'>
            <br>
            <b>Description : </b>
            ".$res2['p_desc']."
            </td></tr>";
            echo "<tr><td colspan='4'><br>
                         <center> <a href='view_product_buyer.php?p_id=".$res2['p_id']."'><input type='button' value='View Product' class='common_btn_1'></a>
                         </center><td></tr>";
        }
        echo "</tr>";
        echo "</table>";
          echo "</div>";
    }
    }
    
    ?>
   
    </div>


</body>

</html>