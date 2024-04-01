<?php
session_start();

class CartManager {
    private $cart;

    public function __construct() {
        // Initialize cart from session or create a new empty cart
        $this->cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    }

    public function getCart() {
        return $this->cart;
    }

    public function addItem($item) {
        // Add item to cart
        $this->cart[] = $item;
        // Update cart in session
        $_SESSION['cart'] = $this->cart;
    }

    public function deleteItem($itemIndex) {
        // Check if item index exists in cart
        if (isset($this->cart[$itemIndex])) {
            // Remove item from cart
            unset($this->cart[$itemIndex]);
            // Update cart in session
            $_SESSION['cart'] = $this->cart;
            return true; // Item deleted successfully
        }
        return false; // Item index not found in cart
    }
}

// Create an instance of the CartManager
$cartManager = new CartManager();

// Check if the delete button is clicked for a specific item
if(isset($_POST['delete_item'])) {
    $itemIndex = $_POST['delete_item'];
    $cartManager->deleteItem($itemIndex);
    // Redirect to refresh the page and update the cart display
    header('Location: mycart.php');
    exit;
}

// Get the cart from the CartManager
$cart = $cartManager->getCart();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
</head>
<body>
    <h1>My Cart</h1>
    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($cart as $key => $item): ?>
                <tr>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td>
                        <!-- Form to submit the item key to delete -->
                        <form method="post">
                            <input type="hidden" name="delete_item" value="<?= $key ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
