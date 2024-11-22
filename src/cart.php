<?php
session_start();
require "queries/connection.php";

if (isset($_SESSION['cart']) && count($_SESSION['cart']) != 0) {
    if (isset($_REQUEST['clear'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            unset($_SESSION['cart'][$key]);
        }
    }
    
    if (isset($_REQUEST['remove'])) {
        $id = $_REQUEST['remove'];
        $_SESSION['cart'][$id]--;
        if ($_SESSION['cart'][$id] == 0) {
            unset($_SESSION['cart'][$id]);
        }
    } else if (isset($_REQUEST['add'])) {
        $id = $_REQUEST['add'];
        require "queries/checkAmount.php";
        if ($_SESSION['cart'][$id] < $max) {
            $_SESSION['cart'][$id]++;
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
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) != 0) {
    ?>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th colspan="2">Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $total = 0;
                require "queries/connection.php";
                require "queries/cartSelect.php";
                
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4">Total</th>
                <th><?= $total?></th>
            </tr>
        </tfoot>
    </table>
    <a href="cart.php?clear="><button>Vaciar carrito</button></a>
    <?php } else { ?>
        <div class="error"><h1>ERROR</h1><p>No hay ningún producto en el carrito</p></div>
    <?php } ?>
</body>
</html>