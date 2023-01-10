<?php
include("connection.php");
$state = $_GET['state'];
$sql = "select * from $cities where state_id = $state";
$q = mysqli_query($con,$sql);
echo "<select id='city_dd'  class='field'  name='city' required>";
while($res = mysqli_fetch_assoc($q))
{
    echo "<option value='".$res['id']."'>".$res['name']."</option>";
}

echo "</select>";

?>