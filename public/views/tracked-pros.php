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
    <?php
           require_once __DIR__.'/../../src/repository/UserRepository.php';

            if (isset($_COOKIE['user_id'])) {
                // Cookie is set, user is authenticated
                $id = $_COOKIE['user_id'];
                $user_repository = new UserRepository();
                $user = $user_repository->findById($id);
        
                echo '<div class="versus-text" style="text-align: center; position: relative; top: -5px;">Logged in as ' . strtoupper($user->getEmail()[0]) . '</div>';
                echo '<a href="trackedPros" class="button" onclick="logout()">Sign out</a>';
                echo '<a href="versus" class="button">Versus</a>';
            } else {
                // Cookie is not set, user is not authenticated
                echo '<a href="login" class="button">Sign in</a>';
                echo '<a href="versus" class="button">Versus</a>';
            }
            ?> 

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
        <form class="add-pro" action="addPro" method="POST">
            <input type="search-pro" name="search-pro" class="input-form" placeholder="Search pro">
            <a href="#" class="button add-pro-button">Add pro</a>
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
<script>
        function logout() {
            // Set the "user_id" cookie to expire immediately (time in the past)
            document.cookie = "user_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        }
</script>