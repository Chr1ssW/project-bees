<!DOCTYPE html>
<?php
require_once("../db/connect.php");
?>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/slick.css" />
        <link rel="stylesheet" type="text/css" href="../css/slick-theme.css" />
        <title>Beehive Monitoring System</title>
    </head>

    <body>
        <?php
        require_once("sidebarAndPopup.php");
        ?>
        <div id="main">
            <header>
                <nav>
                    <span>
                        <a href="javascript:void(0)" onclick="openNav()">
                            <img src="../resources/img/menu.png" alt="menu">
                        </a>
                        <a href= "index.php">
                            <img src ="../resources/img/beeLogo.png" alt ="logo">
                        </a>
                        <h2>Beehive Monitoring System</h2>
                    </span>
                    <script>
                        if (screen.width > 570 && Boolean(<?php echo (!isset($_SESSION['loggedin'])) ?>)) {
                            var lines = '<span>';
                            lines += '<button class="signup-btn" type="button" onclick="openSignup()">Sign up</button>';
                            lines += '<button class="signin-btn" type="button" onclick="openLogin()">Sign in</button>';
                            lines += '</span>';
                            document.write(lines);
                        }
                        </script>
                    </nav>
                </header>
                <main>
                    <div id="account-container">
                        <div id="form-container">
                            <form action = "#" method = "POST" name="accountForm">
                                <div id="form-header"><h1>Account settings</h1></div>
                                <div class="field-container">
                                    <span class="user-info"><h3>Username:</h3><p>(username)</p></span>
                                    <button class="change-btn" type="button" onclick="openUsernameChange()">Change</button>
                                </div>
                                <div class="field-container">
                                    <span class="user-info"><h3>Email:</h3><p>(email)</p></span>
                                    <button class="change-btn" type="button" onclick="openLogin()">Change</button>
                                </div>
                                <div class="field-container">
                                    <span class="user-info"><h3>Password:</h3><p>(username)</p></span>
                                    <button class="change-btn" type="button" onclick="openLogin()">Change</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>
                <footer></footer>
            </div>

            <script src="../js/scripts.js"></script>
            <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
            <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
            <script type="text/javascript" src="../js/slick.min.js"></script>
        </html>