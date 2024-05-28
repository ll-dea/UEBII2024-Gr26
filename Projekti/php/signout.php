<?php
session_start();

// Function to unset session variable by name
function unsetSessionVar(&$varName) {
    unset($_SESSION[$varName]);
}

// Call the function to unset specific session variables
$var1 = 'user';
unsetSessionVar($var1);



// Destroy the session if needed
// session_destroy();

header("Location: ../index.php");
?>
