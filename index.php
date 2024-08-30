<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stateview Apartments</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <?php include 'php/session_check.php'; ?>
    <header class="header">
        <div class="container">
            <div class="header-logo">
                <img src="images/logo.png" alt="Stateview Apartments Logo">
            </div>
            <nav class="nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="announcements.php">Announcements</a></li>
                    <li><a href="community.php">Community</a></li>
                    <li><a href="complaints.php">Complaints</a></li>
                    <li><a href="php/logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section class="hero">
        <div class="hero-content">
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
            <p>Discover Stateview Apartments, where community thrives.</p>
            <a href="#sections" class="btn">Explore More</a>
        </div>
    </section>
    <main>
        <section id="sections" class="sections">
            <div class="section">
                <div class="section-text">
                    <h2>Latest Announcements</h2>
                    <p>Stay up-to-date with the latest news and announcements from Stateview Apartments. Welcome to the hub of all things exciting! 📢 Here’s where you’ll find the freshest updates, community happenings, and news that’ll make your Stateview experience even better.

Community Events From rooftop barbecues to movie nights under the stars, we’ve got your social calendar covered. Keep an eye out for upcoming events—you won’t want to miss out! 🎉

Maintenance Notices Wondering why there’s a ladder in the hallway? Fear not! We’ll keep you informed about any maintenance or upgrades happening around the property. Your comfort is our priority.</p>
                </div>
                <div class="section-image">
                    <a href="announcements.php"><img src="images/announcements.jpg" alt="Announcements"></a>
                </div>
            </div>
            <div class="section">
                <div class="section-text">
                    <h2>Community Interaction</h2>
                    <p>Engage with your neighbors, share experiences, and build a stronger community. These interactions that make Stateview Apartments more than just a collection of units. Chat it up with your neigbours and spread the good vibes.</p>
                </div>
                <div class="section-image">
                    <a href="community.php"><img src="images/community.jpg" alt="Community Interaction"></a>
                </div>
            </div>
            <div class="section">
                <div class="section-text">
                    <h2>Complaints</h2>
                    <p>Report any issues or concerns you have to help us improve your living experience. At Stateview Apartments, we value your voice. We believe that open communication is the cornerstone of a thriving community. If you have any concerns, issues, or suggestions, we’re all ears! Your feedback helps us continually improve your living experience.

Whether it’s a noisy neighbor, a maintenance request, or an idea to enhance our amenities, we want to hear from you. Our dedicated team is here to listen, address your concerns promptly, and work together to make Stateview an even better place to call home.</p>
                </div>
                <div class="section-image">
                    <a href="complaints.php"><img src="images/complaints.jpg" alt="Complaints"></a>
                </div>
            </div>
            <div class="section">
                <div class="section-text">
                    <h2>About Us</h2>
                    <p>Learn more about Stateview Apartments and our commitment to creating a vibrant community. Our mission is to foster a vibrant and inclusive community where residents feel right at home. Here, we believe that more than just walls and ceilings make up a living space—it’s the people, the shared experiences, and the sense of belonging that truly define our community.

At Stateview, we’re not just property managers; we’re community builders. Our commitment extends beyond maintaining apartments; it’s about creating connections. Whether you’re a long-time resident or a newcomer, we’re here to ensure that your Stateview experience is exceptional.</p>
                </div>
                <div class="section-image">
                    <img src="images/about-us.jpg" alt="About Us">
                </div>
            </div>
        </section>
        <section class="contact-us">
            <div class="container">
                <div class="contact-info">
                    <h2>Contact Us</h2>
                    <p><strong>Address:</strong> 123 Stateview Apartments, Mfangano Street, Nairobi</p>
                    <p><strong>Phone:</strong> +254 712 345 766</p>
                    <p><strong>Email:</strong> contact@stateviewapartments.com</p>
                    <h3>Operating Hours</h3>
                    <ul>
                        <li>Monday - Friday: 9:00 AM - 6:00 PM</li>
                        <li>Saturday: 10:00 AM - 4:00 PM</li>
                        <li>Sunday: Closed</li>
                    </ul>
                </div>
                <div class="contact-form">
                    <h2>Send Us a Message</h2>
                    <form action="php/contact_form_submit.php" method="POST">
                        <input type="text" name="first_name" placeholder="First Name" required>
                        <input type="text" name="last_name" placeholder="Last Name" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <textarea name="message" placeholder="Your Message" required></textarea>
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="container">
            <div class="footer-links">
                <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <p>&copy; 2024 Stateview Apartments. All rights reserved.</p>
        </div>
    </footer>
    <script src="js/script.js"></script>
</body>
</html>
