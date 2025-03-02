<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['grade_level'] = $user['grade_level'];

        setcookie("user", $user['username'], time() + (86400 * 30), "/"); // Store user cookie for 30 days

        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
    $conn->close();
}
?>
