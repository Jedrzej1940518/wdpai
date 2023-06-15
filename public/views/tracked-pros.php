<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/tracked-pros.css">
    <script src="https://kit.fontawesome.com/2e055273be.js" crossorigin="anonymous"></script>
    <title>TRACKED PROS</title>
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
        <div class="pros-container">
            <div class="player">
                <div class="versus-text"> Caps </div>
                <div class="player-img">
                    <img src="public/img/players/caps.webp">
                </div>
                <i class="fa-solid fa-caret-down fa-2x mr-2" style="color: #0051A2;"></i>
            </div>
            <div class="player">
                <div class="versus-text"> Faker </div>
                <div class="player-img">
                    <img src="public/img/players/faker.webp">
                </div>
                <i class="fa-solid fa-caret-down fa-2x mr-2" style="color: #0051A2;"></i>
            </div>
            <div class="player">
                <div class="versus-text"> Faker </div>
                <div class="player-img">
                    <img src="public/img/players/faker.webp">
                </div>
                <i class="fa-solid fa-caret-down fa-2x mr-2" style="color: #0051A2;"></i>
            </div>
            <div class="player">
                <div class="versus-text"> Faker </div>
                <div class="player-img">
                    <img src="public/img/players/faker.webp">
                </div>
                <i class="fa-solid fa-caret-down fa-2x mr-2" style="color: #0051A2;"></i>
            </div>
            <div class="player">
                <div class="versus-text"> Faker </div>
                <div class="player-img">
                    <img src="public/img/players/faker.webp">
                </div>
                <i class="fa-solid fa-caret-down fa-2x mr-2" style="color: #0051A2;"></i>
            </div>
            <div class="player">
                <div class="versus-text"> Faker </div>
                <div class="player-img">
                    <img src="public/img/players/faker.webp">
                </div>
                <i class="fa-solid fa-caret-down fa-2x mr-2" style="color: #0051A2;"></i>
            </div>
        </div>
        <div class="search-container">
            <form class="add-pro" action="add-pro" method="POST">
            <a href="#" class="button add-pro-button">Add pro </a>
            <input type="search-pro" name="search-pro" class="input-form" placeholder="Search pro">
                <?php
                if (isset($messages)) {
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </form>
        </div>
    </div>
</body>