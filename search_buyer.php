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
    <title>Search |
        <?php echo $un; ?>
    </title>
    <link rel="shortcut icon" href="images/logo.png">
    <!-- css files -->
    <link rel="stylesheet" href="common.css">

    <link rel="stylesheet" href="home_entrepreneur.css">
    <link rel="stylesheet" href="search_entrepreneur.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <script>
   
var type = "";

        function change_p()
        {
           
         type = document.getElementById("filter_by").value;
            var x = document.getElementById("search_query");
            if(type == "p_n")
               {
               x.placeholder = "Enter Product Name...";
                    document.getElementById("range_container").style.display = "none";
               }
            if(type == "p_c")
               {
               x.placeholder = "Enter Product Category Name...";
                    document.getElementById("range_container").style.display = "none";
               }
            if(type == "p_r")
               {
               x.placeholder = "";
                   document.getElementById("range_container").style.display = "block";
               }
        }
        
        function search_product()
          {
          
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.open("GET","s_e_b_n.php?f_b="+document.getElementById("filter_by").value+"&val="+document.getElementById("search_query").value,false);
              xmlhttp.send(null);
              document.getElementById("search_result_container").innerHTML = xmlhttp.responseText;
              document.getElementById('search_result_container').style.display = 'block';
          }
        
        function set_range()
        {
            var xmlhttp = new XMLHttpRequest();
              xmlhttp.open("GET","s_e_b_n.php?f_b="+document.getElementById("filter_by").value+"&s_r="+document.getElementById("s_r").value+"&e_r="+document.getElementById("e_r").value,false);
              xmlhttp.send(null);
              document.getElementById("search_result_container").innerHTML = xmlhttp.responseText;
              document.getElementById('search_result_container').style.display = 'block';
            
            document.getElementById("e_r").min = document.getElementById("s_r").value;
            
        }
    
    </script>
    
<style>
    .common_btn_1 {
    background-color: #0088ff;
    font-family: verdana;
    font-size: 15px;
    color: white;
    height: 30px;
    border-radius: 10%;
    box-shadow: 1px 1px 1px red, 2px 2px 1.5px green, 3px 3px 2px blue;
        cursor: pointer;
}
    
    .field_s {
       height: 30px; 
    font-size: 20px;
        border-radius: 10px;
    }   
    
    #search_box {
   width: 80%;
    margin: 0 auto;
    
    padding: 30px;
    text-align: center;
}

#search_query {
    width: 40%;
    height: 50px;
    padding: 20px;
    border-radius: 20px;
    font-size: 20px;
    margin: 20px;
    transition: width 0.5s ease;
    border: none;
    outline: none;
}

#search_result_container {
    width: 60%;
    margin: 0 auto;
    background-color: aliceblue; 
    border-radius: 20px;
    padding: 20px;
    min-height: 400px;
   
    display: none;
  
}
#no_result_found {
    margin: 20px;
    text-align: center;
    font-size: 30px;
    font-family: cursive;

}
#yes_result_found {
    
    font-size: 20px;

}
#search_container {
    width: 60%;
    margin: 0 auto;
    background-color: aquamarine;
}

.product_box {
        background-color: lightblue;
        padding: 5px;
        border-radius: 5px;
  width: 80%;
        margin: 0 auto;
  overflow: hidden;
        
    }
    
    #p_table {
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


#search_query:focus {
    width: 80%;
}
    
    #total_title {
        float: right;
        color: red;
        display: inline;
    }
    
    
    #total_counter {
        color: green;
    }
    
    .field {
    height: 30px;
    padding: 5px;
    
    border-radius: 5px;
    margin: 5px 0;
    width: 300px;
    text-align: left;
    font-size: 20px;

}
    .labl {
        font-family: monospace;
        font-size: 20px;
    }
    #range_container {
        display:  none;
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
                     <li><a href="home_buyer.php">Home</a></li>
                    <li><a href="search_buyer.php" class="active1">Search</a></li>
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
    <div id="search_box">
        <span id='total_title'>Total Available Products : <span id='total_counter'>
                <?php
                $sql = "SELECT * FROM $t3";
                $q = mysqli_query($con,$sql);
                $rows = mysqli_num_rows($q);
                
                echo $rows;
                
                ?>
                
            </span></span>
            <br><br>
        <form name="search" method="post">
            <input id="search_query" type="search" name="search_query" placeholder="Enter Product Name..." onkeyup="search_product();">
           <select id='filter_by' class='field_s' onchange="change_p();">
               <option value=''>Filter By </option>
               <option value='p_n'>Product Name</option>
               <option value='p_c'>Product Category</option>
               <option value='p_r'>Product Price</option>
           </select>
           
           <div id="range_container" style='color:white;'>
             <br>
              <form name="search1" method="post">
               <label class='labl'>Enter Starting Range : </label>
               <input type='number' min="1" id='s_r' class="field" onkeyup='set_range();'>
               <br>
               <label class='labl'>Enter Ending Range : </label>
               <input type='number' min="1" id='e_r' class="field" onkeyup='set_range();'>
               </form>
           </div>
           
           
            <center>
               <br><br>
                <input type="button" id="search_btn" class="common_btn" name="search_btn" value="Search" onclick="search_product();">
            </center>
        </form>
    </div>

    <div id="search_result_container">
       
    </div>

</body>

</html>
