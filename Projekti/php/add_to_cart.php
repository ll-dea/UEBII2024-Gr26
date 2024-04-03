<?php
include_once 'home.php';
include_once 'mycart.php';

session_start();

// Check if the item ID and quantity are provided
if(isset($_POST['item_id']) && isset($_POST['quantity'])) {
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];

    // Check if the item is already in the cart
    if(isset($_SESSION['cart'][$item_id])) {
        // If the item is already in the cart, update the quantity
        $_SESSION['cart'][$item_id] += $quantity;
    } else {
        // If the item is not in the cart, add it
        $_SESSION['cart'][$item_id] = $quantity;
    }

    // Respond with success
    http_response_code(200);
    exit;
} else {
    // Respond with error
    http_response_code(400);
    echo "Missing item ID or quantity";
    exit;
}
?>

