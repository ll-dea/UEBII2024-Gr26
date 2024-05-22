<?php
$hostName = "localhost";
$dbUser = "root";
$dbpassword = "";
$dbName = "login_register";
$conn = mysqli_connect($hostName, $dbUser, $dbpassword, $dbName);

if(!$conn){
    die("Couldn't connect to database!");
}


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit(); // Ndalo ekzekutimin në rast gabimi
}
?>