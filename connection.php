<?php

$host = "localhost";
$u = "root";
$p = "";
$db = "marketplace";

$con = mysqli_connect($host,$u,$p,$db);
$t1 = "entrepreneurs";
$t2 = "buyers";
$t3 = "products";
$countries = "countries";
$states = "states";
$cities = "cities";

if(!$con)
{
    echo "<script>alert('not connected to db...!!!');</script>";
}

?>