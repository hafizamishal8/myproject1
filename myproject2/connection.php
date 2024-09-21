<?php
$host = "localhost";
$mysqlusers ="root";
$password = "";
$dbname ="project2";
$conn = mysqli_connect($host,$mysqlusers, $password, $dbname);
if(!$conn){
    echo "Error: ".mysqli_connect_error();
}
// else{
//     echo "connection failed:";
// }

?>