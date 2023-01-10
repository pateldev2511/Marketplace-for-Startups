<?php
include("connection.php");
echo "  <table id='t_o_p_t' cellspacing='10px'>
          <tr>";
    $lim = $_GET['lim_o'];
$next_lim = $lim - 4;

$sql = "SELECT * FROM $t3";
   $q = mysqli_query($con,$sql);
       $row = mysqli_num_rows($q);
if($next_lim >= 0)
{


 $sql = "SELECT * FROM $t3 WHERE avail_offer='yes' ORDER BY p_offer DESC LIMIT $next_lim,$lim ";
              $q = mysqli_query($con,$sql);
              
             while($res = mysqli_fetch_assoc($q))
             {
              
              echo "<td id='t_o_p_r_td' width='25%'>
                 <a href='view_product_buyer.php?p_id=".$res['p_id']."'><img src='".$res['p_img']."' id='p_img'></a>
                  <br>
                  <p><a class='t_link' href='view_product_buyer.php?p_id=".$res['p_id']."'>".$res['p_name']."</a></p>
                    <p>Orignal Price : <del>".$res['p_price']."<del></p>
                  <P>Offer price : ".$res['p_orig_price']."</p>
                  <P><center>".$res['p_offer']." % off <center></p>
              </td>";
             }
}
             
           echo " 
          </tr>   
         </table>";
echo "<center>
          <img src='images/prev_btn.png' onclick='change_offer_products2();' id='next_btn' width='43px' heigth='43px'>
          <img src='images/next_btn.png' onclick='change_offer_products1();' id='next_btn' width='50px' heigth='60px'>
        
         </center>
          <input id='lim_o' type='hidden' value='$lim'>";

?>