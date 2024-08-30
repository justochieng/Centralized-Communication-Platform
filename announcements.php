<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login2.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latest Announcements</title>
    <link rel="stylesheet" href="css/community.css">
</head>
<body>
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
            <section class="section announcements-section">
                <div class="section-header">Latest Announcements</div>
                <div class="section-content">
                    <?php
                    include 'php/config.php';
                    $stmt = $conn->prepare("SELECT username, announcement, timestamp FROM announcements ORDER BY timestamp DESC");
                    $stmt->execute();
                    $stmt->bind_result($username, $announcement, $timestamp);
                    while ($stmt->fetch()) {
                        echo '<div class="message">';
                        echo '<strong>' . htmlspecialchars($username) . ':</strong> ';
                        echo '<span>' . htmlspecialchars($announcement) . '</span>';
                        echo '<div class="timestamp">' . $timestamp . '</div>';
                        echo '</div>';
                    }
                    $stmt->close();
                    $conn->close();
                    ?>
                </div>
                <?php if ($_SESSION['username'] == 'Admin'): ?>
                <div class="form">
                    <form action="php/post_announcement.php" method="post">
                        <input type="text" name="announcement" placeholder="Type your announcement here" required>
                        <button type="submit">Post</button>
                    </form>
                </div>
                <?php endif; ?>
            </section>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Localized Platform. All rights reserved.</p>
    </footer>
    <script src="js/script.js"></script>
</body>
</html>
