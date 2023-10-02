<?php
require_once "databaseConn.php";

if (isset($_POST["update"])) {
    $fullname = ucwords(strtolower($_POST["userName"]));
    $email = strtolower($_POST["userEmail"]);
    $userRole = strtolower($_POST["role"]);
    $userId = $_POST["userID"];

    // Prepare a statement to retrieve the roleId
    $query = "SELECT roleId FROM roles WHERE role = :userRole";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':userRole', $userRole, PDO::PARAM_STR);
    $stmt->execute();
    $role = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($role) {
        $savedRole = $role['roleId'];

        // Prepare an SQL statement with placeholders for updating user details
        $sql = "UPDATE userDetails SET userName=:fullname, userEmail=:email, roleID=:savedRole WHERE userID=:userId LIMIT 1";
        $stmt = $pdo->prepare($sql);

        // Bind parameters to the prepared statement
        $stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':savedRole', $savedRole, PDO::PARAM_INT);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);

        // Execute the prepared statement
        if ($stmt->execute()) {
            header("Location: ../index.php");
            exit();
        } else {
            echo "Error updating record: " . $stmt->errorInfo()[2];
        }
    } else {
        echo "Role not found.";
    }

    // Close the database connection
    $pdo = null;
}
?>
