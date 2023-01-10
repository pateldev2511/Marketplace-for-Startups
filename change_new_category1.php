<?php
include("connection.php");
echo "  <table id='c_p_t' cellspacing='10px'>
          <tr>";
    $lim = $_GET['lim_c'];
$p_category = $_GET['cat'];

$next_lim = $lim + 4;

$sql = "SELECT * FROM $t3 WHERE p_category='$p_category'";
   $q = mysqli_query($con,$sql);
       $row = mysqli_num_rows($q);

if($row >= $next_lim)
{

 $sql = "SELECT * FROM $t3 WHERE p_category='$p_category' ORDER BY p_id DESC LIMIT $lim,$next_lim ";
              $q = mysqli_query($con,$sql);
       $row = mysqli_num_rows($q);

if($row >= 1)
{
    
    while($res = mysqli_fetch_assoc($q))
             {
              
              echo "<td id='c_p_r_td' width='25%'>
                  <a href='view_product_buyer.php?p_id=".$res['p_id']."'><img src='".$res['p_img']."' id='p_img'></a>
                  <br>
                  <p><a class='t_link' href='view_product_buyer.php?p_id=".$res['p_id']."'>".$res['p_name']."</a></p>
                  <p>Price : ".$res['p_price']."</p>
              </td>";
             }
}
}

           echo " 
          </tr>   
         </table>";
echo "<center>
          <img src='images/prev_btn.png' onclick='change_offer_category2();' id='next_btn' width='43px' heigth='43px'>
          <img src='images/next_btn.png' onclick='change_offer_category1();' id='next_btn' width='50px' heigth='60px'>
         </center>
          <input id='lim_c' type='hidden' value='$lim'>";

?>