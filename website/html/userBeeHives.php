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
    require("../db/connect.php");
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
                <?php

                echo $_SESSION['userID'];
                echo 12;
                $userID = "";
                $beeHiveID = "";
                $inputID = "";
                $userID = 12;
                // $userName = $_SESSION['userName'];

                //We select userID, beeHives assigned to userID and readings from those beeHives

                // $sqlSelect = "SELECT `name` FROM user";
                $sqlSelect = "SELECT rid.internalTemp,rid.externalTemp,rid.humidity,rid.weight,rid.timeStamp FROM user, beehive as bee, readings as rid WHERE bee.beeHive_ID=rid.beeHive_ID 
        AND bee.user_ID=$userID";
                if ($stmtSelect = mysqli_prepare($conn, $sqlSelect)) {
                    $executeSelect = mysqli_stmt_execute($stmtSelect);
                    if ($executeSelect == FALSE) {
                        echo mysqli_error($conn);
                    }
                    // mysqli_stmt_bind_result($stmtSelect, $userName);
                    mysqli_stmt_bind_result($stmtSelect, $internalTemp, $externalTemp, $humidity, $weight, $timestamp);
                    mysqli_stmt_store_result($stmtSelect);
                    if (mysqli_stmt_num_rows($stmtSelect) == 0) {
                        echo "No beehives found";
                    } else {
                        while (mysqli_stmt_fetch($stmtSelect)) {
                            echo "<div class='beehive'>
                        <p>Ext. temp:" . $externalTemp . " </p>
                        <p>Int. temp:" . $internalTemp . " </p>
                        <p>Humidity:" . $humidity . " </p>
                        <p>Weight: " . $weight . "</p>
                        <p>" . $_SESSION['userName'] . "</p>
                    </div>";
                        }
                    }
                }
                ?>
            </div>
        </main>
        <footer></footer>
    </div>
    <script src="../js/scripts.js"></script>
</body>

</html>