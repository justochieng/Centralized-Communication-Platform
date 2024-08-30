<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Interaction</title>
    <link rel="stylesheet" href="css/community.css">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetchNotifications();

            function fetchNotifications() {
                fetch('php/fetch_notifications.php')
                    .then(response => response.json())
                    .then(data => {
                        const notificationContainer = document.getElementById('notifications');
                        notificationContainer.innerHTML = '';
                        data.forEach(notification => {
                            const notificationElement = document.createElement('div');
                            notificationElement.className = 'notification';
                            notificationElement.innerText = notification.message;
                            notificationContainer.appendChild(notificationElement);
                        });
                    });
            }
        });
    </script>
</head>
<body>
    <?php include 'php/session_check.php'; ?>
    <header class="header">
        <div class="container">
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
            <nav class="nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="php/logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="container">
            <div id="notifications" class="notifications-section">
            </div>
            <section class="section chat-section">
                <div class="section-header">Chat</div>
                <div class="section-content">
                    <?php
                    include 'php/config.php';
                    $stmt = $conn->prepare("SELECT username, message, timestamp FROM chat_messages ORDER BY timestamp DESC");
                    $stmt->execute();
                    $stmt->bind_result($username, $message, $timestamp);
                    while ($stmt->fetch()) {
                        $content = preg_replace('/@(\w+)/', '<span class="mention">@$1</span>', htmlspecialchars($message));
                        echo '<div class="message">';
                        echo '<strong>' . htmlspecialchars($username) . ':</strong> ';
                        echo '<span>' . $content . '</span>';
                        echo '<div class="timestamp">' . $timestamp . '</div>';
                        echo '</div>';
                    }
                    $stmt->close();
                    $conn->close();
                    ?>
                </div>
                <div class="form">
                    <form action="php/post_message.php" method="post">
                        <input type="text" name="message" placeholder="Type your message here" required>
                        <button type="submit">Send</button>
                    </form>
                </div>
            </section>
        </div>
    </main>
    <footer>
        <div class="container footer-links">
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </div>
        <p>&copy; 2024 Localized Platform. All rights reserved.</p>
    </footer>
</body>
</html>
