<?php
include "connection.php";
session_start();
$un = $_SESSION['username'];

$p_id = $_GET['p_id'];
//echo "<h1>welcome...".$un."</h1>";

if(!$un)
{
  header("location:goto_login.php");  
}
error_reporting(0);

$sql = "SELECT * FROM $t1 WHERE username='$un'";
$q = mysqli_query($con,$sql);
$r = mysqli_fetch_assoc($q);

$e_id = $r['e_id'];


$sql = "SELECT * FROM $t3 WHERE p_id='$p_id' AND e_id='$e_id'";
$q = mysqli_query($con,$sql);
$res = mysqli_fetch_assoc($q);

$p_name = $res['p_name'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product | <?php echo $p_name; ?></title>
        <link rel="shortcut icon" href="images/logo.png">
    <!-- css files -->
    <link rel="stylesheet" href="common.css">
    
    <link rel="stylesheet" href="home_entrepreneur.css">
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fsonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <link rel="stylesheet" href="view_product.css">
    <style>
    
    .field {
    height: 20px;
    padding: 5px;

    border-radius: 5px;
    margin: 5px 0;
    width: 200px;

}
.field_more {
    height: 70px;
    width: 500px;
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
                    <li><a href="pending_orders.php">Pending Orders</a></li>
                    <li><a href="profile_entrepreneur.php">My Profile</a></li>
                    <li><a href="logout.php">Log Out</a></li>
               
                </ul>


            </div>
        </center>
    </div>

<div id="view_product_box">

        <?php
    $sql = "SELECT * FROM $t3 WHERE p_id='$p_id'";
    $q = mysqli_query($con,$sql);
    $res = mysqli_fetch_assoc($q);
        $row = mysqli_num_rows($res);
//        if($row == 0)
//        {
//            header("location:goto_login.php");
//        }
//    else {
    echo "<form name='f1' method='post'>";
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
    echo "<tr><td><span class='field_display' id='p_price'>Price :<input type='number'name='p_price' min='0' id='p_price' class='field' value='".$res['p_price']."'></span></td>
    <td><span id='p_price'>Quantity : <input type='number' min='0' id='p_price' class='field' name='p_quantity' value='".$res['p_quantity']."'></span></td>
    </tr>";
        echo "<tr>
        <td colspan='3'>
        <br>
        <span>Description : </span><br><center><span='p_desc_c'><textarea rows='10' cols='100' class='field field_more' name='p_desc'>".$res['p_desc']."
        </textarea></span>
        </center>
        </td></tr>";
         echo "<tr>
        <td colspan='3'>
        <br>
        <span id='more_image'>More Images About Product : </span><br><br><center><img class='more_image' src='".$res['p_img1']."'>
        <img class='more_image' src='".$res['p_img2']."'>
        <img class='more_image' src='".$res['p_img3']."'>
        </center>
        </td></tr>";
        echo "<tr><td colspan='4'>
        <br>
                        <center><button class='common_btn' name='save_btn' type='submit'><span class='btn_title'>Save Changes</span></button></center>
        </td></td>";
    echo "</table>";
    echo "</div>";
    echo "</form>";
//    }
    ?>
    </div>

    
</body>
</html>




<?php

if(isset($_POST['save_btn']))
{
    
    $p_price = $_POST['p_price'];
    $p_quantity = $_POST['p_quantity'];
    $p_desc = $_POST['p_desc'];
    
    if($p_price == 0)
    {
        echo "<script>alert('Product Price Can't Be Zero !');</script>";
    }
    else if($p_desc == "")
    {
        echo "<script>alert('Please Describe The Product !');</script>";
        
    }
    else {
        $sql = "UPDATE $t3 SET p_price='$p_price',p_quantity='$p_quantity',p_desc='$p_desc' WHERE p_id='$p_id'";
        $q = mysqli_query($con,$sql);
        
        if($q)
        {
             echo "<script>alert('Product Details Are Successfully Updated !');</script>";
            echo "<script>window.location.href = '';</script>";
          //  header("location:edit_product.php?p_id=$p_id");
            
   
        }
        else {
            echo "<script>alert('Error In Updating Product Details !');</script>";
        }
    }
    
    
}


?>