<?php

$stmtCartSelect = $conn->prepare("SELECT * FROM products");
$stmtCartSelect->execute();
$products = $stmtCartSelect->fetchAll(PDO::FETCH_OBJ);

foreach ($products as $product) {
    if (in_array($product->id, array_keys($_SESSION['cart']))) {
        $subtotal = $product->price * $_SESSION['cart'][$product->id];
        $total += $subtotal;
        printf('<tr><td>%s</td><td>%.2f</td><td>%d</td><td><a href="cart.php?remove=%d"><button>-</button></a><a href="cart.php?add=%d"><button>+</button></a></td><td>%.2f</td></tr>',$product->name,$product->price,$_SESSION['cart'][$product->id],$product->id,$product->id,$subtotal);
    }
}