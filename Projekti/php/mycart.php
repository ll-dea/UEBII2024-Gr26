<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: ../index.php");
    exit();
}

// Function to get the price of an item with a 20% discount
function getDiscountedPrice($item)
{
    $originalPrice = getPriceByItem($item);
    return $originalPrice * 0.8; // 20% discount
}

// Function to get the original price of an item
function getPriceByItem($item)
{
    $prices = [
        'Gloves' => 10,
        'Pruning Shears' => 15,
        'Loppers' => 20,
        'Garden Fork' => 18,
        'Snake Plant' => 25,
        'ZZ Plant' => 30,
        'Peace Lily' => 22,
        'Pothos' => 12,
        'Lighting' => 50,
        'Garments' => 8,
        'Shelf' => 40,
        'Vertical Gardening' => 50,
        'Digging Set' => 100,
        'Ornamental Plant' => 30,
        'Flower Light' => 50,
        'Flower Vase' => 40,
        'Watering Can' => 20,
        'Wheelbarrow' => 120,
        'Garden Boots' => 70,
        'Pink Flamingo' => 90,
        'Rake' => 60,
        'Cactus Plant' => 20,
        'Electric' => 180,
        'Fidle Leaf' => 40
    ];

    return isset($prices[$item]) ? $prices[$item] : 0;
}

// Initialize cart if not set
if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle adding item to the cart
if (isset($_POST['add_to_cart'])) {
    $item = $_POST['add_to_cart'];
    if (array_key_exists($item, $_SESSION['cart'])) {
        $_SESSION['cart'][$item]++;
    } else {
        $_SESSION['cart'][$item] = 1;
    }
}

// Handle removing item from the cart
if (isset($_GET['remove'])) {
    $itemToRemove = $_GET['remove'];
    unset($_SESSION['cart'][$itemToRemove]);
}

// Handle sorting the cart items
if (isset($_GET['sort']) && is_array($_SESSION['cart'])) {
    $sortOption = $_GET['sort'];
    switch ($sortOption) {
        case 'name-asc':
            ksort($_SESSION['cart']);
            break;
        case 'name-desc':
            krsort($_SESSION['cart']);
            break;
        case 'price-asc':
            uasort($_SESSION['cart'], function($a, $b) {
                return getPriceByItem($a) - getPriceByItem($b);
            });
            break;
        case 'price-desc':
            uasort($_SESSION['cart'], function($a, $b) {
                return getPriceByItem($b) - getPriceByItem($a);
            });
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/mycart.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Truculenta:opsz,wght@12..72,100..900&display=swap" rel="stylesheet">
    <title>Garden Shop</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-transform: uppercase;
        }

        a {
            color: #c62828;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #8e0000;
        }

        select {
            margin-bottom: 20px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        select:focus {
            outline: none;
            border-color: #8e0000;
        }
    </style>
</head>

<body style="background-color: white; margin:0; padding:0;" class="truculenta">

    <header style="padding:0; background-color:#ff7f49" class="sticky-header">
        <h1 style="margin-right:10px">Gardening Shop</h1>
        <nav style="margin-right:10px">
            <a href="home.php">Home</a>
            <a href="mycart.php">My Cart</a>
            <a href="about.php">About</a>
            <a href="discount.php">Offers</a>
            <a href="signout.php">Sign Out</a>
        </nav>
        <div class="row" style="margin-right: 100px;">
            <div class="col-6">
                <h1 style="float: right;">My Cart</h1>
            </div>
            <div class="col-6">
                <select style="float: left; margin-top:25px" id="sort-select" onchange="sortCart()">
                    <option value="default" selected disabled>Default</option>
                    <option value="name-asc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'name-asc') echo 'selected'; ?>>Sort by Item Name (A-Z)</option>
                    <option value="name-desc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'name-desc') echo 'selected'; ?>>Sort by Item Name (Z-A)</option>
                    <option value="price-asc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'price-asc') echo 'selected'; ?>>Sort by Quantity (Low to High)</option>
                    <option value="price-desc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'price-desc') echo 'selected'; ?>>Sort by Quantity (High to Low)</option>
                </select>
            </div>
        </div>
    </header>

    <br><br><br><br><br><br><br><br><br>
    <br>
    <table>
        <tr>
            <th>Item</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
        </tr>

        <?php
        $totalPrice = 0;

        foreach ($_SESSION['cart'] as $item => $quantity) {
            $price = getDiscountedPrice($item);
            $totalPrice += $price * $quantity;
            echo "<tr>";
            echo "<td>$item</td>";
            echo "<td>$quantity</td>";
            echo "<td>$$price</td>";
            echo "<td><a href='mycart.php?remove=$item'>Remove</a></td>";
            echo "</tr>";
        }
        ?>

        <tr>
            <td colspan="2" style="color: #8e0000;"><strong>Total</strong></td>
            <td colspan="2"><?php echo "$" . number_format($totalPrice, 2); ?></td>
        </tr>
    </table>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <form method="post" action="konfirmo_porosine.php">
                <button style="float: right; margin-right: 20px; padding-left:30px;padding-right:30px" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmOrderModal">Buy</button>
            </form>
        </div>
        <div class="col-1"></div>
    </div>

    <div class="modal fade" id="confirmOrderModal" tabindex="-1" aria-labelledby="confirmOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmOrderModalLabel">Confirm Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to confirm your order?</p>
                    <div id="checkMark" style="display: none;">
                        <img src="checkmark.png" alt="Check Mark" id="checkImage" style="width: 100px; height: 100px;">
                        <p style="font-weight: bold; text-align: center; margin-top: 10px;">Your order has been successfully confirmed!</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <form id="confirmForm" method="post" action="konfirmo_porosine.php">
                        <button type="submit" class="btn btn-primary" id="confirmBtn">Yes</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#confirmBtn').click(function() {
                $('#checkMark').show();
                $('#confirmOrderModalLabel').text('Order successfully confirmed!');
                $('#confirmOrderModal .modal-footer').html('<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>');
            });
        });

        function sortCart() {
            var sortOption = document.getElementById("sort-select").value;
            window.location.href = "mycart.php?sort=" + sortOption;
        }
    </script>

    <footer>
        &copy; 2024 Gardening Shop. All rights reserved.
    </footer>

</body>
</html>
