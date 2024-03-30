<?php
session_start();

// Your items array
$items = [
    "Tools:" => [
        "Gloves" => 4,
        "Pruning Shears" => 3,
        "Loppers" => 6,
        "Garden Fork" => 7
    ],
    "Plants" => [
        "Snake Plant" => 9,
        "Pothos" => 13,
        "ZZ Plant" => 20,
        "Peace Lily" => 19
        
    ],
    "Decorations" => [
        "Lighting" => 18,
        "Garmets" => 47,
        "Shelf" => 31,
        "Vertical Gardening" => 13
        
    ]
];

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
