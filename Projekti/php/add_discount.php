<?php
session_start();

// Check if category and item are provided in the POST request
if(isset($_POST['category']) && isset($_POST['item'])) {
    // Retrieve category and item from the POST request
    $category = $_POST['category'];
    $item = $_POST['item'];

    // Get the discounted price for the item using getPriceByItem function
    $discountedPrice = getPriceByItem2($item);

    // If the discounted price is greater than 0, add the item to the cart session variable
    if($discountedPrice > 0) {
        $_SESSION['cart'][$category][$item] = $discountedPrice;
        // Redirect to the cart page
        header("Location: mycart.php");
        exit();
    } else {
        // Redirect with error if discounted price is not valid
        header("Location: discount.php?error=invalid_item");
        exit();
    }
} else {
    // Redirect with error if category or item is not set
    header("Location: discount.php?error=missing_data");
    exit();
}

// Function to get the discounted price for an item
function getPriceByItem2($item)
{
    // Define the original price for each item
    $originalPrices = [
        'Digging Set' => 100,
        // Add other items and their prices here
    ];

    // Check if the item exists in the originalPrices array
    if(isset($originalPrices[$item])) {
        // Calculate the discounted price (20% off)
        $discountedPrice = $originalPrices[$item] * 0.8;
        return $discountedPrice;
    } else {
        // Return 0 if the item is not found
        return 0;
    }
}
?>
