<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login2.php");
    exit();
}

include 'config.php';
include 'detectMentions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['message'])) {
    $username = $_SESSION['username'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO chat_messages (username, message) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $message);
    if ($stmt->execute()) {
        
        detectMentions($message, $username);
    }
    $stmt->close();
    $conn->close();
}

header("Location: ../community.php");
exit();
?>
