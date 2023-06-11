<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>LOGIN PAGE</title>
</head>

<body>
    <div class="login-container">
        <div class="top-banner">
            <div class="logo-container">
                <img src="public/img/logo.svg">
            </div>
        </div>
        <div class="main-screen">
            <form>
                <div class="input-container">
                    <label for="email" class="input-icon">
                        <img src="public/img/icons/person.svg" alt="Person Icon">
                    </label>
                    <input type="text" id="email" name="email" placeholder="Email">
                </div>
                <div class="input-container">
                    <label for="password" class="input-icon">
                        <img src="public/img/icons/lock.svg" alt="Lock Icon">
                    </label>
                    <input type="password" id="password" name="password" placeholder="Password">
                </div>
                <button type="submit">Sign in</button>
            </form>
        </div>
    </div>
</body>