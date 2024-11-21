<?php

$totalProducts = 0;

if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $productId => $quantity) {
        $totalProducts += $quantity;
    }
}
echo '<nav><li><a href="index.php">Productos</a></li>';
echo '<li><a href="cart.php">Carrito ('. $totalProducts . ')</a></li></nav>';