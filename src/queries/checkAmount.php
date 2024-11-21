<?php

$stmtCheckAmount = $conn->prepare("SELECT amount FROM products WHERE id = :id");
$stmtCheckAmount->bindParam(":id",$id);
$stmtCheckAmount->execute();
$amount = $stmtCheckAmount->fetchAll(PDO::FETCH_OBJ);
$max = $amount[0]->amount;