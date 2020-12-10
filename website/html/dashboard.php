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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
        <script src="dashboard.js" defer></script>
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
                        <script>
                            if (screen.width < 570 || Boolean(<?php echo (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) ?>)) {
                                var lines = '<a href="javascript:void(0)" onclick="openNav()">';
                                lines += '<img src="../resources/img/menu.png" alt="menu">';
                                lines += '</a>';
                                document.write(lines);
                            }
                        </script>
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
                    <div class = "chart_container">
                        <canvas id="chart"></canvas>
                    </div>
                </main>
                <footer></footer>
            </div>

            <script src="../js/scripts.js"></script>
            <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
            <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
            <script type="text/javascript" src="../js/slick.min.js"></script>
        </html>