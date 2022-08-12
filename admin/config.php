<?php 
$host = "localhost";
$username = "root";
$password = "";
$database = "jewepe";

$conn = mysqli_connect($host,$username,$password,$database);
if (!$conn) {
    echo mysqli_error($conn);
}
?>