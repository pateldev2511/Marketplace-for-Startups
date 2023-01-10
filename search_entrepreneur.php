<?php
include "connection.php";
session_start();

$un = $_SESSION['username'];

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
   


        function search_product()
          {
          
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.open("GET","search_entrepreneur_ajax.php?pname="+document.getElementById("search_query").value,false);
              xmlhttp.send(null);
              document.getElementById("search_result_container").innerHTML = xmlhttp.responseText;
              document.getElementById('search_result_container').style.display = 'block';
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
                    <li><a href="search_entrepreneur.php" class="active1">Search</a></li>
                    <li><a href="add_new_product.php">Add New Product</a></li>
                    <li><a href="pending_orders.php">Pending Orders</a></li>
                    <li><a href="profile_entrepreneur.php">My Profile</a></li>
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
           
           
            <center>
                <input type="button" id="search_btn" class="common_btn" name="search_btn" value="Search" onclick="search_product();">
            </center>
        </form>
    </div>

    <div id="search_result_container">
       
    </div>

</body>

</html>
