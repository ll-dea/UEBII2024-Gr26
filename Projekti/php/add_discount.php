
<?php
session_start();

if(isset($_POST['category']) && isset($_POST['item'])) {
    $category = $_POST['category'];
    $item = $_POST['item'];

    $discountedPrice = getPriceByItem2($item);

    if($discountedPrice > 0) {
        $_SESSION['cart'][$category][$item] = $discountedPrice;
        header("Location: mycart.php");
        exit();
    } else {
        header("Location: discount.php?error=invalid_item");
        exit();
    }
} else {
    header("Location: discount.php?error=missing_data");
    exit();
}

function getPriceByItem2($item)
{
    $originalPrices = [
        'Digging Set' => 100,
    ];

    if(isset($originalPrices[$item])) {
        $discountedPrice = $originalPrices[$item] * 0.8;
        return $discountedPrice;
    } else {
        return 0;
    }
}
?>
