<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Localized Platform</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="box-form">
    <div class="left">
        <div class="overlay">
            <h1>Welcome Back</h1>
            <p>Your community awaits you. Login to stay connected with your neighbors.</p>
            <span>
    <p>Visit us on social media</p>
    <a href="https://www.facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a>
    <a href="https://twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></a>
    <a href="https://www.instagram.com"><i class="fa fa-instagram" aria-hidden="true"></i></a>
</span>

        </div>
    </div>
    <div class="right">
        <h5>Login</h5>
        <form action="php/login.php" method="POST">
            <div class="inputs">
                <input type="text" placeholder="Username" name="username" required>
                <br>
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <br><br>
            <div class="remember-me--forget-password">
                <label>
                    <input type="checkbox" name="item" checked/>
                    <span class="text-checkbox">Remember me</span>
                </label>
                <p><a href="#">Forgot password?</a></p>
            </div>
            <br>
            <button type="submit">Login</button>
        </form>
        <?php if(isset($_GET['error'])): ?>
            <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
