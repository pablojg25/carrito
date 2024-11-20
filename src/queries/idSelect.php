<?php

$stmtIdSelect = $conn->prepare("SELECT id FROM products");
$stmtIdSelect->execute();
$ids = $stmtIdSelect->fetchAll(PDO::FETCH_COLUMN,0);