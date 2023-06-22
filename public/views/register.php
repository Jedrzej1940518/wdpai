<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>REGISTER</title>
</head>

<body>
    <div class="top-banner">
        <div class="logo-container">
            <img src="public/img/logo.svg">
        </div>
    </div>
    <div class="button-container">
        <a href="login" class="button">Sign in</a>
        <a href="trackedPros" class="button">Tracked pros</a>
    </div>
    <div class="main-screen">
        <form class="account-form" action="register" method="POST">
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
            <div class="input-container">
                <img src="public/img/icons/lock.svg" alt="Lock Icon">
                <input type="password" name="password-repeated" class="input-form" placeholder="Repeat Password">
            </div>
            <button type="submit" class="button login-button">Register</button>
        </form>
    </div>

</body>