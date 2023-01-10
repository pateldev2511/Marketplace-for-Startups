<?php
include("connection.php");
$filter = $_GET['f_b'];


if($filter == "" || $filter == "p_n")
{
 $search = $_GET['val'];
    
    if(empty($search))
        {
         echo "<p id='no_result_found'>Please Enter Valid Product Name...!!!</p>";
         
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
                echo "<center><p id='yes_result_found'>Here Are The Results : </p></center>";
            while($res = mysqli_fetch_assoc($q))
            {
                
                 $p_name = str_ireplace($search, "<span style='background-color: yellow;'><b>$search</b></span>", $res['p_name']);
                
                echo "<div class='product_box'>";
                            echo "<table id='p_table' width='100%'>";
                            echo "<tr>";
                            echo "<td colspan='2' rowspan='2' width='20%' align='center'>";
                            echo "<img id='d_p_img' src='".$res['p_img']."' align='top' width='100px' height='100px'></td>";
                           echo "<td>".$p_name."</td>";
                            echo "<td width='15%'><i class='fas fa-tags'></i>".$res['p_category']."</td>";
                           
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td>Price : ".$res['p_price']."</td>";
                            echo "<td>Quantity : ".$res['p_quantity']."</td>";
                          
                            echo "</tr>";
                            echo "<tr>
                            <td colspan='4'>Description : ".$res['p_desc']."<br><br></td>
                            </tr>";
                           echo "<tr><td colspan='4'><center><form='view_form'>
                          <a href='view_product_buyer.php?p_id=".$res['p_id']."'><input type='button' value='View Product' class='common_btn_1'></a>
                            </form></center>";
                            echo " </td></tr>";
                           echo "</table>";
                            echo "</div><br>";
            }
          }
        }

    
}


if($filter == "p_c")
{
 $search = $_GET['val'];
    
    if(empty($search))
        {
         echo "<p id='no_result_found'>Please Enter Product Category  Name...!!!</p>";
         
        }
        else {
            echo "<script>document.getElementById('search_result_container').style.display = 'block';</script>";
            $sql = "SELECT * FROM $t3 WHERE p_category = '$search' OR p_category LIKE '$search%' OR p_category LIKE '%$search' OR p_category LIKE '%$search%' ORDER BY p_id DESC";
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
                $p_category = str_ireplace($search, "<span style='background-color: yellow;'><b>$search</b></span>", $res['p_category']);
                
                echo "<div class='product_box'>";
                            echo "<table id='p_table' width='100%'>";
                            echo "<tr>";
                            echo "<td colspan='2' rowspan='2' width='20%' align='center'>";
                            echo "<img id='d_p_img' src='".$res['p_img']."' align='top' width='100px' height='100px'></td>";
                           echo "<td>".$res['p_name']."</td>";
                            echo "<td width='15%'><i class='fas fa-tags'></i>".$p_category."</td>";
                           
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td>Price : ".$res['p_price']."</td>";
                            echo "<td>Quantity : ".$res['p_quantity']."</td>";
                          
                            echo "</tr>";
                            echo "<tr>
                            <td colspan='4'>Description : ".$res['p_desc']."<br><br></td>
                            </tr>";
                           echo "<tr><td colspan='4'><center><form='view_form'>
                          <a href='view_product_buyer.php?p_id=".$res['p_id']."'><input type='button' value='View Product' class='common_btn_1'></a>
                            </form></center>";
                            echo " </td></tr>";
                           echo "</table>";
                            echo "</div><br>";
            }
          }
        }
    

    
}



if($filter == "p_r")
{
    
    $s_r = $_GET['s_r'];
    $e_r = $_GET['e_r'];
    
   

    if(empty($s_r) || empty($e_r) || $s_r >= $e_r)
        {
         echo "<p id='no_result_found'>Please Enter Valid Range...!!!</p>";
         
        }
        else {
           
          if(isset($s_r) && isset($e_r)) 
          {
              
         
            echo "<script>document.getElementById('search_result_container').style.display = 'block';</script>";
            $sql = "SELECT * FROM $t3 WHERE p_price BETWEEN $s_r AND $e_r";
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
                
  
                
                echo "<div class='product_box'>";
                            echo "<table id='p_table' width='100%'>";
                            echo "<tr>";
                            echo "<td colspan='2' rowspan='2' width='20%' align='center'>";
                            echo "<img id='d_p_img' src='".$res['p_img']."' align='top' width='100px' height='100px'></td>";
                           echo "<td>".$res['p_name']."</td>";
                            echo "<td width='15%'><i class='fas fa-tags'></i>".$res['p_category']."</td>";
                           
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td>Price : ".$res['p_price']."</td>";
                            echo "<td>Quantity : ".$res['p_quantity']."</td>";
                          
                            echo "</tr>";
                            echo "<tr>
                            <td colspan='4'>Description : ".$res['p_desc']."<br><br></td>
                            </tr>";
                           echo "<tr><td colspan='4'><center><form='view_form'>
                          <a href='view_product_buyer.php?p_id=".$res['p_id']."'><input type='button' value='View Product' class='common_btn_1'></a>
                            </form></center>";
                            echo " </td></tr>";
                           echo "</table>";
                            echo "</div><br>";
            }
          }
              
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
