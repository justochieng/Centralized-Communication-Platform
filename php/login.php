<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($conn) {
        $query = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $query->bind_param("s", $username);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if ($password === $user['password']) {
                $_SESSION['username'] = $user['username'];
                header("Location: ../index.php");
                exit;
            } else {
                header("Location: ../login2.php?error=Invalid%20password");
                exit;
            }
        } else {
            header("Location: ../login2.php?error=No%20user%20found%20with%20that%20username");
            exit;
        }
    } else {
        echo "Database connection failed.";
    }
}
?>