<?php 

$con = mysqli_connect("localhost:3306","root","Naren@03561","smartagriculture");
if(mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>