<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints</title>
    <link rel="stylesheet" href="css/community.css">
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
            <section class="section complaints-section">
                <div class="section-header">Complaints</div>
                <div class="section-content">
                    <?php
                    include 'php/config.php';
                    $stmt = $conn->prepare("SELECT username, complaint, timestamp FROM complaints ORDER BY timestamp DESC");
                    $stmt->execute();
                    $stmt->bind_result($username, $complaint, $timestamp);
                    while ($stmt->fetch()) {
                        echo '<div class="message">';
                        echo '<strong>' . htmlspecialchars($username) . ':</strong> ';
                        echo '<span>' . htmlspecialchars($complaint) . '</span>';
                        echo '<div class="timestamp">' . $timestamp . '</div>';
                        echo '</div>';
                    }
                    $stmt->close();
                    $conn->close();
                    ?>
                </div>
                <div class="form">
                    <form action="php/post_complaint.php" method="post">
                        <input type="text" name="complaint" placeholder="Type your complaint here" required>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </section>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Localized Platform. All rights reserved.</p>
    </footer>
    <script src="js/script.js"></script>
</body>
</html>
