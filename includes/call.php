<?php
require_once "databaseConn.php";

if(isset($_POST["submit-btn"])){
    $username = $_POST["userName"];
    $email = $_POST["userEmail"];
    $password = $_POST["userPassword"];
    $confirmPass = $_POST["confirmPass"];
    $role = $_POST["role"];
    $current_date = date('Y-m-d');

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        print "Invalid email address";
    }
    elseif(strcmp($password, $confirmPass) !== 0){
        print "Passwords do not match";
    }
    else {
        // Hash the password
        $hashedPass = password_hash($password, PASSWORD_DEFAULT);

        try {
            $stmt = $pdo->prepare("INSERT INTO userdetails(userName, userEmail, userPassword, roleId, regDate) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$username, $email, $hashedPass, $role, $current_date]);
            header("Location: ../index.php");
            exit();
        } catch (PDOException $e) {
            echo "Error inserting record: " . $e->getMessage();
        }
    }
}
?>
