<?php
$hostName = "localhost";
$dbUser = "root";
$dbpassword = "";
$dbName = "login_register";
$conn = mysqli_connect($hostName, $dbUser, $dbpassword, $dbName);

if(!$conn){
    die("Couldn't connect to database!");
}

// Funksioni për krijimin e tabelës
function createTable($conn) {
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        full_name VARCHAR(128) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );";

    if (mysqli_query($conn, $sql)) {
        echo "Table users created successfully or already exists.";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }
}


?>

