<?php
    session_start();
    require "queries/connection.php";
    require "queries/idSelect.php";
    
    $id = $_REQUEST['add'] ?? null;

    if (isset($_REQUEST['order'])) {
        setcookie("order",$_REQUEST['order'],time() + 86400);
    }
    if (isset($id) && in_array($id,$ids)) {
        require "queries/checkAmount.php";
        if (isset($_SESSION['cart'][$id])) {
            if ($_SESSION['cart'][$id] < $max) {
                $_SESSION['cart'][$id]++;
            } else {
                echo "<div><h1>ERROR</h1><p>No hay más stock para el producto</p></div>";
            }
        } else {
            if (1 <= $max) {
                $_SESSION['cart'][$id] = 1;
            } else {
                echo '<div class="error"><h1>ERROR</h1><p>No hay más stock para el producto</p></div>';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include "menu.php";
    ?>
    <h1>Productos</h1>
    <table>
        <thead>
            <tr>
                <th><a href="index.php?order=name">Nombre</a></th>
                <th><a href="index.php?order=price">Precio</a></th>
                <th><a href="index.php?order=amount">Cantidad</a></th>
                <th>Carrito</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require_once "queries/connection.php";
                require "queries/productSelect.php";
            ?>
        </tbody>
    </table>
</body>
</html>