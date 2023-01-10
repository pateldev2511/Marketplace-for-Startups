<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        #x {
            color: aqua;
        }
        #t1 {
            width: 100%;
        }
    </style>
</head>

<body>
    

<?php
include "connection.php";
$sql = "select * from $t1";

$q = mysqli_query($con,$sql);
echo "<table border='1' id='t1'>";
    echo "<th>Name</th>";
    echo "<th>Company Name</th>";
    echo "<th>Address</th>";
    echo "<th>Company Address</th>";
    echo "<th>Date Of Birth</th>";
    echo "<th>Gender</th>";
    echo "<th>Username</th>";
    echo "<th>Password</th>";
    echo "<th>Mobile No.</th>";
    echo "<th>Email</th>";


while($res = mysqli_fetch_assoc($q))
{
    echo "<tr>";
    echo "<td id='x'>".$res['name']."</td>";
    echo "<td>".$res['company_name']."</td>";
    echo "<td>".$res['address']."</td>";
    echo "<td>".$res['company_address']."</td>";
    echo "<td>".$res['date_of_birth']."</td>";
    echo "<td>".$res['gender']."</td>";
    echo "<td>".$res['username']."</td>";
    echo "<td>".$res['password']."</td>";
    echo "<td>".$res['mobile_no']."</td>";
    echo "<td>".$res['email']."</td>";

    echo "</tr>";
    
}
echo "</table>";
?>
</body>
</html>