<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";

try{
    $handle= new PDO("mysql:host=$servername;dbname=myDB", $username,$password);

    $handle->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
    echo "connected successfully";
}
catch(PDOException $e){
    die("Something Went Wrong With DataBase. Please Try Again Later");
}
?>