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
                
                $id = $_COOKIE['user_id'];
                $user_repository = new UserRepository();
                $user = $user_repository->findById($id);
        
                echo '<div class="versus-text" style="text-align: center; position: relative; top: -5px;">Logged in as ' . strtoupper($user->getEmail()[0]) . '</div>';
                echo '<a href="trackedPros" class="button" onclick="logout()">Sign out</a>';
                echo '<a href="versus" class="button">Versus</a>';
            } else {
                
                echo '<a href="login" class="button">Sign in</a>';
                echo '<a href="versus" class="button">Versus</a>';
            }
            ?> 

    </div>
    <div class="main-screen">
        <div class="pros-container">
        <?php
        require_once __DIR__.'/../../src/repository/UserRepository.php';
        require_once __DIR__.'/../../src/repository/ProRepository.php';

          if (isset($_COOKIE['user_id'])) {
                
                $id = $_COOKIE['user_id'];

                $user_repository = new UserRepository();
                $user_pro_ids = $user_repository->getUserPros($id);
                $pro_count = 0; 
                foreach ($user_pro_ids as $pro_id) {
                    if ($pro_count >= 6) {
                        break;
                    }
                    $pro_repository = new ProRepository();
                    $pro = $pro_repository->findProById($pro_id);
                    $pro_name = $pro->getName();
                    $pro_image = 'public/img/players/' . strtolower($pro_name) . '.webp';
                    if (!file_exists($pro_image)) {
                        $pro_image = 'public/img/players/unknown_pro.webp';
                    }
                    echo '<div class="player">';
                    echo '<div class="versus-text">' . $pro_name . '</div>';
                    echo '<div class="player-img">';
                    echo '<img src="' . $pro_image . '">';
                    echo '</div>';
                    echo '<i class="fa-solid fa-caret-down fa-2x mr-2" style="color: #0051A2;"></i>';
                    echo '</div>';

                    $pro_count++;
                }
            }
            else
            {
                echo '<div class="player">';
                echo '<div class="versus-text">' . 'Faker' . '</div>';
                echo '<div class="player-img">';
                echo '<img src="public/img/players/faker.webp">';
                echo '</div>';
                echo '<i class="fa-solid fa-caret-down fa-2x mr-2" style="color: #0051A2;"></i>';
                echo '</div>';

                echo '<div class="player">';
                echo '<div class="versus-text">' . 'Caps' . '</div>';
                echo '<div class="player-img">';
                echo '<img src="public/img/players/caps.webp">';
                echo '</div>';
                echo '<i class="fa-solid fa-caret-down fa-2x mr-2" style="color: #0051A2;"></i>';
                echo '</div>';
            }
            ?>
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
</body>
<script>
        function logout() {
            
            document.cookie = "user_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        }
</script>