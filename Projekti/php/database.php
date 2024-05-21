<?php
$hostName = "localhost";
$dbUser = "root";
$dbpassword = "043863808";
$dbName = "login_register";
$conn = mysqli_connect($hostName, $dbUser, $dbpassword, $dbName);

if(!$conn){
    die("Couldn't connect to database!");
}
?>