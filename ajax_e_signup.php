<?php
include("connection.php");

$name = $_GET['name'];
$org_name = $_GET['org_name'];

echo $name.$org_name;

?>