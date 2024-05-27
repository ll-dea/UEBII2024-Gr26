<?php
require 'database.php'; 

// Funksioni për fshirjen e përdoruesit
function deleteUser($conn, $userId) {
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "i", $userId);

    if (mysqli_stmt_execute($stmt)) {
        echo mysqli_stmt_affected_rows($stmt) . " record(s) deleted successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

// Thirrja e funksionit për të fshirë përdoruesin me id 3
deleteUser($conn, 3);

mysqli_close($conn);
?>
