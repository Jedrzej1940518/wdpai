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
                    <div class="player" id="first-player">
                        <div class="versus-text"> Caps </div>
                        <div class ="player-img">
                            <img src="public/img/players/caps.webp">
                        </div>
                    </div>
                    <div class="versus-text"> Versus </div>
                    <div class="player" id="second-player">
                        <div class="versus-text"> Faker </div>
                        <div class ="player-img">
                        <img src="public/img/players/faker.webp">
                        </div>
                    </div>
                </div>
                <div class="dropdown-container">
                    <div class="dropdown-box">
                        <input type="text" id="pro-search-first" placeholder="Search pro players...">
                        <div class="dropdown-content" id="first-dropdown">
                            <!-- Pro player options will be added here dynamically -->
                        </div>
                    </div>
                    <div class="dropdown-box">
                        <input type="text" id="pro-search-second" placeholder="Search pro players...">
                        <div class="dropdown-content" id="second-dropdown">
                            <!-- Pro player options will be added here dynamically -->
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

        const searchInputFirst = document.getElementById("pro-search-first");
        const dropdownContentFirst = document.getElementById("first-dropdown");

        const searchInputSecond = document.getElementById("pro-search-second");
        const dropdownContentSecond = document.getElementById("second-dropdown");

        function logout() {
            
            document.cookie = "user_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        }


        function updatePlayer(playerTag, playerName) {
            const playerElement = document.getElementById(playerTag);
            const versusTextElement = playerElement.querySelector(".versus-text");
            versusTextElement.textContent = playerName;
            const imgElement = playerElement.querySelector(".player-img img");
            fetch('http://localhost:8080/api/pros')
            .then(response => response.json())
            .then(data => {
                const imgExists = data.pros[playerName].img_exists;
                
                
                if (imgExists) {
                    const newFile = "public/img/players/" + playerName.toLowerCase() + ".webp";
                    imgElement.src = newFile;
                }
                else
                {
                    imgElement.src = "public/img/players/unknown_pro.webp";
                }
                const proId = data.pros[playerName].id;
                return fetch('http://localhost:8080/api/matches/'+proId);
                })
                .then(response=>response.json())
                .then(data=> {
                    console.log(data);
                }
                )
            .catch(error => {
                console.error('Error fetching data:', error);
            });
        }

        function updateDropdown(input, dropdownContent, searchInput) {

            fetch('http://localhost:8080/api/pros')
            .then(response => response.json())
            .then(data => {
                const proPlayers = Object.keys(data.pros);
                const filteredPlayers = proPlayers.filter((player) =>
                player.toLowerCase().includes(input.toLowerCase()));
                dropdownContent.innerHTML = "";

                filteredPlayers.forEach((player) => {
                    const option = document.createElement("div");
                    option.textContent = player;
                    option.classList.add("dropdown-option");

                    option.addEventListener("click", () => {
                    searchInput.value = player;
                    dropdownContent.style.display = "none";
                    });

                    dropdownContent.appendChild(option);
                });

                dropdownContent.style.display = filteredPlayers.length ? "block" : "none";
            }
            )
            .catch(error => {
                console.error('Error fetching data:', error);
            });
        }

        searchInputFirst.addEventListener("input", () => {
            const inputValue = searchInputFirst.value;
            updateDropdown(inputValue, dropdownContentFirst, searchInputFirst);
        });
        searchInputSecond.addEventListener("input", () => {
            const inputValue = searchInputSecond.value;
            updateDropdown(inputValue, dropdownContentSecond, searchInputSecond);
        });

        dropdownContentFirst.addEventListener("click", (event) => {
        if (event.target.classList.contains("dropdown-option")) {
            const playerName = event.target.textContent;
            updatePlayer('first-player',playerName);
            dropdownContentFirst.style.display = "none";
        }
        });

        dropdownContentSecond.addEventListener("click", (event) => {
        if (event.target.classList.contains("dropdown-option")) {
            const playerName = event.target.textContent;
            updatePlayer('second-player',playerName);
            dropdownContentSecond.style.display = "none";
        }
        });
    </script>
    </div>
</body>