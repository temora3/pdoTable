<?php
require_once "databaseConn.php";

if (isset($_GET["userID"])) {
    $userID = $_GET["userID"];
    
    // Use prepared statement to prevent SQL injection
    $sql = "DELETE FROM userdetails WHERE userID = :userID";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error deleting record: " . $stmt->errorInfo()[2];
    }
}

$pdo = null;
?>
