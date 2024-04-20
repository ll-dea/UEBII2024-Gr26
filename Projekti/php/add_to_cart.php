<?php
session_start();

// Your items array


if(isset($_POST['category']) && isset($_POST['item'])) {
    $category = $_POST['category'];
    $item = $_POST['item'];
    
    // Add the item to the cart session variable
    $_SESSION['cart'][$category][$item] = $items[$category][$item];
    
    // Return success response
    echo json_encode(['success' => true]);
} else {
    // Return error response if category or item is not set
    echo json_encode(['success' => false, 'error' => 'Category or item not provided']);
}
?>


