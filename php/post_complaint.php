<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['complaint'])) {
    $username = $_SESSION['username'];
    $complaint = $_POST['complaint'];

    $stmt = $conn->prepare("INSERT INTO complaints (username, complaint) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $complaint);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

header("Location: ../complaints.php");
exit();
?>
