<?php
session_start();
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
    $total = 0;
    ?>
    <!--Tabla con datos del carrito: productos, precio, cantidad, subtotal y total-->
    <!--Botón para vaciar el carrito-->
    <!--Botones para subir o bajar la cantidad de cada producto-->
    <!--Si la cantidad llega a 0, se borra la línea-->
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
</body>
</html>