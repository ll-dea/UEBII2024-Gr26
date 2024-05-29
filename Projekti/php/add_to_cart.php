<?php
session_start();


$items = [
    "tools" => [
        "Gloves" => ["price" => 10],
        "Pruning Shears" => ["price" => 15],
        "Loppers" => ["price" => 20],
        "Garden Fork" => ["price" => 18]
    ],
    "plants" => [
        "Snake Plant" => ["price" => 25],
        "ZZ Plant" => ["price" => 30],
        "Peace Lily" => ["price" => 22],
        "Pothos" => ["price" => 12]
    ],
    "decor" => [
        "Lighting" => ["price" => 50],
        "Garments" => ["price" => 8],
        "Shelf" => ["price" => 40],
        "Vertical Gardening" => ["price" => 50]
    ]
];

if (isset($_POST['category']) && isset($_POST['item'])) {
    $category = $_POST['category'];
    $item = $_POST['item'];

    if (isset($items[$category][$item])) {
        $_SESSION['cart'][$item] = $items[$category][$item];
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid item']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Category or item not provided']);
}
?>
