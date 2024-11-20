<?php
    session_start();
    require "queries/connection.php";
    require "queries/idSelect.php";
    
    $id = $_REQUEST['add'] ?? null;

    if (isset($_REQUEST['order'])) {
        setcookie("order",$_REQUEST['order']);
    }
    if (isset($id) && in_array($id,$ids)) {
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id] ++;
        } else {
            $_SESSION['cart'][$id] = 1;
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
    <!--Mostrar productos-->
    <!--Tabla: THs permiten ordenar tabla, orden seleccionado se guarda-->
    <!--Botón añadir a carrito para cada producto, o aumentar la cantidad si ya está añadido-->
    <!--Contador de productos añadidos-->
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