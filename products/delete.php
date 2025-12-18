<?php
require "../config/db.php";
$pdo->prepare("DELETE FROM products WHERE id=?")->execute([$_GET['id']]);
header("Location: index.php");
?>