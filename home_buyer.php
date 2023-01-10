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
    <title>Home | <?php echo $un; ?></title>
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
     
       #left_container {
           width: 70%;
/*           background-color: #0088ff;*/
           float: left;
           display: inline-block;
        
       }
      
       #right_container {
           width: 30%;
           background-color: aliceblue;
           float: left;
           display: inline-block;

           
       }
       #account_details_container {
           border: 10px solid #373e59;
           
       }
       #account_details_title {
           font-family: cursive;
           font-size: 25px;
           
           padding: 0;
           
       }
       #a_d_c_div {
           width: 100%;
           height: 35px;
           background-color: #373e59;
           color: aliceblue;
           letter-spacing: 2px;
           text-shadow: 1px 1px 1px aliceblue;
           padding: 5px;
           
       }
       .lab {
           font-family: monospace;
           font-size: 20px;
           font-weight: bold;
           letter-spacing: 2px;
           padding: 3px;
       }
       .p_value {
           font-size: 15px;
           
       }
#new_arrivals_container {
 
    width: 95%;
    padding: 10px;
    overflow: hidden;
           background-color: green;
           position: relative;
           margin: 10px auto;
}
       #new_arrivals_title {
           font-family: cursive;
           font-size: 30px;
           margin: 0;
           padding: 0;
       }
       #hr1 {
           margin: 0;
           padding: 0;
           width: 50%;
       }
       #n_a_p_t {
           width: 90%;
           margin: 0 auto;
           
        
       }
       #p_img {
           width: 150px;
           height: 150px;
           border-radius: 50%;
       }
       #n_a_p_r_td {
           background-color: aliceblue;
           text-align: center;
           overflow: hidden;
           
       }
       #next_btn {
           cursor: pointer;
           background-color: azure;
           width: 30px;
           height: 30px;
        
       }
        #prev_btn {
           cursor: pointer;
           background-color: azure;
            width: 30px;
            height: 30px;
        
       }
       #top_offers_container {
              width: 95%;
    padding: 10px;
    overflow: hidden;
           background-color: orange;
           position: relative;
           margin: 10px auto;
       }
        #top_offers_title {
           font-family: cursive;
           font-size: 30px;
           margin: 0;
           padding: 0;
       }
       #t_o_p_r_td {
           background-color: aliceblue;
           text-align: center;
           overflow: hidden;
           
       }
       
        #top_selling_container {
              width: 95%;
           padding: 10px;
    overflow: hidden;
           background-color: lightcoral;
           position: relative;
           margin: 10px auto;
       }
        #top_selling_title {
           font-family: cursive;
           font-size: 30px;
           margin: 0;
           padding: 0;
       }
       #t_s_p_r_td {
           background-color: aliceblue;
           text-align: center;
           overflow: hidden;
           
       }
       .s_link {
           text-decoration: none;
           color: black;
       }
       
   </style>
   <script>
    
     function change_new_arrivals1()
          {
          
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.open("GET","change_new_arrivals1.php?lim="+document.getElementById("lim").value,false);
              xmlhttp.send(null);
              document.getElementById("new_arrivals_product_container").innerHTML = xmlhttp.responseText;
          }
       function change_new_arrivals2()
          {
          
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.open("GET","change_new_arrivals2.php?lim="+document.getElementById("lim").value,false);
              xmlhttp.send(null);
              document.getElementById("new_arrivals_product_container").innerHTML = xmlhttp.responseText;
          }
       
         function change_offer_products1()
          {
          
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.open("GET","change_offer_products1.php?lim_o="+document.getElementById("lim_o").value,false);
              xmlhttp.send(null);
              document.getElementById("top_offers_product_container").innerHTML = xmlhttp.responseText;
          }
       function change_offer_products2()
          {
          
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.open("GET","change_offer_products2.php?lim_o="+document.getElementById("lim_o").value,false);
              xmlhttp.send(null);
              document.getElementById("top_offers_product_container").innerHTML = xmlhttp.responseText;
          }
       
       
        function change_top_selling1()
          {
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.open("GET","change_top_selling1.php?lim_t_o="+document.getElementById("lim_t_o").value,false);
              xmlhttp.send(null);
       document.getElementById("top_selling_product_container").innerHTML = xmlhttp.responseText;
          }
       function change_top_selling2()
          {
          
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.open("GET","change_top_selling2.php?lim_t_o="+document.getElementById("lim_t_o").value,false);
              xmlhttp.send(null);
              document.getElementById("top_selling_product_container").innerHTML = xmlhttp.responseText;
          }
       
       
       
//       function set_int(){
//           setInterval(change_new_arrivals1,2000);
//       }
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
                    <li><a href="home_buyer.php" class="active1">Home</a></li>
                    <li><a href="search_buyer.php">Search</a></li>
                    <li><a href="mycart_buyer.php">My Cart</a></li>
                    <li><a href="myorders_buyer.php" >My Orders</a></li>
                    <li><a href="notification_buyer.php">Notifications</a></li>
                     <li><a href="services_buyer.php">Services</a></li>
                    <li><a href="profile_buyer.php">My Profile</a></li>
                    <li><a href="logout.php">Log Out</a></li>
               
                </ul>


            </div>
        </center>
    </div>

<div id="main_container">

   <div id="left_container">
    <div id="new_arrivals_container">
        <p id="new_arrivals_title" class="main_c_title">New Arrivals @ ValueMart : </p>
        <hr id='hr1'>
       <br>
       <div id="new_arrivals_product_container">
         <table id='n_a_p_t' cellspacing='10px'>
          <tr>
            <?php
              $lim  = 4;
              $sql = "SELECT * FROM $t3 ORDER BY p_id DESC LIMIT $lim ";
              $q = mysqli_query($con,$sql);
              
             while($res = mysqli_fetch_assoc($q))
             {
              
              echo "<td id='n_a_p_r_td' width='25%'>
                  <a href='view_product_buyer.php?p_id=".$res['p_id']."'><img src='".$res['p_img']."' id='p_img'></a>
                  <br>
                  <p><a class='t_link' href='view_product_buyer.php?p_id=".$res['p_id']."'>".$res['p_name']."</a></p>
                  <p>Price : ".$res['p_price']."</p>
              </td>";
             }
            ?>
          </tr>   
         </table>
          <center>
          <img src="images/prev_btn.png" onclick="change_new_arrivals2();" id='prev_btn'>
          <img src="images/next_btn.png" onclick="change_new_arrivals1();" id='next_btn'>
        
         </center>
          <input id="lim" type="hidden" value="<?php echo $lim; ?>">
       </div>
       
    </div>
   
      <div id="top_offers_container">
        <p id="top_offers_title" class="main_c_title">Top Offers On The Products : </p>
        <hr id='hr1'>
       <br>
       <div id="top_offers_product_container">
         <table id='t_o_p_t' cellspacing='10px'>
          <tr>
            <?php
              $lim_o  = 4;
              $sql = "SELECT * FROM $t3 ORDER BY p_offer DESC LIMIT $lim_o ";
              $q = mysqli_query($con,$sql);
              
             while($res = mysqli_fetch_assoc($q))
             {
              
              echo "<td id='t_o_p_r_td' width='25%'>
                  <a href='view_product_buyer.php?p_id=".$res['p_id']."'><img src='".$res['p_img']."' id='p_img'></a>
                  <br>
                  <p><a class='t_link' href='view_product_buyer.php?p_id=".$res['p_id']."'>".$res['p_name']."</a></p>
                  <p>Orignal Price : <del>".$res['p_price']."<del></p>
                  <P>Offer price : ".$res['p_orig_price']."</p>
                  <P><center>".$res['p_offer']." % off <center></p>
              </td>";
             }
            ?>
          </tr>   
         </table>
          <center>
          <img src="images/prev_btn.png" onclick="change_offer_products2();" id='prev_btn'>
          <img src="images/next_btn.png" onclick="change_offer_products1();" id='next_btn'>
        
         </center>
          <input id="lim_o" type="hidden" value="<?php echo $lim_o; ?>">
       </div>
       
    </div>
    <div id="top_selling_container">
        <p id="top_selling_title" class="main_c_title">Top Selling Products : </p>
        <hr id='hr1'>
       <br>
       <div id="top_selling_product_container">
         <table id='t_s_p_t' cellspacing='10px'>
          <tr>
            <?php
              $lim  = 4;
              $sql = "SELECT * FROM $t3 ORDER BY sold DESC LIMIT $lim ";
              $q = mysqli_query($con,$sql);
              
             while($res = mysqli_fetch_assoc($q))
             {
              
              echo "<td id='t_s_p_r_td' width='25%'>
                  <a href='view_product_buyer.php?p_id=".$res['p_id']."'><img src='".$res['p_img']."' id='p_img'></a>
                  <br>
                  <p><a class='t_link' href='view_product_buyer.php?p_id=".$res['p_id']."'>".$res['p_name']."</a></p>
                  <p>price : ".$res['p_price']."</p>
              </td>";
             }
            ?>
          </tr>   
         </table>
          <center>
          <img src="images/prev_btn.png" onclick="change_top_selling2();" id='prev_btn'>
          <img src="images/next_btn.png" onclick="change_top_selling1();" id='next_btn'>
        
         </center>
          <input id="lim_t_o" type="hidden" value="<?php echo $lim; ?>">
       </div>
       
    </div>
   
    </div>
    <div id='r_c'>
     <div id="right_container">
        
        <div id="account_details_container">
            <div id="a_d_c_div">
             <span id="account_details_title">Account Details : </span>
             </div>
             <?php
            $sql = "SELECT * FROM $t2 WHERE username='$un'";
            $q = mysqli_query($con,$sql);
            $res = mysqli_fetch_assoc($q);
            
            
            
            ?>
             
             <center>
            <label class="lab">Username : </label>
            <span class="p_value"><?php echo $res['username'];   ?></span>
            <br><br>
            <label class="lab">Email : </label>
            <span class="p_value"><?php echo $res['email'];   ?></span>
            <br><br>
            <label class="lab">Mobile No. : </label>
            <span class="p_value"><?php echo $res['mobile_no'];   ?></span>
            <br><br>
            <label class="lab">Total Products Bought : </label>
            <?php
                 $b_id = $res['b_id'];
                 
                 $sql = "SELECT * FROM `purchases` WHERE b_id='$b_id'";
                 $q = mysqli_query($con,$sql);
                 $res = mysqli_num_rows($q);
                 
                 ?>
            <span class="p_value"><?php echo $res; ?></span>
            <br><br>
             <a href="profile_buyer.php"><button class="common_btn_1" type="button"><span class='btn_title'>Go To Profile</span></button></a>
             <br><br>
             </center>
        </div>
        
<br><br>
         <div id="account_details_container">
            <div id="a_d_c_div">
             <span id="account_details_title">Recently Purchased Products : </span>
             </div>
        
             
             <?php
                 
                  $sql = "SELECT * FROM `purchases` WHERE b_id='$b_id' ORDER BY time DESC";
                 $q = mysqli_query($con,$sql);
                 $row = mysqli_num_rows($q);
                 
                 if($row == 0)
                 {
                  echo "<center><br>No Products Are Purchased By You Till Now...!!!</center><br>";   
                 }
                 else {
                     $i = 1;
                     while($res = mysqli_fetch_assoc($q))
                     {
                         $p_id = $res['p_id'];
                         
                         
                         $sql2 = "SELECT * FROM $t3 WHERE p_id='$p_id'";
                         $q2 = mysqli_query($con,$sql2);
                         $res2 = mysqli_fetch_assoc($q2);
                         echo "<br>";
                         echo $i.") <span><b><a class='s_link' href='view_product_buyer.php?p_id=".$res2['p_id']."'>".$res2['p_name']."</a></b></span>"."<br>";
                         $i++;
                     }
                 }
                 
                 ?>
             
            <center><br>
             <a href="myorders_buyer.php"><button class="common_btn_1" type="button"><span class='btn_title'>Go To My Orders</span></button></a>
             <br><br>
             </center>
        </div>
        <br><br>
          <div id="account_details_container">
            <div id="a_d_c_div">
             <span id="account_details_title">Notifications : 
             
             <?php
                 
                 $sql = "SELECT * FROM `notification_buyers` WHERE b_id='$b_id' AND seen='NO'";
                 $q = mysqli_query($con,$sql);
                 
                 $row = mysqli_num_rows($q);
                 
                 if($row >= 1)
                 {
                  echo "<img src='images/new_gif.gif' width='50px' height='30px'>";   
                 }
                 
                 
                 ?>
             
            
             </span>
             </div>
             <center>
             <br>
            <?php
                 
                  $sql = "SELECT * FROM `notification_buyers` WHERE b_id='$b_id' ORDER BY time DESC";
                 $q = mysqli_query($con,$sql);
                 $row = mysqli_num_rows($q);
                 
                 if($row == 0)
                 {
                  echo "<center><br>No New Notifications Yet !</center><br>";   
                 }
                 else {
                     $i = 1;
                     while($res = mysqli_fetch_assoc($q))
                     {
                      
                         echo $i.") <span><b><a class='s_link' href='notification_buyer.php'>".$res['n_message']."</a></b></span>"."<br><br>";
                         $i++;
                     }
                 }
                 
                 ?>
           
           
      
             <a href="notification_buyer.php"><button class="common_btn_1" type="button"><span class='btn_title'>Go To Notifications</span></button></a>
             <br><br>
             </center>
        </div>
       
        
    </div>
    </div>
    </div>

<br>


</body>

</html>