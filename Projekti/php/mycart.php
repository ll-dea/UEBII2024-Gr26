<?php
function getPriceByItem2($item)
{

    $originalPrice = 0;


    switch ($item) {
    case 'Digging Set':
     $originalPrice = 100;
      break;
    case 'Ornamental Plant':
      $originalPrice = 30;
       break;
    case 'Flower Light':
      $originalPrice = 50;
       break;
    case 'Flower Vase':
       $originalPrice = 40;
         break;
    case 'Watering Can ':
       $originalPrice = 20;
        break;
     case 'Wheelbarrow':
      $originalPrice = 120;
        break;
        case'Garden Boots':
            $originalPrice = 70;
            break;   
     case 'Pink Flamingo':
       $originalPrice = 90;
         break;
     case 'Rake':
        $originalPrice = 60;
         break;
     case 'Cactus Plant':
      $originalPrice = 20;
        break;
      case 'Electric ':
        $originalPrice = 180;
         break;
      case 'Fidle Leaf':
         $originalPrice = 40;
           break;
        default:
            $originalPrice = 0;
            break;
    }


    $discountedPrice = $originalPrice * 0.8; // 20% discount


    return $discountedPrice;
}
?>
<?php
session_start();

// Initialize cart if not set
if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}



if (isset($_POST['add_to_cart'])) {
    $item = $_POST['add_to_cart'];
    if (array_key_exists($item, $_SESSION['cart'])) {
        $_SESSION['cart'][$item]++;
    } else {
        $_SESSION['cart'][$item] = 1;
    }
}


if (isset($_GET['remove'])) {
    $itemToRemove = $_GET['remove'];
    unset($_SESSION['cart'][$itemToRemove]);
}


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
            asort($_SESSION['cart']); 
            break;
        case 'price-desc':
            arsort($_SESSION['cart']); 
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
            padding-left: 150px;
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
            <a href="../HTML/index.html">Sign Out</a>


        </nav>
        <div class="row" style="margin-right: 100px;">
            <div class="col-6">
                <h1 style="float: right;">My Cart</h1>
            </div>
            <div class="col-6">
                <!-- Dropdown list for sorting -->
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
            // Assign price based on item name
            $price = 0;

            if (isset($_SESSION['cart'][$item])) {
                // Check if the item has a price greater than 0
                if ($regularPrice = getPriceByItem($item)) {
                    $price += $regularPrice;
                }
                
                if ($discountedPrice = getPriceByItem2($item)) {
                    $price += $discountedPrice;
                }

                $totalPrice += $price * $quantity;
                echo "<tr>";
                echo "<td>$item</td>";
                echo "<td>$quantity</td>";
                echo "<td>$price</td>";
                echo "<td><a href='mycart.php?remove=$item'>Remove</a></td>";
                echo "</tr>";
            }
        }
        ?>


        <tr>
            <td colspan="2" style="color: #8e0000;"><strong>Total</strong></td>
            <td colspan="2"><?php echo "$" . $totalPrice; ?></td>
        </tr>
    </table>
<<<<<<< HEAD
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10"> <form method="post" action="konfirmo_porosine.php">

        <button style="float: right; margin-right: 20px; padding-left:30px;padding-right:30px" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmOrderModal">Buy</button>
    </form></div>
    <div class="col-1"></div>
   </div>

   <div class="modal fade" id="confirmOrderModal" tabindex="-1" aria-labelledby="confirmOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmOrderModalLabel">Konfirmo Porosinë</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Jeni të sigurtë që dëshironi të konfirmoni porosinë tuaj?</p>
                <div id="checkMark" style="display: none;">
                    <img src="checkmark.png" alt="Check Mark" id="checkImage" style="width: 100px; height: 100px;">
                    <p style="font-weight: bold; text-align: center; margin-top: 10px;">Porosia është konfirmuar me sukses!</p>
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
            $('#confirmOrderModalLabel').text('Porosia është konfirmuar me sukses!');
            $('#confirmOrderModal .modal-footer').html('<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>');
        });
    });
</script>
    
=======
    <button style="margin-left:1320px ; font-size:1rem;  background-color: #ff7f49; border-color: #ff7f49;color: white;" class="btn " onclick="purchase()">Buy All</button>





>>>>>>> 8ad992a447d9a29727deabe1c7f5b3de58123121

    <script>
        // JavaScript function to redirect with sort option
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

<?php
function getPriceByItem($item)
{
    switch ($item) {
        case 'Gloves':
            return 10;
        case 'Pruning Shears':
            return 15;
        case 'Loppers':
            return 20;
        case 'Garden Fork':
            return 18;
        case 'Snake Plant':
            return 25;
        case 'ZZ Plant':
            return 30;
        case 'Peace Lily':
            return 22;
        case 'Pothos':
            return 12;
        case 'Lighting':
            return 50;
        case 'Garmets':
            return 8;
        case 'Shelf':
            return 40;
        case 'Vertical Gardening':
            return 50;
        default:
            return 0;
    }
}
?>
<script>
    function purchase() {
        if (confirm('Do you confirm purchasing?')) {
            alert('Items purchased!');
            <?php  ?>
        } else {
            alert('Purchase canceled!');
        }
    }
</script>