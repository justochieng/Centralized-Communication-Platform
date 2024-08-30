<?php
session_start();
include 'config.php';

if (!isset($_SESSION['username'])) {
    echo json_encode([]);
    exit();
}

$currentUser = $_SESSION['username'];

// Fetch current user's ID
$userIdQuery = "SELECT id FROM users WHERE username = ?";
$stmt = $conn->prepare($userIdQuery);
$stmt->bind_param('s', $currentUser);
$stmt->execute();
$result = $stmt->get_result();
$userId = $result->fetch_assoc()['id'];

// Fetch notifications for the current user
$notificationsQuery = "SELECT message FROM notifications WHERE user_id = ?";
$stmt = $conn->prepare($notificationsQuery);
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();

$notifications = [];
while ($row = $result->fetch_assoc()) {
    $notifications[] = $row;
}

$stmt->close();
$conn->close();

echo json_encode($notifications);
?>
