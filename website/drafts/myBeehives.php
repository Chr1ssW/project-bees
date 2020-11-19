<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Beehive Monitoring System</title>
</head>

<body>
    <?php 
    require_once("sidebarAndPopup.html");
    ?>
    <div id="main">
        <header>
            <nav>
                <span>
                    <a href="javascript:void(0)" onclick="openNav()">
                        <img src="../resources/img/menu.png" alt="menu">
                    </a>
                    <h2>Beehive Monitoring System</h2>
                </span>
                <span>
                    <button class="signup-btn" type="button" onclick="openSignup()">Sign up</button>
                    <button class="signin-btn" type="button" onclick="openLogin()">Sign in</button>
                </span>
            </nav>
        </header>
        <main>
            <div id="collection-wrapper">
                <div class="beehive new-hive" onclick="openAddHive()">
                    <img src="../resources/img/cross.png" alt="">
                    <p>Add new beehive</p>
                </div>
                <div class="beehive">
                    <p>Ext. temp: </p>
                    <p>Int. temp: </p>
                    <p>Humidity: </p>
                    <p>Weight: </p>
                    <p>(Name)</p>
                </div>
                <div class="beehive">
                    <p>Ext. temp: </p>
                    <p>Int. temp: </p>
                    <p>Humidity: </p>
                    <p>Weight: </p>
                    <p>(Name)</p>
                </div>
                <div class="beehive">
                    <p>Ext. temp: </p>
                    <p>Int. temp: </p>
                    <p>Humidity: </p>
                    <p>Weight: </p>
                    <p>(Name)</p>
                </div>
                <div class="beehive">
                    <p>Ext. temp: </p>
                    <p>Int. temp: </p>
                    <p>Humidity: </p>
                    <p>Weight: </p>
                    <p>(Name)</p>
                </div>
                <div class="beehive">
                    <p>Ext. temp: </p>
                    <p>Int. temp: </p>
                    <p>Humidity: </p>
                    <p>Weight: </p>
                    <p>(Name)</p>
                </div>
            </div>
        </main>
        <footer></footer>
    </div>
    <script src="../js/scripts.js"></script>
</body>

</html>