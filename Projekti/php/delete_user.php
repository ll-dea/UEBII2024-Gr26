<?php
require 'database.php'; 

// Funksioni për fshirjen e përdoruesit
function deleteUser($conn, $userId) {
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM users WHERE id = $userId";

    if (mysqli_query($conn, $sql)) {
        echo "User with ID $userId deleted successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

// Thirrja e funksionit për të fshirë përdoruesin me ID 7
//deleteUser($conn, 11);
?>
