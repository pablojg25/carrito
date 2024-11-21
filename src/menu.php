<?php

$totalProducts = 0;

if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $productId => $quantity) {
        $totalProducts += $quantity;
    }
}
?>

<nav>
  <a href="index.php">Productos</a>
  <a href="cart.php">Carrito (<?= $totalProducts ?>)</a>
</nav>