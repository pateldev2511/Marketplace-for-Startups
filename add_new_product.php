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
    <title>Add New Product |
        <?php echo $un; ?>
    </title>
    <link rel="shortcut icon" href="images/logo.png">
    <!-- css files -->
    <link rel="stylesheet" href="common.css">


    <link rel="stylesheet" href="common.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fsonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <script>


        function change_country()
          {
          
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.open("GET","add_ajax1.php?country="+document.getElementById("country_dd").value,false);
              xmlhttp.send(null);
              document.getElementById("state").innerHTML = xmlhttp.responseText;
              
              
              var val = document.getElementById("country_dd").value;
              if(val == "all")
                 {
                      document.getElementById("state_dd").value = "all";
                document.getElementById("city_dd").value = "all";
                
                    
                 }
          }

       function change_state()
          {
              
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.open("GET","add_ajax2.php?state="+document.getElementById("state_dd").value,false);
              xmlhttp.send(null);
              document.getElementById("city").innerHTML = xmlhttp.responseText;
                var val = document.getElementById("state_dd").value;
              if(val == "all")
                 {
            
                
                 document.getElementById("city_dd").value = "all";    
                 }
          }

        function yes()
       {
           document.getElementById("offer_box").style.display = "block";
       }
        function no()
       {
           document.getElementById("offer_box").style.display = "none";
          document.getElementById('textInput').value=0;
       }

      function updateTextInput(val) {
          document.getElementById('textInput').value=val; 
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
                    <li><a href="home_entrepreneur.php">Home</a></li>
                    <li><a href="search_entrepreneur.php">Search</a></li>
                    <li><a href="add_new_product.php" class="active1">Add New Product</a></li>
                    <li><a href="pending_orders.php">Pending Orders</a></li>
                    <li><a href="profile_entrepreneur.php">My Profile</a></li>
                    <li><a href="logout.php">Log Out</a></li>

                </ul>


            </div>
        </center>
    </div>
    <div id="main_container">
        <p id="main_title">Add New Product : </p>
        <hr>
        <br>

        <form name="add_product_form" method="post" enctype="multipart/form-data">


            <fieldset>
                <legend>Basic Details Of Product</legend>
                <table id="add_product_table">
                    <tr>
                        <td><label id="lab_con">Product Name : </label></td>
                        <td id="field_con"><input class="field" name="p_name" id="p_name" type="text"  ></td>
                    </tr>
                    <tr>
                        <td><label id="lab_con">Product Description : </label></td>
                        <td id="field_con"><textarea class="field_more" name="p_desc" id="p_desc" type="text"  ></textarea></td>
                    </tr>
                    <tr>
                        <td><label id="lab_con">Product Image : </label></td>
                        <td id="field_con"><input class="field" name="p_img" id="p_img" type="file" accept="image/*"  ></td>
                    </tr>
                    <tr>
                        <td><label id="lab_con">No. Of Quantities Avalilable : </label></td>
                        <td id="field_con"><input type="number" class="field" name="p_quantity" id="p_quantity"  ></td>
                    </tr>
                    <tr>
                        <td><label id="lab_con">Product Price : </label></td>
                        <td id="field_con"><input type="number" class="field" name="p_price" id="p_price"  ></td>
                    </tr>
                </table>
            </fieldset>
            <br>
            <fieldset>
                <legend>Selling Details Of Product</legend>
                <table id="add_product_tsable">
                    <tr>
                        <td><label id="lab_con">Select Product Category : </label></td>
                        <td id="field_con"><select class="field" name="p_category" id="p_category" type="text"  >
                                <option value="electronics">Electronics</option>
                                <option value="tools & machinary">Tools & Machinary</option>
                                <option value="home & kitchen">Home & Kitchen</option>
                                <option value="fashion">Fashion</option>
                                <option value="education">Education</option>
                                <option value="others">Others</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label id="lab_con">Select Selling Region (Country) : </label></td>
                        <td id="field_con">

                            <select class="field" id="country_dd" onchange="change_country();" name="country">

                                <option value="all">All Countries</option>
                                <?php 
                 $sql = "select * from $countries";
                $q = mysqli_query($con,$sql);
                while($res = mysqli_fetch_assoc($q))
                {
                 echo "<option value='".$res['id']."'>".$res['name']."</option>";
                }
                ?>
                            </select>

                        </td>

                    </tr>


                    <tr>
                        <td id="lab_con">

                            <label>Select Selling Region (State) : </label></td>

                        <td id="field_con">
                            <div id="state">
                                <select class="field" id="state_dd" onchange="change_state();" name="state" value="all"   disabled>
                                    <option value="all">All States</option>
                                </select>


                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td id="lab_con">
                            <label>Select Selling Region (City) : </label></td>

                        <td id="field_con">
                            <div id="city">
                                <select class="field" name="city" id="city_dd"   disabled value="all">
                                    <option value="all">All Cities</option>

                                </select>


                            </div>
                        </td>

                    </tr>

                    <tr>
                        <td><label id="lab_con">Do You Want To Apply Offers ? : </label></td>
                        <td id="field_con">
                            <input type="radio" class="field_readio" name="offer" id="offer_y" onclick="yes();" value="yes"  >Yes
                            <input type="radio" class="field_readio" name="offer" id="offer_n" value="no" onclick="no();"   checked>No
                            <br>
                            <div id="offer_box">
                                <br>


                                How Many Percent Do You Want To Give Discount ?
                                <br><br>
                                <input type="range" name="rangeInput" min="1" max="100" onchange="updateTextInput(this.value);">
                                <input type="text" id="textInput" value="" readonly class="field" name="p_offer">
                            </div>

                        </td>
                    </tr>
                </table>
            </fieldset>
            <br>
            <fieldset>
                <legend>Other Details : </legend>
                <table id="add_product_tsable">
                 <tr>
                        <td><label id="lab_con">Image 1 : </label></td>
                        <td id="field_con"><input class="field" name="p_img1" id="p_img1" type="file" accept="image/*"  ></td>
                    </tr>
                    <tr>
                        <td><label id="lab_con">Image 2 : </label></td>
                        <td id="field_con"><input class="field" name="p_img2" id="p_img2" type="file" accept="image/*"  ></td>
                    </tr>
                    <tr>
                        <td><label id="lab_con">Image 3 : </label></td>
                        <td id="field_con"><input class="field" name="p_img3" id="p_img3" type="file" accept="image/*"  ></td>
                    </tr>
                    </table>
            </fieldset>
            <tr>
                    <td id="btn_con" colspan="2">
                        <br>
                        <center><button class="common_btn" name="add_product_btn" type="submit"><span class='btn_title'>Add Product</span></button></center>
                        <br>
                    </td>
                </tr>
        </form>

    </div>

    <style>
        #main_container {
            background-color: aliceblue;
            width: 80%;
            margin: 10px auto;
        }

        #main_title {
            font-size: 30px;
            margin: 0;
            padding: 10px 0 0 10px;
        }

        #lab_con {
            font-family: verdana;
            font-size: 25px;
        }

        .field {
            width: 300px;
            height: 40px;
            border-radius: 5px;
            padding: 3px;
            font-size: 20px;
            margin-bottom: 10px;
        }

        textarea {
            width: 300px;
            height: 100px;
            resize: none;
        }

        .field_more {
            height: 80px;
            border-radius: 5px;
            padding: 3px;
            font-size: 20px;
        }

        #offer_box {
            display: none;
        }

        fieldset {
            width: 80%;
            margin: 0 auto;
        }

        legend {
            font-size: 20px;
            letter-spacing: 2px;
            text-shadow: 2px 2px 2px green;
        }

    </style>

</body>

</html>

<?php


if(isset($_POST['add_product_btn']))
{
    $p_name = $_POST['p_name'];
    $p_desc = $_POST['p_desc'];
       $main_path = "products/".$p_name.date('ymdhis');
        mkdir($main_path);  
    
        $p_i = $_FILES['p_img']['name'];
        $file_basename = substr($p_i, 0, strripos($p_i, '.'));
        $t_name = $_FILES['p_img']['tmp_name'];
        $temp = explode(".", $p_i);
        $extension = end($temp);
        $x = $file_basename.date('ymdhis').".".$extension;
        $path = $main_path."/".$x;
        move_uploaded_file($t_name,$path);
    
    $p_quantity = $_POST['p_quantity'];
    $p_price = $_POST['p_price'];
    $p_category = $_POST['p_category'];
    $p_country = $_POST['country'];
    $p_state = $_POST['state'];
    $p_city = $_POST['city'];
    $avil_offer = $_POST['offer'];
    $p_orig_price = $p_price;
    if($avil_offer == "yes")
    {
        $p_offer = $_POST['p_offer'];
        $temp= ($p_price * $p_offer) / 100;
        $p_orig_price = $p_price - $temp;
    }
    else {
        $p_offer = 0;
    }
    
  
    
    $img1_fname = $_FILES['p_img1']['name'];
    $file_basename1 = substr($img1_fname,0,stripos($img1_fname,"."));
    $t_name1 = $_FILES['p_img1']['tmp_name'];
    $temp1 = explode('.',$img1_fname);
    $extension1 = end($temp1);
    $p = $file_basename1.date('ymdhis').".".$extension;
    $path1 = $main_path."/".$p;
    move_uploaded_file($t_name1,$path1);
    
    $img1_fname = $_FILES['p_img2']['name'];
    $file_basename1 = substr($img1_fname,0,stripos($img1_fname,"."));
    $t_name1 = $_FILES['p_img2']['tmp_name'];
    $temp1 = explode('.',$img1_fname);
    $extension1 = end($temp1);
    $p = $file_basename1.date('ymdhis').".".$extension;
    $path2 = $main_path."/".$p;
    move_uploaded_file($t_name1,$path2);
    
    $img1_fname = $_FILES['p_img3']['name'];
    $file_basename1 = substr($img1_fname,0,stripos($img1_fname,"."));
    $t_name1 = $_FILES['p_img3']['tmp_name'];
    $temp1 = explode('.',$img1_fname);
    $extension1 = end($temp1);
    $p = $file_basename1.date('ymdhis').".".$extension;
    $path3 = $main_path."/".$p;
    move_uploaded_file($t_name1,$path3);
  $my_country = $p_country; 
    $my_state = $p_state; 
    $my_city = $p_city; 
    
    if($p_country == "all")
    {
        $p_state = "all";
        $p_city = "all";
    }
    else {
        $sql = "SELECT * from $countries WHERE id='$my_country'";
        $q = mysqli_query($con,$sql);
        $res = mysqli_fetch_assoc($q);
        $p_country = $res['name'];
        
        if($p_state == "all") {
     
        $sql = "SELECT * from $countries WHERE id='$my_country'";
        $q = mysqli_query($con,$sql);
        $res = mysqli_fetch_assoc($q);
        $p_country = $res['name'];
            $p_city = "all";
        }
        else {
            if($p_city == "all")
            {
                $sql = "SELECT * from $countries WHERE id='$my_country'";
                $q = mysqli_query($con,$sql);
                $res = mysqli_fetch_assoc($q);
                $p_country = $res['name'];
        
                $sql = "SELECT * from $states WHERE id='$my_state'";
                $q = mysqli_query($con,$sql);
                $res = mysqli_fetch_assoc($q);
                $p_state = $res['name'];
            }
            else {
                      
                $sql = "SELECT * from $countries WHERE id='$my_country'";
                $q = mysqli_query($con,$sql);
                $res = mysqli_fetch_assoc($q);
                $p_country = $res['name'];

                $sql = "SELECT * from $states WHERE id='$my_state'";
                $q = mysqli_query($con,$sql);
                $res = mysqli_fetch_assoc($q);
                $p_state = $res['name'];

                $sql = "SELECT * from $cities WHERE id='$my_city'";
                $q = mysqli_query($con,$sql);
                $res = mysqli_fetch_assoc($q);
                $p_city = $res['name']; 
            }
    
        }
    }
        
$sold = 0;
     $added_at = date('ymd');
    
    $sql = "SELECT * FROM $t1 WHERE username='$un'";
    $q = mysqli_query($con,$sql);
    
    $res = mysqli_fetch_assoc($q);

    $e_id = $res['e_id'];
    $sql = "INSERT INTO `products`(`e_id`, `p_name`, `p_desc`, `p_img`, `p_quantity`, `p_price`, `avail_offer`, `p_offer`, `p_orig_price`, `p_category`, `p_country`, `p_state`, `p_city`, `p_img1`, `p_img2`, `p_img3`, `main_path`,`added_at`,`sold`) VALUES ('$e_id','$p_name','$p_desc','$path','$p_quantity','$p_price','$avil_offer','$p_offer','$p_orig_price','$p_category','$p_country','$p_state','$p_city','$path1','$path2','$path3','$main_path','$added_at','$sold')";
    
    
    
    
    
    $q = mysqli_query($con,$sql);

    
    if($q)
    {
     echo "<script>alert('New Product Is Added...!!!');</script>";   
    }
    else {
        echo "<script>alert('New Product Is Not Added...!!!');</script>";   
    }
    
}

?>