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
    <title>Profile |
        <?php echo $un; ?>
    </title>
    <link rel="shortcut icon" href="images/logo.png">
    <!-- css files -->
    <link rel="stylesheet" href="common.css">

    <link rel="stylesheet" href="profile_entrepreneur.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fsonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <script>
        function open_change_pp_box() {
        document.getElementById("change_pp_box").style.display = "block";
    }
     function close_change_pp_box() {
        document.getElementById("change_pp_box").style.display = "none";
    }  
    function open_change_bio_box() {
        document.getElementById("change_bio").style.display = "block";
    }
     function close_change_bio_box() {
        document.getElementById("change_bio").style.display = "none";
    }
    function refresh_1() {
        window.location.href="profile_entrepreneur.php";
        window.location.href="profile_entrepreneur.php";
    }
    </script>

    <style>
        .eqi_title {

    font-size: 20px;
    font-weight: 300;
    font-family: fantasy;
    letter-spacing: 2px;


}

#e_eqi {
    color: red;
    font-size: 30px;
    font-family: cursive;
    text-shadow: 1px 1px 1px green, 1.5px 1.5px 2px blue;
}

.slash_eqi {
    font-size: 30px;
}

#total {
    font-size: 35px;
}

.dont_know {
    font-size: 15px;
    letter-spacing: 1px;
}

.click_here {
    text-decoration: none;
    font-size: 12px;

    
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
                    <li><a href="add_new_product.php">Add New Product</a></li>
                    <li><a href="pending_orders.php">Pending Orders</a></li>
                    <li><a href="profile_entrepreneur.php" class="active1">My Profile</a></li>
                    <li><a href="logout.php">Log Out</a></li>

                </ul>


            </div>
        </center>
    </div>

    <div id="main">
        <p id="profile_title">Profile : </p>
        <hr>
        <?php
    $sql = "SELECT * FROM $t1 WHERE username='$un'";
    $q = mysqli_query($con,$sql);
    $res = mysqli_fetch_assoc($q);
    
    ?>
        <table id="profile_table_container" cellpadding="20px">
            <tr>
                <td align="center" class="l_border">

                    <center> <img src="<?php echo $res['profile_image']; ?>" id="profile_img">
                    </center>
                    <br>



                    <center><button class="common_btn_1" onclick="open_change_pp_box();on();">Change Profile Picture</button>
                    </center>

                    <div id="overlay">
                        <center>

                            <div id="change_pp_box">
                                <p id="close_con"><i class="fas fa-times" onclick="close_change_pp_box();off();"></i></p>
                                <br>
                                <p>Change Profile Picture : </p>

                                <form name="change_pp" enctype="multipart/form-data" method="post" action="profile_entrepreneur.php">
                                    <input class="field" type="file" accept="image/*" name="new_profile_image" required>
                                    <br>
                                    <a href="#"><input class="common_btn_1" type="submit" name="change_pp_btn" value="Change Profile Picture" onclick="refresh_1();"></a>

                                </form>
                            </div>

                        </center>
                    </div>
                    <?php
              if(isset($_POST['change_pp_btn']))
              {
                    $f_name = $_FILES['new_profile_image']['name'];
                    $file_basename = substr($f_name, 0, strripos($f_name, '.'));
                    $t_name = $_FILES['new_profile_image']['tmp_name'];
                    $t = explode(".", $f_name);
                  $extension = end($t);
                    $x = $file_basename.date('ymdhis').".".$extension;
                  $path = "profile_images/".$x;
                  move_uploaded_file($t_name,$path);
                      
                  
                  $sql2 = "SELECT * FROM $t1 WHERE username='$un'";
                  $q2 = mysqli_query($con,$sql);
                  $res2 = mysqli_fetch_assoc($q2);
                  
                  
                  $o_x = "default.png";
                 $o_path = "profile_images/".$o_x;
                  
                   if($res2['profile_image'] == $o_path)
                   {
                       
                   
                  
                      $sql2 = "UPDATE $t1 SET profile_image='$path' WHERE username='$un'";
                      $q2 = mysqli_query($con,$sql2);
                   }
                  else {
                      unlink($res2['profile_image']);
                       $sql2 = "UPDATE $t1 SET profile_image='$path' WHERE username='$un'";
                      $q2 = mysqli_query($con,$sql2);
                  }
                  
                  if($q2)
                  {
                     echo "<script>alert('Profile Picture Is Changed...!!!');</script>"; 
                       
                      
                     
                  }
                  else {
                     echo "<script>alert('Profile Picture Is Not Changed...!!!');</script>"; 
                      
                  }
                  echo "<script>refresh_1();</script>";
                  header("location:profile_entrepreneur.php");
                  
              }
              ?>
                </td>
                <td class="l_border">
                    <p class="labl">About : </p>
                    <?php
                echo "<span id='bio_span'>".$res['bio']."</span>";
                ?>
                    <br><br>
                    <button class="common_btn_1" type="button" onclick="open_change_bio_box();">Add Bio</button>
                    <br><br>
                    <div id="change_bio" onabort="close_change_bio_box();">
                        <form name='form_bio' method="post">
                            <center> <textarea class="field" name="new_bio" maxlength="200" rows="8" cols="40"><?php echo $res['bio']; ?></textarea>
                                <br>
                                <input class="common_btn_1" type="submit" name="change_bio_btn" value="Update My Bio" onclick="refresh_1();">
                            
                            </center>
                        </form>
                    </div>
                    <?php
            
                if(isset($_POST['change_bio_btn'])){
                   $n_b = $_POST['new_bio']; 
                      
                     $sql2 = "UPDATE $t1 SET bio='$n_b' WHERE username='$un'";
                      $q2 = mysqli_query($con,$sql2);
                    echo "<script>refresh_1();</script>"; 
                    
                }
            ?>
                </td>

                <td class="width_setter">
                    <p class="eqi_title" title="Entrepreneur Qualifying Inex"> Your EQI : </p>
                    <span id="e_eqi">9</span>
                    <span class="slash_eqi">/</span>
                    <span id="total">10</span>

                    <p class='dont_know'>Don't Know What Is EQI ?</p>
                    <p><a href="eqi.html" class="click_here">Click Here To Know More</a></p>
                </td>
            </tr>

            <tr>
                <td colspan="3">
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan="3" width="100%">
                    <fieldset>
                        <legend class="leg_c">Personal Details : </legend>
                        <table name="personal_detail_container">
                            <tr>
                                <td>
                                    <label class="sub_labl">Name : </label>
                                </td>
                                <td>
                                    <input class="sub_field_r" type="text" value="<?php echo $res['name']; ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="sub_labl">Company Name : </label>
                                </td>
                                <td>
                                    <input class="sub_field_r" type="text" value="<?php echo $res['company_name']; ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="sub_labl">
                                        Address :
                                    </label>
                                </td>
                                <td>
                                    <textarea class="field field_more" id="address" name="address"><?php echo $res['address']; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="sub_labl">
                                        Company Address :
                                    </label>
                                </td>
                                <td>
                                    <textarea class="field field_more" id="company_address" name="company_address"><?php echo $res['company_address']; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="sub_labl">Date Of Birth : </label>
                                </td>
                                <td>
                                    <input class="sub_field_r" type="date" value="<?php echo $res['date_of_birth']; ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="sub_labl">Gender : </label>
                                </td>
                                <td>
                                    <input type="radio" value="<?php echo $res['gender']; ?>" readonly checked>
                                    <?php echo $res['gender']; ?>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <fieldset>
                        <legend class="leg_c">Contact & Account Details : </legend>
                        <table name="personal_detail_container">
                            <tr>
                                <td>
                                    <label class="sub_labl">Userame : </label>
                                </td>
                                <td>
                                    <input class="sub_field_r" type="text" value="<?php echo $res['username']; ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="sub_labl">Password : </label>
                                </td>
                                <td>
                                    <input class="sub_field_r" type="password" value="<?php echo $res['password']; ?>" readonly>
                                    <a href="change_pass_entrepreneur1.php"><input type='button' value='Change Password' class='common_btn_1'></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="sub_labl">Email : </label>
                                </td>
                                <td>
                                    <input class="sub_field_r" type="email" value="<?php echo $res['email']; ?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="sub_labl">Mobile No. : </label>
                                </td>
                                <td>
                                    <input class="sub_field_r" type="tel" value="<?php echo $res['mobile_no']; ?>" readonly>
                                </td>
                            </tr>

                        </table>
                    </fieldset>
                </td>
            </tr>
            
            
            
              <td colspan="3">
                    <fieldset>
                        <legend class="leg_c">Recently Added Products By You : </legend>
                    <?php
                        
                     $sql = "SELECT * FROM $t1 WHERE username='$un'";
                        $q = mysqli_query($con,$sql);
                    $res = mysqli_fetch_assoc($q);
                        
                        $e_id = $res['e_id'];
                       // e_id='$e_id'
                        
                        $sql = "SELECT * FROM $t3 WHERE e_id='$e_id' ORDER BY p_id DESC";
                        $q = mysqli_query($con,$sql);
                    
                        $row = mysqli_num_rows($q);
                        
                        if($row == 0) 
                        {
                            echo "<center>No Prducts Are Added By You Till Now.</center>";
                        }
                        else {
                        echo "<div id='r_a_p'>";
                        while($res = mysqli_fetch_assoc($q))
                        {
                            
                          
                            echo "<div class='product_box'>";
                            echo "<table id='p_table'>";
                            echo "<tr>";
                            echo "<td colspan='2' rowspan='2'>";
                            echo "<img id='d_p_img' src='".$res['p_img']."' align='top'></td>";
                           echo "<td>".$res['p_name']."</td>";
                            echo "<td><i class='fas fa-tags'></i>".$res['p_category']."</td>";
                           
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td>Price : ".$res['p_price']."</td>";
                            echo "<td>Quantity : ".$res['p_quantity']."</td>";
                          
                            echo "</tr>";
                            echo "<tr>
                            <td colspan='4'>Description : ".$res['p_desc']."<br><br></td>
                            </tr>";
                            echo "<tr><td colspan='4'><center><form='view_form'>
                            <a href='edit_product.php?p_id=".$res['p_id']."'><input type='button' value='Edit Product' class='common_btn_1'></a>
                            <a href='view_product.php?p_id=".$res['p_id']."'><input type='button' value='View Product' class='common_btn_1'></a>
                            <a href='delete_product.php?p_id=".$res['p_id']."'><input type='button' value='Delete Product' class='common_btn_1'></a>
                            </form></center>";
                            echo " </td></tr>
                            </table>";
                            echo "</div><br>";
                        }
                        echo "</div>";
                        }
                        
                            
                        ?>
                        
                    </fieldset>
                </td>
        
            
            
            
            
        </table>
        <script>
            function on() {
                document.getElementById("overlay").style.display = "block";
            }


            function off() {
                document.getElementById("overlay").style.display = "none";
            }

        </script>
    </div>

<style>
    #r_a_p {
        height: 500px;
        overflow: scroll;
    }
    .product_box {
        background-color: lightblue;
        padding: 5px;
        border-radius: 5px;
        width: 80%;
        margin: 0 auto;
    
        
    }
    
    #p_table {
        width: 80%;
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
    </style>


</body>

</html>

<?php
//     $f_name = $_FILES['file']['name'];
//    $file_basename = substr($f_name, 0, strripos($f_name, '.'));
//   
//    $t_name = $_FILES['file']['tmp_name'];
//    $t = explode(".", $f_name);
//  $extension = end($t);
//    $x = $file_basename.date('ymdhis').".".$extension;
//  $path = "uploads/".$x;
//    move_uploaded_file($t_name,$path);
?>
