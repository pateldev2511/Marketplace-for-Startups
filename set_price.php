<?php
include("connection.php");

$q = $_GET['q'];
$p = $_GET['p'];
$p_id = $_GET['p_id'];

$sql = "SELECT * FROM $t3 WHERE p_id='$p_id'";
$qu = mysqli_query($con,$sql);
$res = mysqli_fetch_assoc($qu);

$quantity = $res['p_quantity'];
if($q > $quantity)
{
  echo "<p style='color:red'>Product Quantity Limit Exceeded...!!!</p>";  
    
}
else {
    $res = $p * $q;
  
echo "<input name='total_price' id='total_price' class='sub_field' type='number' value='".$res."' readonly>";

}


?>