<?php 

$server = "127.0.0.1";
$username = "root";
$password = "";
$database = "review_system";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) { // If Check Connection
    die("<script>alert('Connection Failed.')</script>");
}

?>