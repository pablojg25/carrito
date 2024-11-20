<?php

$stmtPoductSelect = $conn->prepare("SELECT * FROM products");
$stmtPoductSelect->execute();
$products = $stmtPoductSelect->fetchAll(PDO::FETCH_OBJ);
foreach ($products as $product) {
    printf('<tr><td>%s</td><td>%.2f</td><td>%d</td><td><a href="index.php?add=%d"><button>Añadir</button></a></td></tr>',$product->name,$product->price,$product->amount,$product->id);
}