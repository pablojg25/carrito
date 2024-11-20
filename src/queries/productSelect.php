<?php

//if para comprobar si hay orden seleccionado, por defecto se ordena por ID

if (isset($_REQUEST['order'])) {

    $order = $_REQUEST['order'];
    $stmtProductSelect = $conn->prepare("SELECT * FROM products ORDER BY $order"); //No funciono con bindParam
    $stmtProductSelect->execute();
    $products = $stmtProductSelect->fetchAll(PDO::FETCH_OBJ);
    foreach ($products as $product) {
        printf('<tr><td>%s</td><td>%.2f</td><td>%d</td><td><a href="index.php?add=%d"><button>Añadir</button></a></td></tr>',$product->name,$product->price,$product->amount,$product->id);
    }
} elseif ($_COOKIE['order']) {
    $order = $_COOKIE['order'];
    $stmtProductSelect = $conn->prepare("SELECT * FROM products ORDER BY $order"); //No funciono con bindParam
    $stmtProductSelect->execute();
    $products = $stmtProductSelect->fetchAll(PDO::FETCH_OBJ);
    foreach ($products as $product) {
        printf('<tr><td>%s</td><td>%.2f</td><td>%d</td><td><a href="index.php?add=%d"><button>Añadir</button></a></td></tr>',$product->name,$product->price,$product->amount,$product->id);
    }
} else {
    $stmtProductSelect = $conn->prepare("SELECT * FROM products");
    $stmtProductSelect->execute();
    $products = $stmtProductSelect->fetchAll(PDO::FETCH_OBJ);
    foreach ($products as $product) {
        printf('<tr><td>%s</td><td>%.2f</td><td>%d</td><td><a href="index.php?add=%d"><button>Añadir</button></a></td></tr>',$product->name,$product->price,$product->amount,$product->id);
    }
}