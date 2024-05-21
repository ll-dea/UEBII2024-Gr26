<?php
$hostName = "localhost";
$dbUser = "root";
<<<<<<< Updated upstream
$dbpassword = "";
=======
$dbpassword = " ";
>>>>>>> Stashed changes
$dbName = "login_register";
$conn = mysqli_connect($hostName, $dbUser, $dbpassword, $dbName);

if(!$conn){
    die("Couldn't connect to database!");
}
?>