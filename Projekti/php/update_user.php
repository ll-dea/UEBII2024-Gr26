<?php
require 'database.php'; 

// Funksioni për përditësimin e përdoruesit
function updateUser($conn, $newEmail, $userId) {
    $sql = "UPDATE users SET email = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "si", $newEmail, $userId);

    if (mysqli_stmt_execute($stmt)) {
        echo mysqli_stmt_affected_rows($stmt) . " record(s) updated successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}




?>