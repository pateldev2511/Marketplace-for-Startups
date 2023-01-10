<?php
include("connection.php");
$filter = $_GET['f_b'];


if($filter == "" || $filter == "e_n")
{
 $search = $_GET['val'];
    
    if(empty($search))
        {
         echo "<p id='no_result_found'>Please Enter Valid Entrepreneur's     Name...!!!</p>";
         
        }
        else {
           
            
            echo "<script>document.getElementById('search_result_container').style.display = 'block';</script>";
            $sql = "SELECT * FROM $t1 WHERE name = '$search' OR name LIKE '$search%' OR name LIKE '%$search' OR name LIKE '%$search%' ORDER BY e_id DESC";
            $q = mysqli_query($con,$sql);
            
            $row = mysqli_num_rows($q);
            
            if($row == 0)
            {
                echo "<p id='no_result_found'>Oops , No Search Results Found...</p>";
            }
            else {
                echo "<center><p id='yes_result_found'>Here Are The Results : </p></center>";
            while($res = mysqli_fetch_assoc($q))
            {
                $e_name = str_ireplace($search, "<span style='background-color: yellow;'><b>$search</b></span>", $res['name']);
              
                
                echo "<center>";
               
                            echo "<table id='p_table' width='60%' style='background-color: aquamarine;padding: 5px;border-radius:5px; margin: 5px;'>";
                            echo "<tr>";
                            echo "<td colspan='2' rowspan='2' align='center'>";
                            echo "<img id='d_p_img' src='".$res['profile_image']."' align='top' width='100px' height='100px' style='padding-right: 5px;'></td>";
                           echo "<td><span style='padding-bottom: 2px;'>".$e_name."</span>
                           <br><i class='fas fa-user'></i> 
                           ".$res['username']."</td>";
                            echo "<td width='20%'><i class='fas fa-building'></i> ".$res['company_name']."</td>";
                           
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td width='50%'><i class='far fa-envelope'></i> ".$res['email']."</td>";
                            echo "<td width='50%'><i class='fas fa-phone'></i> ".$res['mobile_no']."</td>";
                          
                            echo "</tr>";
                
                
                            echo "<tr>
                            <td colspan='4'>
                            <center>
                            Country : ".$res['country']."
                            &nbsp;&nbsp;&nbsp;
                            State : ".$res['state']."
                           &nbsp;&nbsp;&nbsp;
                            City : ".$res['city']."
                            </center>
                            </td>
                            </tr>";
                          
                         echo "<tr><td colspan='4'><center>
                         <br>
                         <form='view_form'>
                          <a href='view_profile.php?e_id=".$res['e_id']."'><input type='button' value='View Profile' class='common_btn_1'></a>
                            </form></center>";
                            echo " </td></tr>";
                
                           echo "</table>";
                echo "<center>";
                          
            }
          }
        }

    
}



if($filter == "e_un")
{
 $search = $_GET['val'];
    
    if(empty($search))
        {
         echo "<p id='no_result_found'>Please Enter Valid Entrepreneur's Username...!!!</p>";
         
        }
        else {
           
            
            echo "<script>document.getElementById('search_result_container').style.display = 'block';</script>";
            $sql = "SELECT * FROM $t1 WHERE username = '$search' OR username LIKE '$search%' OR username LIKE '%$search' OR username LIKE '%$search%' ORDER BY e_id DESC";
            $q = mysqli_query($con,$sql);
            
            $row = mysqli_num_rows($q);
            
            if($row == 0)
            {
                echo "<p id='no_result_found'>Oops , No Search Results Found...</p>";
            }
            else {
                echo "<center><p id='yes_result_found'>Here Are The Results : </p></center>";
            while($res = mysqli_fetch_assoc($q))
            {
                $e_u = str_ireplace($search, "<span style='background-color: yellow;'><b>$search</b></span>", $res['username']);
              
                
                echo "<center>";
               
                            echo "<table id='p_table' width='60%' style='background-color: aquamarine;padding: 5px;border-radius:5px; margin: 5px;'>";
                            echo "<tr>";
                            echo "<td colspan='2' rowspan='2' align='center'>";
                            echo "<img id='d_p_img' src='".$res['profile_image']."' align='top' width='100px' height='100px' style='padding-right: 5px;'></td>";
                           echo "<td><span style='padding-bottom: 2px;'>".$res['name']."</span>
                           <br><i class='fas fa-user'></i> 
                           ".$e_u."</td>";
                            echo "<td width='20%'><i class='fas fa-building'></i> ".$res['company_name']."</td>";
                           
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td width='50%'><i class='far fa-envelope'></i> ".$res['email']."</td>";
                            echo "<td width='50%'><i class='fas fa-phone'></i> ".$res['mobile_no']."</td>";
                          
                            echo "</tr>";
                
                
                            echo "<tr>
                            <td colspan='4'>
                            <center>
                            Country : ".$res['country']."
                            &nbsp;&nbsp;&nbsp;
                            State : ".$res['state']."
                           &nbsp;&nbsp;&nbsp;
                            City : ".$res['city']."
                            </center>
                            </td>
                            </tr>";
                          
                         echo "<tr><td colspan='4'><center>
                         <br>
                         <form='view_form'>
                          <a href='view_profile.php?e_id=".$res['e_id']."'><input type='button' value='View Profile' class='common_btn_1'></a>
                            </form></center>";
                            echo " </td></tr>";
                
                           echo "</table>";
                echo "<center>";
                          
            }
          }
        }

    
}

if($filter == "e_co")
{
 $search = $_GET['val'];
    
    if(empty($search))
        {
         echo "<p id='no_result_found'>Please Enter Valid Country Name...!!!</p>";
         
        }
        else {
           
            
            echo "<script>document.getElementById('search_result_container').style.display = 'block';</script>";
            $sql = "SELECT * FROM $t1 WHERE country = '$search' OR country LIKE '$search%' OR country LIKE '%$search' OR country LIKE '%$search%' ORDER BY e_id DESC";
            $q = mysqli_query($con,$sql);
            
            $row = mysqli_num_rows($q);
            
            if($row == 0)
            {
                echo "<p id='no_result_found'>Oops , No Search Results Found...</p>";
            }
            else {
                echo "<center><p id='yes_result_found'>Here Are The Results : </p></center>";
            while($res = mysqli_fetch_assoc($q))
            {
                $country = str_ireplace($search, "<span style='background-color: yellow;'><b>$search</b></span>", $res['country']);
              
                
                echo "<center>";
               
                            echo "<table id='p_table' width='60%' style='background-color: aquamarine;padding: 5px;border-radius:5px; margin: 5px;'>";
                            echo "<tr>";
                            echo "<td colspan='2' rowspan='2' align='center'>";
                            echo "<img id='d_p_img' src='".$res['profile_image']."' align='top' width='100px' height='100px' style='padding-right: 5px;'></td>";
                           echo "<td><span style='padding-bottom: 2px;'>".$res['name']."</span>
                           <br><i class='fas fa-user'></i> 
                           ".$res['username']."</td>";
                            echo "<td width='20%'><i class='fas fa-building'></i> ".$res['company_name']."</td>";
                           
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td width='50%'><i class='far fa-envelope'></i> ".$res['email']."</td>";
                            echo "<td width='50%'><i class='fas fa-phone'></i> ".$res['mobile_no']."</td>";
                          
                            echo "</tr>";
                
                
                            echo "<tr>
                            <td colspan='4'>
                            <center>
                            Country : ".$country."
                            &nbsp;&nbsp;&nbsp;
                            State : ".$res['state']."
                           &nbsp;&nbsp;&nbsp;
                            City : ".$res['city']."
                            </center>
                            </td>
                            </tr>";
                          
                         echo "<tr><td colspan='4'><center>
                         <br>
                         <form='view_form'>
                          <a href='view_profile.php?e_id=".$res['e_id']."'><input type='button' value='View Profile' class='common_btn_1'></a>
                            </form></center>";
                            echo " </td></tr>";
                
                           echo "</table>";
                echo "<center>";
                          
            }
          }
        }

    
}


if($filter == "e_s")
{
 $search = $_GET['val'];
    
    if(empty($search))
        {
         echo "<p id='no_result_found'>Please Enter Valid State Name...!!!</p>";
         
        }
        else {
           
            
            echo "<script>document.getElementById('search_result_container').style.display = 'block';</script>";
            $sql = "SELECT * FROM $t1 WHERE state = '$search' OR state LIKE '$search%' OR state LIKE '%$search' OR state LIKE '%$search%' ORDER BY e_id DESC";
            $q = mysqli_query($con,$sql);
            
            $row = mysqli_num_rows($q);
            
            if($row == 0)
            {
                echo "<p id='no_result_found'>Oops , No Search Results Found...</p>";
            }
            else {
                echo "<center><p id='yes_result_found'>Here Are The Results : </p></center>";
            while($res = mysqli_fetch_assoc($q))
            {
                $state = str_ireplace($search, "<span style='background-color: yellow;'><b>$search</b></span>", $res['state']);
              
                
                echo "<center>";
               
                            echo "<table id='p_table' width='60%' style='background-color: aquamarine;padding: 5px;border-radius:5px; margin: 5px;'>";
                            echo "<tr>";
                            echo "<td colspan='2' rowspan='2' align='center'>";
                            echo "<img id='d_p_img' src='".$res['profile_image']."' align='top' width='100px' height='100px' style='padding-right: 5px;'></td>";
                           echo "<td><span style='padding-bottom: 2px;'>".$res['name']."</span>
                           <br><i class='fas fa-user'></i> 
                           ".$res['username']."</td>";
                            echo "<td width='20%'><i class='fas fa-building'></i> ".$res['company_name']."</td>";
                           
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td width='50%'><i class='far fa-envelope'></i> ".$res['email']."</td>";
                            echo "<td width='50%'><i class='fas fa-phone'></i> ".$res['mobile_no']."</td>";
                          
                            echo "</tr>";
                
                
                            echo "<tr>
                            <td colspan='4'>
                            <center>
                            Country : ".$res['country']."
                            &nbsp;&nbsp;&nbsp;
                            State : ".$state."
                           &nbsp;&nbsp;&nbsp;
                            City : ".$res['city']."
                            </center>
                            </td>
                            </tr>";
                          
                         echo "<tr><td colspan='4'><center>
                         <br>
                         <form='view_form'>
                          <a href='view_profile.php?e_id=".$res['e_id']."'><input type='button' value='View Profile' class='common_btn_1'></a>
                            </form></center>";
                            echo " </td></tr>";
                
                           echo "</table>";
                echo "<center>";
                          
            }
          }
        }

    
}



if($filter == "e_ci")
{
 $search = $_GET['val'];
    
    if(empty($search))
        {
         echo "<p id='no_result_found'>Please Enter Valid City Name...!!!</p>";
         
        }
        else {
           
            
            echo "<script>document.getElementById('search_result_container').style.display = 'block';</script>";
            $sql = "SELECT * FROM $t1 WHERE city = '$search' OR city LIKE '$search%' OR city LIKE '%$search' OR city LIKE '%$search%' ORDER BY e_id DESC";
            $q = mysqli_query($con,$sql);
            
            $row = mysqli_num_rows($q);
            
            if($row == 0)
            {
                echo "<p id='no_result_found'>Oops , No Search Results Found...</p>";
            }
            else {
                echo "<center><p id='yes_result_found'>Here Are The Results : </p></center>";
            while($res = mysqli_fetch_assoc($q))
            {
                $city = str_ireplace($search, "<span style='background-color: yellow;'><b>$search</b></span>", $res['city']);
              
                
                echo "<center>";
               
                            echo "<table id='p_table' width='60%' style='background-color: aquamarine;padding: 5px;border-radius:5px; margin: 5px;'>";
                            echo "<tr>";
                            echo "<td colspan='2' rowspan='2' align='center'>";
                            echo "<img id='d_p_img' src='".$res['profile_image']."' align='top' width='100px' height='100px' style='padding-right: 5px;'></td>";
                           echo "<td><span style='padding-bottom: 2px;'>".$res['name']."</span>
                           <br><i class='fas fa-user'></i> 
                           ".$res['username']."</td>";
                            echo "<td width='20%'><i class='fas fa-building'></i> ".$res['company_name']."</td>";
                           
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td width='50%'><i class='far fa-envelope'></i> ".$res['email']."</td>";
                            echo "<td width='50%'><i class='fas fa-phone'></i> ".$res['mobile_no']."</td>";
                          
                            echo "</tr>";
                
                
                            echo "<tr>
                            <td colspan='4'>
                            <center>
                            Country : ".$res['country']."
                            &nbsp;&nbsp;&nbsp;
                            State : ".$res['state']."
                           &nbsp;&nbsp;&nbsp;
                            City : ".$city."
                            </center>
                            </td>
                            </tr>";
                          
                         echo "<tr><td colspan='4'><center>
                         <br>
                         <form='view_form'>
                          <a href='view_profile.php?e_id=".$res['e_id']."'><input type='button' value='View Profile' class='common_btn_1'></a>
                            </form></center>";
                            echo " </td></tr>";
                
                           echo "</table>";
                echo "<center>";
                          
            }
          }
        }

    
}


if($filter == "show_all")
{
 
            
            echo "<script>document.getElementById('search_result_container').style.display = 'block';</script>";
            $sql = "SELECT * FROM $t1 ORDER BY e_id DESC";
            $q = mysqli_query($con,$sql);
            
            $row = mysqli_num_rows($q);
            
            if($row == 0)
            {
                echo "<p id='no_result_found'>Oops , No Search Results Found...</p>";
            }
            else {
                echo "<center><p id='yes_result_found'>Here Are The Results : </p></center>";
            while($res = mysqli_fetch_assoc($q))
            {
              
                
                echo "<center>";
               
                            echo "<table id='p_table' width='60%' style='background-color: aquamarine;padding: 5px;border-radius:5px; margin: 5px;'>";
                            echo "<tr>";
                            echo "<td colspan='2' rowspan='2' align='center'>";
                            echo "<img id='d_p_img' src='".$res['profile_image']."' align='top' width='100px' height='100px' style='padding-right: 5px;'></td>";
                           echo "<td><span style='padding-bottom: 2px;'>".$res['name']."</span>
                           <br><i class='fas fa-user'></i> 
                           ".$res['username']."</td>";
                            echo "<td width='20%'><i class='fas fa-building'></i> ".$res['company_name']."</td>";
                           
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td width='50%'><i class='far fa-envelope'></i> ".$res['email']."</td>";
                            echo "<td width='50%'><i class='fas fa-phone'></i> ".$res['mobile_no']."</td>";
                          
                            echo "</tr>";
                
                
                            echo "<tr>
                            <td colspan='4'>
                            <center>
                            Country : ".$res['country']."
                            &nbsp;&nbsp;&nbsp;
                            State : ".$res['state']."
                           &nbsp;&nbsp;&nbsp;
                            City : ".$res['city']."
                            </center>
                            </td>
                            </tr>";
                          
                         echo "<tr><td colspan='4'><center>
                         <br>
                         <form='view_form'>
                          <a href='view_profile.php?e_id=".$res['e_id']."'><input type='button' value='View Profile' class='common_btn_1'></a>
                            </form></center>";
                            echo " </td></tr>";
                
                           echo "</table>";
                echo "<center>";
                          
            }
          }
}

    












?>










<!--
 if(isset($_POST['search_btn']))
    {
        $search = $_POST['search_query'];
        if(empty($search))
        {
         echo "<script>alert('Please Enter Product Name Or Search Name...');</script>";
            echo "<script>document.getElementById('search_result_container').style.display = 'none';</script>";
        }
        else {
            echo "<script>document.getElementById('search_result_container').style.display = 'block';</script>";
            $sql = "SELECT * FROM $t3 WHERE p_name = '$search' OR p_name LIKE '$search%' OR p_name LIKE '%$search' OR p_name LIKE '%$search%'";
            $q = mysqli_query($con,$sql);
            
            $row = mysqli_num_rows($q);
            
            if($row == 0)
            {
                echo "<p id='no_result_found'>Oops , No Search Results Found...</p>";
            }
            else {
                echo "<p id='yes_result_found'>Here Are The Results : </p>";
            while($res = mysqli_fetch_assoc($q))
            {
                echo "<div class='product_box'>";
                            echo "<table id='p_table'>";
                            echo "<tr>";
                            echo "<td colspan='2' rowspan='2'>";
                            echo "<img id='d_p_img' src='".$res['p_img']."' align='top' width='100px' height='100px'></td>";
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
                          <a href='view_product.php?p_id=".$res['p_id']."'><input type='button' value='View Product' class='common_btn_1'></a>
                            </form></center>";
                            echo " </td></tr>";
                           echo "</table>";
                            echo "</div><br>";
            }
          }
        }
    }-->
