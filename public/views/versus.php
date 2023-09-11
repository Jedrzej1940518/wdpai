<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/versus.css">
    <title>VERSUS</title>
</head>

<body>
    <div class="versus-container">
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
                echo '<a href="versus" class="button" onclick="logout()">Sign out</a>';
                echo '<a href="trackedPros" class="button">Tracked pros</a>';
            } else {
                
                echo '<a href="login" class="button">Sign in</a>';
                echo '<a href="trackedPros" class="button">Tracked pros</a>';
            }
            ?> 
        </div>
        <main>
            <div class="main-screen">
                <div class="player-container">
                    <div class="player">
                        <div class="versus-text"> Caps </div>
                        <div class ="player-img">
                        <img src="public/img/players/caps.webp">
                        </div>
                    </div>
                    <div class="versus-text"> Versus </div>
                    <div class="player">
                        <div class="versus-text"> Faker </div>
                        <div class ="player-img">
                        <img src="public/img/players/faker.webp">
                        </div>
                    </div>
                </div>
                <div class="matches-container">
                    <div class="match-container">
                        <div class="timer-container">
                            <div class="versus-text"> 20:15 </div>
                            <div class="versus-text"> 06.10.2023 </div>
                        </div>
                        <div class="left-stats-container"> <img src="public/img/champions/azir.png">
                            <div class="account-container">
                                <div class="versus-text"> T1 Faker </div>
                                <div class="versus-text"> Masters 300 LP </div>
                            </div>
                            <div class="stats-container">
                                <div class="versus-text"> 13/7/2 </div>
                                <div class="versus-text"> S+ </div>
                            </div>
                        </div>
                        <div class="right-stats-container">
                            <div class="stats-container">
                                <div class="versus-text"> 2/5/15 </div>
                                <div class="versus-text"> B- </div>
                            </div>
                            <div class="account-container">
                                <div class="versus-text"> G2 Caps </div>
                                <div class="versus-text"> Challenger 1215 LP </div>
                            </div>
                            <img src="public/img/champions/teemo.png">
                        </div>
                    </div>
                    <div class="match-container">
                        <div class="timer-container">
                            <div class="versus-text"> 20:15 </div>
                            <div class="versus-text"> 06.10.2023 </div>
                        </div>
                        <div class="left-stats-container"> <img src="public/img/champions/azir.png">
                            <div class="account-container">
                                <div class="versus-text"> T1 Faker </div>
                                <div class="versus-text"> Masters 300 LP </div>
                            </div>
                            <div class="stats-container">
                                <div class="versus-text"> 13/7/2 </div>
                                <div class="versus-text"> S+ </div>
                            </div>
                        </div>
                        <div class="right-stats-container">
                            <div class="stats-container">
                                <div class="versus-text"> 2/5/15 </div>
                                <div class="versus-text"> B- </div>
                            </div>
                            <div class="account-container">
                                <div class="versus-text"> G2 Caps </div>
                                <div class="versus-text"> Challenger 1215 LP </div>
                            </div>
                            <img src="public/img/champions/teemo.png">
                        </div>
                    </div>
                    <div class="match-container">
                        <div class="timer-container">
                            <div class="versus-text"> 20:15 </div>
                            <div class="versus-text"> 06.10.2023 </div>
                        </div>
                        <div class="left-stats-container"> <img src="public/img/champions/azir.png">
                            <div class="account-container">
                                <div class="versus-text"> T1 Faker </div>
                                <div class="versus-text"> Masters 300 LP </div>
                            </div>
                            <div class="stats-container">
                                <div class="versus-text"> 13/7/2 </div>
                                <div class="versus-text"> S+ </div>
                            </div>
                        </div>
                        <div class="right-stats-container">
                            <div class="stats-container">
                                <div class="versus-text"> 2/5/15 </div>
                                <div class="versus-text"> B- </div>
                            </div>
                            <div class="account-container">
                                <div class="versus-text"> G2 Caps </div>
                                <div class="versus-text"> Challenger 1215 LP </div>
                            </div>
                            <img src="public/img/champions/teemo.png">
                        </div>
                    </div>
                    <div class="match-container">
                        <div class="timer-container">
                            <div class="versus-text"> 20:15 </div>
                            <div class="versus-text"> 06.10.2023 </div>
                        </div>
                        <div class="left-stats-container"> <img src="public/img/champions/azir.png">
                            <div class="account-container">
                                <div class="versus-text"> T1 Faker </div>
                                <div class="versus-text"> Masters 300 LP </div>
                            </div>
                            <div class="stats-container">
                                <div class="versus-text"> 13/7/2 </div>
                                <div class="versus-text"> S+ </div>
                            </div>
                        </div>
                        <div class="right-stats-container">
                            <div class="stats-container">
                                <div class="versus-text"> 2/5/15 </div>
                                <div class="versus-text"> B- </div>
                            </div>
                            <div class="account-container">
                                <div class="versus-text"> G2 Caps </div>
                                <div class="versus-text"> Challenger 1215 LP </div>
                            </div>
                            <img src="public/img/champions/teemo.png">
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </main>
    <script>
        function logout() {
            
            document.cookie = "user_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        }
    </script>
    </div>
</body>