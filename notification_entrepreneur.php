<?php
include "connection.php";
session_start();

$un = $_SESSION['username'];

//echo "<h1>welcome...".$un."</h1>";






if(!$un)
{
  header("location:goto_login.php");  
}




$sql = "SELECT * FROM $t1 WHERE username='$un'";
$q = mysqli_query($con,$sql);

$res = mysqli_fetch_assoc($q);

$e_id = $res['e_id'];

 $sql = "UPDATE `notification_entrepreneurs` SET seen='YES' WHERE e_id='$e_id'";
                 $q = mysqli_query($con,$sql);





error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home | <?php echo $un; ?></title>
    <link rel="shortcut icon" href="images/logo.png">
    <!-- css files -->
    <link rel="stylesheet" href="common.css">
    
    <link rel="stylesheet" href="home_entrepreneur.css">
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fsonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
   
   <style>
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
        .common_btn_1 {
    background-color: #0088ff;
    font-family: verdana;
    font-size: 15px;
    color: white;
    height: 30px;
    border-radius: 10%;
    box-shadow: 1px 1px 1px red, 2px 2px 1.5px green, 3px 3px 2px blue;
    widows: auto;
            cursor: pointer;
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
                    <li><a href="home_entrepreneur.php">Home</a></li>
                    <li><a href="search_entrepreneur.php">Search</a></li>
                    <li><a href="add_new_product.php" >Add New Product</a></li>
                    <li><a href="notification_entrepreneur.php"  class="active1">Notifications</a></li>
                    <li><a href="pending_orders.php">Pending Orders</a></li>
                    <li><a href="profile_entrepreneur.php">My Profile</a></li>
                    <li><a href="logout.php">Log Out</a></li>
               
                </ul>


            </div>
        </center>
    </div>


<div id="main_container">
    <?php
    
    $sql = "SELECT * FROM $t1 WHERE username='$un'";
    $q = mysqli_query($con,$sql);
    $e_res = mysqli_fetch_assoc($q);
    
    $e_id = $e_res['e_id'];
   
    
    
    $sql = "SELECT * FROM `notification_entrepreneurs` WHERE e_id='$e_id' ORDER BY time DESC";
    $q = mysqli_query($con,$sql);
    $row = mysqli_num_rows($q);
    
    if($row == 0)
    {
     echo "<center> <h1>No New Notifications Yet...!!!</h1>"; 
        echo " <a href='home_buyer.php'><input type='button' value='Shop Now' class='common_btn_1'></a>
       
        
        <br><br>
                         </center>";
    }
    else {
      
    while($res = mysqli_fetch_assoc($q))
    {
 
         echo "<div id='product_container'>";
       
        
    echo "<h3>".$res['n_message']."</h3>";
        echo "<p><a class='s_link' href='pending_orders.php'>Click Here To Know More</a></p>
         <p align='right'>@ ".$res['time']."</p>";
          echo "</div>";
    }
    }
    ?>
</div>
<style>
    
    #product_container  {
        padding: 10px;
    }
    </style>
</body>

</html>