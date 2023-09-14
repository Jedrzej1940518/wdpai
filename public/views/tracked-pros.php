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
        require_once __DIR__ . '/../../src/repository/UserRepository.php';

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
            require_once __DIR__ . '/../../src/repository/UserRepository.php';
            require_once __DIR__ . '/../../src/repository/ProRepository.php';

            if (isset($_COOKIE['user_id'])) {

                $id = $_COOKIE['user_id'];

                $user_repository = new UserRepository();
                $user_pro_ids = $user_repository->getUserPros($id);
                $pro_count = 0;
                foreach ($user_pro_ids as $pro_id) {
                    if ($pro_count >= 5) {
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
            } else {
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
        <div class="add-pro-container">
            <form class="add-pro" action="addPro" method="POST">
                <input type="search-pro" name="search-pro" class="input-form" placeholder="Search pro">
                <a href="#" class="button add-pro-button" id="add-pro-link">Add pro</a>
                <?php
                
                require_once __DIR__.'/../../src/repository/UserRepository.php';
                require_once __DIR__.'/../../src/repository/ProRepository.php';

                if (isset($messages)) {
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if(!isset($_COOKIE['user_id']))
                    {
                        echo "User neeeds to be logged in to add pros!";
                        return;
                    }
                    $pro_name = $_POST['pro-name'];
                    $pro_account = $_POST['pro-account'];
                    $pro_server = $_POST['pro-server'];
                    $pro_repository = new ProRepository();
                    $pro_repository->addPro($pro_name, false);  //add img processsing maybe later
                    $pro = $pro_repository->findProByName($pro_name);
                    $pro_id = $pro->getId();
                    $pro_repository->addAccount($pro_id,$pro_account, $pro_server, 420);
                    
                    $user_repository = new UserRepository();
                    $user_id = $_COOKIE['user_id'];
                    $user_repository->addProToUser($user_id, $pro_id);
                    $url = "http://$_SERVER[HTTP_HOST]";
                    header("Location: {$url}/trackedPros");
                }
                ?>
            </form>

            <div id="add-pro-form" style="display: none;">
                <form action="" method="POST">
                    <label for="pro-name">Pro Name:</label>
                    <input type="text" name="pro-name" required>

                    <label for="pro-account">Pro Account Name:</label>
                    <input type="text" name="pro-account" required>

                    <label for="pro-server">Pro Server:</label>
                    <input type="text" name="pro-server" required>

                    <input type="submit" value="Submit">
                </form>
            </div>

        </div>
    </div>
</body>
<script>
    function logout() {

        document.cookie = "user_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    }
    document.getElementById('add-pro-link').addEventListener('click', function (event) {
    event.preventDefault();
    document.getElementById('add-pro-form').style.display = 'block';
    });

</script>