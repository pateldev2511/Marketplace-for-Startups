<?php
include("connection.php");

    $country = $_GET['country'];


    $sql = "select * from $states where country_id = $country";
$q = mysqli_query($con,$sql);
echo "<select  class='field' id='state_dd'  name='state' onchange='change_state();' required value='all'>";
echo "<option value='all'>All States</option>";
while($res = mysqli_fetch_assoc($q))
{
    echo "<option value='".$res['id']."'>".$res['name']."</option>";
}

echo "</select>";
?>