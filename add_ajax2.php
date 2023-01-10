<?php
include("connection.php");
$state = $_GET['state'];
$sql = "select * from $cities where state_id = $state";
$q = mysqli_query($con,$sql);
echo "<select id='city_dd'  class='field'  name='city' required value='all'>";
echo "<option value='all'>All Cities</option>";
while($res = mysqli_fetch_assoc($q))
{
    echo "<option value='".$res['id']."'>".$res['name']."</option>";
}

echo "</select>";

?>