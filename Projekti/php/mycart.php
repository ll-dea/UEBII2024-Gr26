<?php
include_once 'add_to_cart.php';
session_start();

// Check if the cart is not empty
if(!empty($_SESSION['cart'])) {
    // Loop through each item in the cart
    foreach($_SESSION['cart'] as $item_id => $quantity) {
        echo "Item ID: $item_id - Quantity: $quantity<br>";
    }
} else {
    echo "Your cart is empty";
}
?>
