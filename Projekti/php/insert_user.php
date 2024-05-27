
<?php
require 'database.php'; // Lidhja me bazën e të dhënave

// Funksioni për futjen e një përdoruesi të ri në bazën e të dhënave
function insertUser($conn, $full_name, $email, $password) {
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

   
    mysqli_stmt_bind_param($stmt, "sss", $full_name, $email, $$hashed_password);

   
    if (mysqli_stmt_execute($stmt)) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

insertUser($conn, 'fisi', 'fisi@gmail.com', '123456789');

mysqli_close($conn);
?>
