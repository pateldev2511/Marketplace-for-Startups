<?php
include("connection.php");
echo " <table id='n_a_p_t' cellspacing='10px'>
          <tr>";
    $lim = $_GET['lim'];
$e_id = $_GET['e_id'];
$next_lim = $lim - 4;

$sql = "SELECT * FROM $t3";
   $q = mysqli_query($con,$sql);
       $row = mysqli_num_rows($q);
if($next_lim >= 0)
{


 $sql = "SELECT * FROM $t3 WHERE e_id='$e_id' ORDER BY p_id DESC LIMIT $next_lim,$lim ";
              $q = mysqli_query($con,$sql);
              
             while($res = mysqli_fetch_assoc($q))
             {
              
            echo "<td id='n_a_p_r_td' width='25%'>
                  <a href='view_product.php?p_id=".$res['p_id']."'><img src='".$res['p_img']."' id='p_img'></a>
                  <br>
                  <p><a class='t_link' href='view_product.php?p_id=".$res['p_id']."'>".$res['p_name']."</a></p>
                  <p>Price :".$res['p_price']."</p>
              </td>";
             }
}
             
           echo " 
          </tr>   
         </table>";
echo "<center>
          <img src='images/prev_btn.png' onclick='change_new_part1_en_2();' id='next_btn' width='43px' heigth='43px'>
          <img src='images/next_btn.png' onclick='change_new_part1_en_1();' id='next_btn' width='50px' heigth='60px'>
        
         </center>
          <input id='lim' type='hidden' value='$lim'>";

?>