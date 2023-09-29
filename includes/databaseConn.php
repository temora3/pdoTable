<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "pdotable";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 } catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
 }
?>
