<?php
session_start();
include "connection.php";
$p_id = $_GET['p_id'];

if(empty($p_id))
{
    header("location:goto_login.php");
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

    <link rel="stylesheet" href="home_entrepreneur.css">
    <link rel="stylesheet" href="view_product.css">
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
#not_logged_in_container {

    background-color: yellow;
    width: 90%;
    margin: 0 auto;
    position: sticky;
    bottom: 0;
    left: 5%;
    
    
}
#n_l_i_title {
    font-weight: bold;
    font-family: monospace;
    font-size: 30px;
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
 
    width: 80%;
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
 
    width: 80%;
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
    
    
    
    
    
    
    
    </style>
<script>
    function close_n_l_i_popup() {
        document.getElementById("not_logged_in_container").style.display = "none";
    }
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
    <?php
    
    

//echo "<h1>welcome...".$un."</h1>";
if(!(isset($_SESSION['username']) && $_SESSION['username'] != ''))
{
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
                    <li onclick='open_login_popup();'><a href='#'>Log In</a></li>
                </ul>


            </div>
        </center>
    </div>";
    }
    else {
           echo "<div id='navbar'>
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
    </div>";
    
    }

    ?>


   


   
   
   
   
    <div id="view_product_box">

        <?php
    $sql = "SELECT * FROM $t3 WHERE p_id='$p_id'";
    $q = mysqli_query($con,$sql);
    $res = mysqli_fetch_assoc($q);
       // $row = mysqli_num_rows($res);
//        if($row == 0)
//        {
//            header("location:goto_login.php");
//        }
//    else {
   echo "<div id='view_product_container'>";
    echo "<table id='product_table'>";
    echo "<tr>";
    echo "<td rowspan='3' align='center'><img id='main_img' src='".$res['p_img']."' width='150px' height='150px'></td>";
    
    $e_id = $res['e_id'];
    
    $sql2 = "SELECT * FROM $t1 WHERE e_id='$e_id'";
    $q2 = mysqli_query($con,$sql2);
    $res2 = mysqli_fetch_assoc($q2);
    
    echo "<td align='left'><span id='p_title'>".$res['p_name']."</span><br><span id='p_company'>By <span id='c_name'><a href='view_profile.php?e_id=$e_id'>".$res2['username']."</a></span></span>";

       echo "<td><i class='fas fa-tags'> </i>  ".$res['p_category']."</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td></td>";
    echo "</tr>";
    echo "<tr><td><span class='field_display' id='p_price'>Price : ".$res['p_price']."</span></td>
    <td><span id='p_price'>Quantity : ".$res['p_quantity']."</span></td>
    </tr>";
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
        
    echo "</table>";
    echo "</div>";
//    }
    ?>
    </div>


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
                  <a href='view_product.php?p_id=".$res['p_id']."'><img src='".$res['p_img']."' id='p_img'></a>
                  <br>
                  <p><a class='t_link' href='view_product.php?p_id=".$res['p_id']."'>".$res['p_name']."</a></p>
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
    <?php
       $sql = "SELECT * FROM $t3 WHERE p_id='$p_id'";
              $q = mysqli_query($con,$sql);
              
              $res = mysqli_fetch_assoc($q);
              $p_category = $res['p_category'];
    
    ?>s
    
 <div id="category_container">
        <p id="category_title" class="main_c_title">Top Products In <?php echo $p_category; ?> : </p>
        <input type="hidden" id="cat" value="<?php echo $p_category;  ?>">
        <hr id='hr1'>
       <br>
       <div id="category_product_container">
         <table id='c_p_t' cellspacing='10px'>
          <tr>
            <?php
            
              $sql = "SELECT * FROM $t3 WHERE p_category='$p_category' ORDER BY p_id DESC LIMIT 4 ";
              $q = mysqli_query($con,$sql);
              
             while($res = mysqli_fetch_assoc($q))
             {
              
              echo "<td id='c_p_r_td' width='25%'>
                  <a href='view_product_buyer.php?p_id=".$res['p_id']."'><img src='".$res['p_img']."' id='p_img'></a>
                  <br>
                  <p><a class='t_link' href='view_product_buyer.php?p_id=".$res['p_id']."'>".$res['p_name']."</a></p>
                  <p>Price : ".$res['p_price']."</p>
              </td>";
             }
            ?>
          </tr>   
         </table>
       
          <input id="lim_c" type="hidden" value="<?php echo $lim; ?>">
       </div>
       
    </div>
<br>
<br>

<?php
    if(!(isset($_SESSION['username']) && $_SESSION['username'] != ''))
    {
        echo "<div id='not_logged_in_container'>
   <p id='close_con'><i class='fas fa-times' onclick='close_n_l_i_popup();'></i></p>
    <span id='n_l_i_title'>Oops ,You Are Not Logged In.</span>
     
    <p>Hello ! You Are Not Courrently Logged In.</p>
    <p>We Recommend You To Please Log In To View More Aboot This Product...</p>
    <p>Thank You !</p>
</div>";
    }
    ?>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c6ec23d3ec3615d"></script>
</body>

</html>
