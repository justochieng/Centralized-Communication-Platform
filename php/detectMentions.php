<?php
function detectMentions($message, $currentUser) {
    global $conn;

    // Find all mentions in the message
    preg_match_all('/@(\w+)/', $message, $mentions);
    foreach ($mentions[1] as $mentionedUser) {
        notifyUser($mentionedUser, $currentUser, $message);
    }
}

function notifyUser($mentionedUser, $currentUser, $message) {
    global $conn;

    // Debug: Log the current state
    error_log("notifyUser called with mentionedUser: $mentionedUser, currentUser: $currentUser, message: $message");

    // Fetch mentioned user's ID
    $mentionedUserQuery = "SELECT id FROM users WHERE username = ?";
    $stmt = $conn->prepare($mentionedUserQuery);
    $stmt->bind_param('s', $mentionedUser);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        $mentionedUserId = $result->fetch_assoc()['id'];

        // Debug: Log mentioned user ID
        error_log("Mentioned user ID: $mentionedUserId");

        // Fetch current user's ID
        $currentUserQuery = "SELECT id FROM users WHERE username = ?";
        $stmt = $conn->prepare($currentUserQuery);
        $stmt->bind_param('s', $currentUser);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0) {
            $currentUserId = $result->fetch_assoc()['id'];

            // Debug: Log current user ID
            error_log("Current user ID: $currentUserId");

            // Insert notification into database
            $notificationQuery = "INSERT INTO notifications (user_id, sender_id, message) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($notificationQuery);
            $stmt->bind_param('iis', $mentionedUserId, $currentUserId, $message);
            if (!$stmt->execute()) {
                // Debug: Log any errors during insertion
                error_log("Error inserting notification: " . $stmt->error);
            }
        } else {
            // Debug: Log if current user ID is not found
            error_log("Current user ID not found for username: $currentUser");
        }
    } else {
        // Debug: Log if mentioned user ID is not found
        error_log("Mentioned user ID not found for username: $mentionedUser");
    }
    $stmt->close();
}
?>
