<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>LOGIN</title>
</head>

<body>
        <div class="top-banner">
            <div class="logo-container">
                <img src="public/img/logo.svg">
            </div>
        </div>
        <div class="main-screen login-screen">
            <form class="account-form" action="login" method="POST">
                <?php
                if (isset($messages)) {
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }
                ?>
                <div class="input-container">
                    <img src="public/img/icons/person.svg" alt="Person Icon">
                    <input type="text" name="email" class="input-form" placeholder="Email">
                </div>
                <div class="input-container">
                    <img src="public/img/icons/lock.svg" alt="Lock Icon">
                    <input type="password" name="password" class="input-form" placeholder="Password">
                </div>
                <button type="submit" class="button login-button">Sign in</button>
                <a href="register" class="button login-button">Register </a>
            </form>
        </div>
</body>