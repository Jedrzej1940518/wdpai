<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>REGISTER</title>
</head>

<body>
    <div class="login-container">
        <div class="top-banner">
            <div class="logo-container">
                <img src="public/img/logo.svg">
            </div>
        </div>
        <div class="main-screen">
            <form class="login" action="login" method="POST">
                <?php
                if (isset($messages)) {
                    echo "\n";
                    foreach ($messages as $message) {
                        echo $message;
                    }
                    echo "\n";
                }
                ?>
                <div class="input-container">
                    <img src="public/img/icons/person.svg" alt="Person Icon">
                    <input type="text" id="email" name="email" placeholder="Email">
                </div>
                <div class="input-container">
                    <img src="public/img/icons/lock.svg" alt="Lock Icon">
                    <input type="password" id="password" name="password" placeholder="Password">
                </div>
                <div class="input-container">
                <img src="public/img/icons/lock.svg" alt="Lock Icon">
                    <input type="password" id="password" name="password" placeholder="Repeat Password">
                </div>
                <a href="register" class="button login-button">Register </a>
            </form>
        </div>
    </div>
</body>