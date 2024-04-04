<?php
session_start();

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add item to cart
if (isset($_POST['add_to_cart'])) {
    $item = $_POST['add_to_cart'];
    if (array_key_exists($item, $_SESSION['cart'])) {
        $_SESSION['cart'][$item]++;
    } else {
        $_SESSION['cart'][$item] = 1;
    }
}

// Remove item from cart
if (isset($_GET['remove'])) {
    $itemToRemove = $_GET['remove'];
    unset($_SESSION['cart'][$itemToRemove]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Truculenta:opsz,wght@12..72,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/mycart.css">

    <title>My Cart</title>
</head>
<header class="sticky-header" style="padding-right:17px;">
    <h1>Gardening Shop</h1>
    <nav>
        <a href="home.php">Home</a>
        <a href="mycart.php">My Cart</a>
        <a href="about.php">About</a>

    </nav>
</header>
<br><br><br><br><br>

<body class="truculenta">
    <h1>My Cart</h1>
    <table>
        <tr>
            <div>

                <th>Item</th>

                <th> Quantity</th>

                <th>Price</th>
                <th>Action</th>

            </div>
        </tr>
        <?php
        $totalPrice = 0;
        foreach ($_SESSION['cart'] as $item => $quantity) {
            $price = 0;
            switch ($item) {
                case 'Gloves':
                    $price = 10;
                    break;
                case 'Pruning Shears':
                    $price = 15;
                    break;
                case 'Loppers':
                    $price = 20;
                    break;
                case 'Garden Fork':
                    $price = 25;
                    break;
                case 'Snake Plant':
                    $price = 30;
                    break;
                case 'ZZ Plant':
                    $price = 35;
                    break;
                case 'Peace Lily':
                    $price = 40;
                    break;
                case 'Pothos':
                    $price = 65;
                    break;
                case 'Lighting':
                    $price = 45;
                    break;
                case 'Garmets':
                    $price = 50;
                    break;
                case 'Shelf':
                    $price = 55;
                    break;
                case 'Vertical Gardening':
                    $price = 60;
                    break;
                default:
                    $price = 0;
            }
            $totalPrice += $price * $quantity;
            echo "<tr>";
            echo "<td>$item</td>";
            echo "<td>$quantity</td>";
            echo "<td>$price</td>";
            echo "<td><a href='mycart.php?remove=$item'>Remove</a></td>";
            echo "</tr>";
        }

        ?>

        <tr>
            <td colspan="2"><strong>Total</strong></td>
            <td colspan="2"><?php echo "$" . $totalPrice; ?></td>
        </tr>
    </table>

</body>

</html>