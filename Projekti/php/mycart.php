<!-- Cart Page -->
<?php session_start(); ?>

<h2>My Cart</h2>

<?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
    <?php foreach($_SESSION['cart'] as $category => $items): ?>
        <h3><?= $category ?></h3>
        <ul>
            <?php foreach($items as $item => $price): ?>
                <li><?= $item ?> - $<?= $price ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
<?php else: ?>
    <p>Your cart is empty.</p>
<?php endif; ?>
