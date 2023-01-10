<?php
session_start();
include "connection.php";
$o_id = $_GET['o_id'];
$un = $_SESSION['username'];
if(empty($o_id))
{
    header("location:goto_login.php");
}
else {
    if(!$un)
    {
         header("location:goto_login.php");
    }
   
}
$sql = "SELECT * FROM `purchases` WHERE o_id='$o_id'";
$q = mysqli_query($con,$sql);
$row = mysqli_num_rows($q);

if($row == 0)
{
    echo "<script>alert('Invalid Order...!!!');</script>";
    echo "<script>window.location.href='pending_orders.php';</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="shortcut icon" href="images/logo.png">
    <!-- css files -->
    <link rel="stylesheet" href="common.css">
   <link rel="stylesheet" href="profile_entrepreneur.css">

    <link rel="stylesheet" href="home_entrepreneur.css">
<!--    <link rel="stylesheet" href="view_product.css">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fsonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
 
<style>
    
    
    * {
    margin: 0;
    padding: 0;
}

html {
    scroll-behavior: smooth;
}
body {
    margin: 0;
    padding: 0;
}
#view_product_container {
    color: black;
    background-color: aliceblue;
    width: 60%;
    margin: 10px auto;
    padding: 20px;
    border-radius: 10px;
    
}

#product_table {
 
    width: 100%;
    
}
#main_img {
    width: 150px;
    height: 150px;
}
#p_title {
    font-family: cursive;
    font-size: 30px;
    padding-left: 20px;
}
#p_company {
    font-family: verdana;
    padding-left: 20px;
    
}
#c_name {
    font-family: cursive;
     text-decoration: underline;
}
.fa-tags {
    font-size: 20px;
}


.field_display {
    padding-left: 20px;
}
#p_desc {
    font-weight: bold;
 //   letter-spacing: 2px;
  font-family: verdana;
    margin:  0 0 2px 0;
    font-size: 20px;
}
#more_image {
    font-size: 20px;
    font-weight: bold;
    
}
.more_image {
    width: 100px;
    height: 100px;
}



#t_g_p_title {
    font-family: cursive;
    font-size: 20px;
    padding: 10px;
    letter-spacing: 2px;
    color:  white;
    
}

.t_g_p_sub_c {
    padding: 10px;
 background-color: aliceblue;
    text-align: center;
    margin: 20px;
    width: 15%;
    display: inline-block;
    float:left; 
    

}
.fa-times {
    font-size: 20px;
    cursor: pointer;
    padding: 20px;
    background-color: red;
  height: 15px;
    margin: 2px;
    border-radius: 50%;
}

    
    
    #top_grossing_products_container {
   
        position: absolute;
         width: 80%;
     
    margin: 10px 10%;
    background-color: azure;
    background: linear-gradient(black,white);
    height: auto;
    
}
    .s_link {
        color: black;
    }
    .common_btn {
        padding: 0 5px;
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
    
     #category_container {
 
    width: 95%;
    padding: 10px;
    overflow: hidden;
           background-color:burlywood;
           position: relative;
           margin: 10px auto;
}
       #category_title {
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
       #c_p_t {
           width: 90%;
           margin: 0 auto;
           
        
       }
    
       #c_p_r_td {
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
     .sub_labl {
        padding: 5px;
    }
     .sub_field {
            width: 300px;
              height: 40px;
              border-radius: 5%;
              font-size: 25px;
              margin: 5px;
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


<div id='navbar'>
        <center>
            <div id='navbar_container'>

                <ul>
                      <li><a href='home_entrepreneur.php'>Home</a></li>
                    <li><a href='search_entrepreneur.php'>Search</a></li>
                    <li><a href='add_new_product.php'>Add New Product</a></li>
                    <li><a href='notification_entrepreneur.php' >Notifications</a></li>
                    <li><a href='pending_orders.php'>Pending Orders</a></li>
                    <li><a href='profile_entrepreneur.php'>My Profile</a></li>
                    <li><a href='logout.php'>Log Out</a></li>
                </ul>


            </div>
        </center>
    </div>
        
        
    
   
   
    <div id="view_product_box">

        <?php
    $m_sql = "SELECT * FROM `purchases` WHERE o_id='$o_id'";
    $m_q = mysqli_query($con,$m_sql);
    $m_res = mysqli_fetch_assoc($m_q);
$b_id = $m_res['b_id'];
        $p_id = $m_res['p_id'];
        $e_id = $m_res['e_id'];
        /* Check For The Availibilty Of Product...*/
        
         $sql = "SELECT * FROM $t3 WHERE p_id='$p_id'";
    $q = mysqli_query($con,$sql);
    $res = mysqli_fetch_assoc($q);
       
       
   echo "<div id='view_product_container'>";
        echo "<form name='confirm' method='post'>";
    echo "<table id='product_table'>";
    echo "<tr>";
    echo "<td rowspan='3' align='center' width='20%'><img id='main_img' src='".$res['p_img']."' width='150px' height='150px'></td>";
    
    $e_id = $res['e_id'];
    
    $sql2 = "SELECT * FROM $t1 WHERE e_id='$e_id'";
    $q2 = mysqli_query($con,$sql2);
    $res2 = mysqli_fetch_assoc($q2);
    
    echo "<td align='left'><span id='p_title'>".$res['p_name']."</span><br><span id='p_company'>By <span id='c_name'><a href='view_profile.php?e_id=$e_id'>".$res2['username']."</a></span></span>";
//-----------
        
        $p_name = $res['p_name'];
       echo "<td width='20%' align='center'><i class='fas fa-tags'> </i>  ".$res['p_category']."</td>";
    echo "</tr>";
echo "<tr>";
       
      echo "</tr>";  
        
    echo "<tr>
    <td align='center'><span id='p_price'><b>Total Quantity</b> : ".$m_res['p_quantity']."</span> &nbsp;&nbsp;&nbsp;
    <span id='p_price'><b>Total Price</b> : ".$m_res['p_price']."</span></td>
    </tr>";
      
        $p_quantity = $m_res['p_quantity'];
        $p_price = $m_res['p_price'];
        
        echo "<tr>
        <td colspan='3'>
        <br>
        <span id='p_desc'>Description : </span><br><span='p_desc_c'>".$res['p_desc']."
        </span>
        </td></tr>";
         echo "<tr>
        <td colspan='3'>
        <br>
        <span id='more_image'>More Images About Product : </span><br><br><center><img class='more_image' src='".$res['p_img1']."'>
        <img class='more_image' src='".$res['p_img2']."'>
        <img class='more_image' src='".$res['p_img3']."'>
        </center>
        </td></tr>";
     
       $date = date('Y-m-d');
       
        
         echo "<tr>
        <td colspan='4'>
          <fieldset>
                        <legend class='leg_c'>Delivery Details : </legend>
                        <table name='personal_detail_container'>
                            <tr>
                                <td>
                                    <label class='sub_labl'>Set Delivery Date : </label>
                                </td>
                                <td>
                                    <input name='d_d' class='sub_field' type='date'  min='$date'>
                             </td>
                             </tr>
                             </table>
                            </fieldset><br>
                            </td></tr>";
    
        
        
        
        $sql = "SELECT * FROM $t2 WHERE b_id='$b_id'";
        $q = mysqli_query($con,$sql);
        $res= mysqli_fetch_assoc($q);
//--------------
        $b_name = $res['username'];
        $b_email = $res['email'];
        echo "<tr>
        <td colspan='4'>
          <fieldset>
                        <legend class='leg_c'>Order Details : </legend>
                        <table name='personal_detail_container'>
                            <tr>
                                <td>
                                    <label class='sub_labl'>Userame : </label>
                                </td>
                                <td>
                                    <input name='u_n' class='sub_field_r' type='text' value='".$res['username']."' readonly>
                                    
                                </td>
                            </tr>
                        
                            <tr>
                                <td>
                                    <label class='sub_labl'>Email : </label>
                                </td>
                                <td>
                                    <input name='email' class='sub_field_r' type='email'
                                    value='".$res['email']."' readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class='sub_labl'>Mobile No. : </label>
                                </td>
                                 <td>
                                    <input name='mobile_no' class='sub_field_r' type='tel'
                                    value='".$res['mobile_no']."' readonly>
                                </td>
                               
                            </tr>
                             <tr>
                                <td>
                                    <label class='sub_labl'>Delivery Address : </label>
                                </td>
                                 <td>
                                    <textarea name='address' class='sub_field_r s_f' readonly>
                                    ".$res['address']."</textarea>
                                </td>
                               
                            </tr>

                        </table>
                    </fieldset>
                    
        </td>
        
        </tr>";
         echo "<tr>
         <td colspan='3'>
         <br><br>
         
         <center><button class='common_btn' type='submit' name='confirm_btn'><span class='btn_title'>Confirm This Order</span></button></a>
        
         </center>
        
         </td>
        </tr>";
    
        echo " </form>";
    echo "</table>";
    echo "</div>";
    ?>
    </div>
<style>
    .s_f {
        width: 400px;
        height: 200px;
    }
    </style>
 
<br>
<br>


</body>

</html>





<?php

if(isset($_POST['confirm_btn']))
{
    
    $dd = $_POST['d_d'];

    date_default_timezone_set("Asia/Kolkata");
    $time = date('d-m-y h:i:s A');
   
    
    $sql = "INSERT INTO `orders`(o_id,e_id,b_id,p_id,p_quantity,p_price,delivery_date,time) VALUES('$o_id','$e_id','$b_id','$p_id','$p_quantity','$p_price','$dd','$time')";
    
    $q = mysqli_query($con,$sql);
    
    
  

    
    $old_date = date($dd);            
$old_date_timestamp = strtotime($old_date);
$new_date = date('d/m/Y', $old_date_timestamp);   
    
    $msg = "Hey ! $b_name , Your Order Of $p_name is Confirmed & Arrving On $new_date.";
    
    $seen = "NO";
    
    $sql = "INSERT INTO `notification_buyers`(b_id,n_message,time,seen) VALUES('$b_id','$msg','$time','$seen')";
    $q = mysqli_query($con,$sql);
    
    
    if($q)
    {
        
        
        
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
        $mail->addAddress($b_email);   
        $mail->isHTML(true); 
        $mail->Subject = 'ValueMart';
        $mail->Body    = 
        "<h2>Hey , $b_name </h2>
        <font style='font-family:cursive;'>$msg </b> <br>
        <b>Order Details Are As Following : </b><br>
        Product Name : ".$p_name."<br>
        Total Quantity : ".$p_quantity."<br>
        Total Price : ".$p_price."<br>
        <center><b>Thanks For Purchasing !</b></center>
        <p align='right'><i>Regards</i></p><p align='right'><b>-ValueMart.</b></p>";
           
                  
                    if(!$mail->send()) {
                        echo "<script>alert('Error In Sending Mail To Buyer...!!!');</script>";
                     
                    }
                    else {
                        
        
    echo "<script>alert('You Have Confirmed This Order Successfully...!!!');window.location.href='pending_orders.php';</script>";
    }
    }
    else {
        echo "<script>alert('Error In Confirming This Order...!!!');</script>";
    }
    
}


?>