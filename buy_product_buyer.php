<?php
include "connection.php";
session_start();

$un = $_SESSION['b_username'];
$p_id = $_GET['p_id'];
//echo "<h1>welcome...".$un."</h1>";

if(!$un)
{
  header("location:goto_login.php");  
}
else {
    if(empty($p_id))
    {
        header("location:home_buyer.php");
    }
}
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Buy Product | <?php echo $un; ?></title>
    <link rel="shortcut icon" href="images/logo.png">
    <!-- css files -->
    <link rel="stylesheet" href="common.css">
    
    <link rel="stylesheet" href="home_buyer.css">
   <link rel="stylesheet" href="profile_entrepreneur.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fsonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
   <style>
       #buy_product_container {
           width: 80%;
           margin: 0 auto;
           background-color: aliceblue;
       }
       
       
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
          .sub_field {
            width: 300px;
              height: 40px;
              border-radius: 5%;
              font-size: 25px;
              margin: 5px;
        }
       
   </style>
   <script>
     function set_price()
          {
          
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.open("GET","set_price.php?q="+document.getElementById("total_quantity").value+"&p="+document.getElementById("p_c").value+"&p_id="+document.getElementById("p_id").value,false);
              xmlhttp.send(null);
              document.getElementById("total_p").innerHTML = xmlhttp.responseText;
          }
    
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
    
    <div id="buy_product_container">
    <?php
 
  $sql = "SELECT * FROM $t3 WHERE p_id='$p_id'";
    $q = mysqli_query($con,$sql);
    $res = mysqli_fetch_assoc($q);

        
        /* Check For The Availibilty Of Product...*/
        
        $p_country = $res['p_country'];
        $p_state = $res['p_state'];
        $p_city = $res['p_city'];
        
        
       
        
        $m_sql = "SELECT * FROM $t2 WHERE username='$un'";
        $m_q = mysqli_query($con,$m_sql);
        $m_res = mysqli_fetch_assoc($m_q);
        

        
        $my_country = $m_res['country'];
        $my_state = $m_res['state'];
        $my_city = $m_res['city'];
        
        $avail = "false";
        
        if($p_country == "all")
        {
         $avail = "true";  
        }
        else {
            if($p_country == $my_country)
            {
                $avail = "true";
                if($p_state == "all")
                {
                    $avail = "true";
                }
                else {
                   if($p_state == $my_state)
                   {
                       $avail = "true";
                       if($p_city == "all")
                       {
                           $avail = "true";
                       }
                       else {
                           if($p_city == $my_city)
                           {
                               $avail = "true";
                           }
                           else {
                               $avail = "false";
                           }
                       }
                   }
                    else {
                        $avail = "false";
                    }
                }
            }
            else {
            $avail = "false";
            }
        }
        if($avail == "true")
        {
            $msg = "<span style='color:green;'>This Product Is Available For You.</span>";
        }
        else {
             $msg = "<span style='color:red;'>This Product Is Not Available For You.</span>";
        }
       
       echo "<form name='buy_product' method='post'>";
   echo "<div id='view_product_container'>";
    echo "<table id='product_table'>";
    echo "<tr>";
    echo "<td rowspan='3' align='center'><img id='main_img' src='".$res['p_img']."' width='150px' height='150px'></td>";
    
    $e_id = $res['e_id'];
    
    $sql2 = "SELECT * FROM $t1 WHERE e_id='$e_id'";
    $q2 = mysqli_query($con,$sql2);
    $res2 = mysqli_fetch_assoc($q2);
    
        $my_e_id = $e_id;
        
    echo "<td align='left'><span id='p_title'>".$res['p_name']."</span><br><span id='p_company'>By <span id='c_name'><a href='view_profile.php?e_id=$e_id'>".$res2['username']."</a></span></span>";

       echo "<td width='20%' align='center'><i class='fas fa-tags'> </i>  ".$res['p_category']."</td>";
    echo "</tr>";
echo "<tr>";
           if($avail == "true")
        {
               
             if($res['avail_offer'] == "yes")
             {
                
                 $offer_price = $res['p_orig_price'];
                 $offer_per = $res['p_offer']." %";
                 
                 echo "<tr><td><span class='field_display' id='p_price'>Price : <del>".$res['p_price']."</del></span>
                 <br>
                 <span class='field_display' id='p_price'>Offer Price : <b>".$offer_price."</b></span>
                 <span class='field_display' id='p_price'>( ".$offer_per." Off)</span>
                 </td>";
             }
               else {
                echo "<tr><td><span class='field_display' id='p_price'>Price : ".$res['p_price']."</span></td>";   
               }
           
       
        }
        else {
            echo "<tr><td><span class='field_display' id='p_price'>Price : ".$res['p_price']."</span></td>";
        }
      echo "</tr>";  
    
    echo "<tr><td width='20%' align='right' colspan='3'><span id='p_price'>Available Quantity : ".$res['p_quantity']."</span></td>
    </tr>";
        echo "<tr>
        <td colspan='3'>
        <center>$msg</center>
        </td></tr>";
      
        
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
        if($avail == "true")
        {
       
            $qu = 1;
             echo "<tr>";
            echo " <td colspan='3' align='center'>
            <br>
                    <fieldset>
                        <legend class='leg_c'>Order Details : </legend>
                        <table name='personal_detail_container'>
                            <tr>
                                <td>
                                    <label class='sub_labl'>Quantity : </label>
                                    
                                </td>
                                <td>
                                    <input id='total_quantity' class='sub_field' type='number' min='1' max='".$res['p_quantity']."' value='".$qu."'  onchange='set_price();' name='total_quantity'>
                                    <input type='hidden' id='p_c' value='".$res['p_orig_price']."'>
                                    <input type='hidden' id='p_id' value='".$res['p_id']."'>
                                </td>
                            </tr>
                        
                         <tr>
                                <td>
                                    <label class='sub_labl'>Total Price : </label>
                                    
                                </td>
                                <td>
                                <div id='total_p'>
                                    <input name='total_price' id='total_price' class='sub_field' type='number' value='".$res['p_orig_price']."' readonly>
                                    </div>
                                </td>
                            </tr>
                        
                           

                        </table>
                    </fieldset>
                </td>";
            echo "</tr>";
            
            echo "<tr>";
            echo " <td colspan='3' align='center' id='a_d'>
            <br><br>
                    <fieldset>
                        <legend class='leg_c'>Account Details : </legend>
                        <table name='personal_detail_container'>
                            <tr>
                                <td>
                                    <label class='sub_labl'>Userame : </label>
                                </td>
                                <td>
                                    <input name='u_n' class='sub_field_r' type='text' value='".$m_res['username']."' readonly>
                                </td>
                            </tr>
                        
                            <tr>
                                <td>
                                    <label class='sub_labl'>Email : </label>
                                </td>
                                <td>
                                    <input name='email' class='sub_field_r' type='email'
                                    value='".$m_res['email']."' readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class='sub_labl'>Mobile No. : </label>
                                </td>
                                 <td>
                                    <input name='mobile_no' class='sub_field_r' type='tel'
                                    value='".$m_res['mobile_no']."' readonly>
                                </td>
                               
                            </tr>
                             <tr>
                                <td>
                                    <label class='sub_labl'>Delivery Address : </label>
                                </td>
                                 <td>
                                    <textarea name='address' class='sub_field_r s_f' readonly>
                                    ".$m_res['address']."</textarea>
                                </td>
                               
                            </tr>

                        </table>
                    </fieldset>
                </td>";
            echo "</tr>";
             echo "<tr>
         <td colspan='3'>
         <br>
        <center>
         <button class='common_btn' type='submit' name='buy_btn'><span class='btn_title'>Place An Order</span></button></a>
         </center>
         </td>
        </tr>";
            
           
        }
        
    echo "</table>";
    echo "</div>";
        echo "</form>";
        
        ?>
    </div>
    <style>
       
        .s_f {
            width: 300px;
            height: 100px;
        }
    </style>
    
    
    </body>
    </html>
    
<?php
if(isset($_POST['buy_btn']))
{
    $p_quantity = $_POST['total_quantity'];
    $p_price = $_POST['total_price'];    

    
    
    $sql = "SELECT * FROM $t2 WHERE username='$un'";
    $q = mysqli_query($con,$sql);
    $res = mysqli_fetch_assoc($q);
    
        $u_n = $res['username'];
    $email = $res['email'];
    $mobile_no = $res['mobile_no'];
    $address = $res['address'];
    
    
    $sql = "SELECT * FROM $t3 WHERE p_id='$p_id'";
    $q = mysqli_query($con,$sql);
    $res = mysqli_fetch_assoc($q);
    
    $quantity = $res['p_quantity'];
    $sold = $res['sold'];
    
    if($p_quantity > $quantity)
    {
        echo "<script>alert('Product Quantity Should Be Less Than $quantity.');</script>";
    }
    else {    
 
    
    
    $o_id = uniqid();
 
         $sql = "SELECT * FROM $t2 WHERE username='$un'";
    $q = mysqli_query($con,$sql);
    $res = mysqli_fetch_assoc($q);
        
    $b_id = $res['b_id'];
    
date_default_timezone_set("Asia/Kolkata");
    $time = date('d-m-y h:i:sA');
   
    
    $sql = "INSERT INTO `purchases`(o_id,e_id,b_id,p_id,p_quantity,p_price,time) VALUES('$o_id','$e_id','$b_id','$p_id','$p_quantity','$p_price','$time')";
    
  
    $q = mysqli_query($con,$sql);
        
        $avail_q = $quantity - $p_quantity;
        $sold = $sold + $p_quantity;
        $sql = "UPDATE $t3 SET p_quantity='$avail_q',sold='$sold' WHERE p_id='$p_id'";
        $q = mysqli_query($con,$sql);
    if($q)
    {
        $sql = "SELECT * FROM $t2 WHERE b_id='$b_id'";
        $q = mysqli_query($con,$sql);
        $res = mysqli_fetch_assoc($q);
        
     
        
        
        $sql = "SELECT * FROM $t3 WHERE p_id='$p_id'";
        $q = mysqli_query($con,$sql);
        $res = mysqli_fetch_assoc($q);
        
      
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
        <font style='font-family:cursive;'>Your Order Placed Succesfully...!!! </b> <br>
        <b>Order Details Are As Following : </b><br>
        Product Name : ".$res['p_name']."<br>
        Total Quantity : ".$p_quantity."<br>
        Total Price : ".$p_price."<br>
        
        <p align='right'><i>Regards</i></p><p align='right'><b>-ValueMart.</b></p>";
           
                  
                    if(!$mail->send()) {
                        echo "<script>alert('Error In Sending Mail To Buyer...!!!');</script>";
                     
                    }
                    else {
                        
                    
                        
                        $sql_1 = "SELECT * FROM $t1 WHERE e_id='$e_id'";
                        $q_1 = mysqli_query($con,$sql_1);
                        $res_1 = mysqli_fetch_assoc($q_1);
                        $email = $res_1['email'];
                          $e_un = $res_1['username'];
                        
                            $sql = "SELECT * FROM $t3 WHERE p_id='$p_id'";
        $q = mysqli_query($con,$sql);
        $res = mysqli_fetch_assoc($q);
                        
                        
                         $sql2 = "SELECT * FROM $t2 WHERE b_id='$b_id'";
        $q2 = mysqli_query($con,$sql2);
        $res2 = mysqli_fetch_assoc($q2);
        
     
        
                        
                        
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
                        "<h2>Hey , ".$res_1['username']." </h2>
                        <font style='font-family:cursive;'>You Got A New Order From  </b>".$res2['username']." <br>
                        <b>Order Details Are As Following : </b><br>
                        Product Name : ".$res['p_name']."<br>
                        Total Quantity : ".$p_quantity."<br>
                        Total Price : ".$p_price."<br>
                        
                        <br>
                        <b>From :</b><br>
                        Username : ".$res2['username']."<br>
                        Email : ".$res2['email']."<br>
                        Mobile No. : ".$res2['mobile_no']."<br>

                        <p align='right'><i>Regards</i></p><p align='right'><b>-ValueMart.</b></p>";  
                        
                         if(!$mail->send()) {
                        echo "<script>alert('Error In Sending Mail To Entrepreneur...!!!');</script>";
                     
                        }
                        else {
                        
                            
                            
                        
                         $notification = "Hey ".$e_un." , You Got A New Order From ".$res2['username'];
                          //  echo "<script>alert('$notification');</script>";
                            
                            $seen = "NO";
                            $sql = "INSERT INTO `notification_entrepreneurs`(e_id,n_message,time,seen) VALUES('$my_e_id','$notification','$time','$seen')";
                            $q = mysqli_query($con,$sql);
                            
                            if($q)
                            echo "<script>alert('Order Placed Successfully...!!!');
                        window.location.href='myorders_buyer.php';</script>";
                            else {
                                echo "<script>alert('Order Is Not Placed...!!!');</script>";
                            }
                            
                    }
                    }
    }
    }

   
}

?>
    