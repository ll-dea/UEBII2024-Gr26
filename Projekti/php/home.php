<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garden</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include your custom CSS file -->
    <link rel="stylesheet" href="../CSS/index.css">
    <!-- Include your custom JavaScript file -->
    <script src="../Javascript/index.js"></script>
</head>
<body class="truculenta">
    <!-- Header -->
    <header class="sticky-header">
        <h1>Gardening Shop</h1>
        <nav>
            <a href="home.php">Home</a>
            <a href="mycart.php">My Cart</a>
            <a href="about.php">About</a>
        </nav>
    </header>
    <?php
// Include the file where $items is defined or instantiated
include_once 'add_to_cart.php';

// Now include home.php
include_once 'home.php';
?>
    <br><br><br><br><br><br><br><br>
    <!-- Items -->
    <div class="container">
        <h2 class="text-center">Best Selling</h2>
        <!-- Tool Items -->
        <div class="row">
            <?php foreach ($items['Tools:'] as $item => $price): ?>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $item ?></h5>
                            <p class="card-text">Price: $<?= $price ?></p>
                            <button class="btn btn-primary addToCart" data-category="Tools:" data-item="<?= $item ?>">Add to Cart</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Plants Items -->
        <div class="row">
            <?php foreach ($items['Plants'] as $item => $price): ?>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $item ?></h5>
                            <p class="card-text">Price: $<?= $price ?></p>
                            <button class="btn btn-primary addToCart" data-category="Plants" data-item="<?= $item ?>">Add to Cart</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Decorations Items -->
        <div class="row">
            <?php foreach ($items['Decorations'] as $item => $price): ?>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $item ?></h5>
                            <p class="card-text">Price: $<?= $price ?></p>
                            <button class="btn btn-primary addToCart" data-category="Decorations" data-item="<?= $item ?>">Add to Cart</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- Footer -->
    <footer>
        &copy; 2024 Gardening Shop. All rights reserved.
    </footer>
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Listen for click events on Add to Cart buttons
        document.querySelectorAll('.addToCart').forEach(button => {
            button.addEventListener('click', function() {
                var category = this.getAttribute('data-category');
                var item = this.getAttribute('data-item');
                addToCart(category, item);
            });
        });

        // Function to add item to cart
        function addToCart(category, item) {
            var formData = new FormData();
            formData.append('category', category);
            formData.append('item', item);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'add_to_cart.php', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        console.log('Item added to cart successfully.');
                        // Optionally, you can update the UI to reflect the item being added to the cart
                    } else {
                        console.error('Error adding item to cart.');
                    }
                }
            };
            xhr.send(formData);
        }
    </script>
</body>
</html>
