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
        <script src="../js/dashboard.js" defer></script>
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
                        <a href="index.php">
                            <img src="../resources/img/back.png" alt="menu">
                        </a>
                    </span>
                </nav>
            </header>
            <main id="dashboad-bg">
                <div id="dashboard-canvas">
                    <h1>Don't judge this is the place for the dashboard</h1>
                </div>
            </main>
            <footer></footer>
        </div>
        <script src="../js/scripts.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="../js/slick.min.js"></script>
    </body>
</html>