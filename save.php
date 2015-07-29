<?php 
require 'database.php';
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO lohas (name,json,) values(?, ?, ?)";
$q = $pdo->prepare($sql);
$q->execute(array($name,$email,$mobile));
Database::disconnect();

?>
