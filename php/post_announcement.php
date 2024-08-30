<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['username'] != 'Admin') {
    header("Location: ../login.php");
    exit();
}

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['announcement'])) {
    $username = $_SESSION['username'];
    $announcement = $_POST['announcement'];

    $stmt = $conn->prepare("INSERT INTO announcements (username, announcement) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $announcement);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

header("Location: ../announcements.php");
exit();
?>
