<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/styles/user/login-register.css">

    <!-- JavaScript -->
    <script type="text/javascript" src="<?= BASE_URL ?>/javascript/user/login.js" defer></script>
</head>
<body>
    <div class="login-container">
        <div class="login form" method="post">
            <header>Login</header>
            <form id="login-form" method="post">
                <div class="error-message" id="username-error"></div>
                <input type="text" id="username" name="username" placeholder="Enter your username">
                <div class="error-message" id="password-error"></div>
                <input type="password" id="password" name="password" placeholder="Enter your password" autocomplete="on">
                <input type="submit" class="sign-in-button" value="Login">
            </form>
            <div class="signup">
                <span class="signup">Don't have an account? <a href="/public/user/register">Signup</a></span>
            </div>
        </div>
    </div>
</body>
</html>
