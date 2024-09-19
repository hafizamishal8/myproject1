<?php

$host = "localhost";
$mysqlusers = "root";
$password = "";
$dbname = "myproject";

$conn = mysqli_connect($host,$mysqlusers,$password,$dbname);
if(!$conn){
    echo "connection failed" .mysqli_connect_error();
}
else{
    echo"successfully connect";
}
?>