<?php
require("../db/connect.php");
if(!isset($_SESSION['loggedin'])){
    header('Location:../html/index.php');
}
?>

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
        require_once("sidebarAndPopup.php");
        ?>
        <div class="popup-screen" id="addHive-container">
            <div class="popup-form">
                <div class="beehiveAdd">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeAddHive()">&times;</a>
                    <!--Need to change it to post in the future-->
                    <form method="POST" action="../db/addBeehiveManual.php" id="addBeeHive">
                        <input type="text" name="beehiveLocation" placeholder="Beehive location" id="locationIn">
                        <input type="text" name="sensorNumber" placeholder="SensorNumber" id="deviceInf">
                    </form>
                </div>
                <button type="submit" name="submit" form="addBeeHive">Add new hive</button>
            </div>
        </div>
        <div class="popup-screen" id="edit-container">
            <div class="popup-form">
                <div class="beehiveAdd">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeEditHive()">&times;</a>
                    <div class="change-form">
                        <form method="POST" action="../db/addBeehiveManual.php" id="editBeeHive">
                            <input type="text" name="beehiveLocation" placeholder="Beehive location" id="locationNew">
                            <p id="beehive-id"></p>
                        </form>
                    </div>
                </div>
                <button type="submit" name="submit" form="editBeeHive">Update</button>
            </div>
        </div>
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
                </nav>
            </header>
            <main>
                <div id="collection-wrapper">
                    <div class="beehive new-hive" onclick="openAddHive()">
                        <img src="../resources/img/cross.png" alt="">
                        <p>Add new beehive</p>
                    </div>
                    <?php
                    $userID = $_SESSION['userID'];


                    //We select userID, beeHives assigned to userID and readings from those beeHives
                    $sqlSelect = "SELECT b.sensorID, b.location, bd.externalTemp, bd.internalTemp, bd.humidity, bd.weight, bd.timeStamp
                                  FROM beehive as b, beehive_data as bd, user as u
                                  WHERE b.sensorID = bd.sensorID
                                  AND u.userID=$userID";
                    if ($stmtSelect = mysqli_prepare($conn, $sqlSelect)) {
                        $executeSelect = mysqli_stmt_execute($stmtSelect);
                        if ($executeSelect == FALSE) {
                            echo mysqli_error($conn);
                        }
                        mysqli_stmt_bind_result($stmtSelect, $beeID, $location, $externalTemp, $internalTemp, $humidity, $weight, $timestamp);
                        mysqli_stmt_store_result($stmtSelect);

                        //We check if there are any beehives assigned to user
                        if (mysqli_stmt_num_rows($stmtSelect) == 0) {
                            echo "No beehives found";
                        } else {
                            while (mysqli_stmt_fetch($stmtSelect)) {
                                echo "<div class='beehive' onClick=\"openEditHive($beeID)\">
                        <p>Ext. temp:" . $externalTemp . " </p>
                        <p>Int. temp:" . $internalTemp . " </p>
                        <p>Humidity:" . $humidity . " </p>
                        <p>Weight: " . $weight . "</p>
                        <p>" . $location . "</p>
                    </div>";
                            }
                        }
                        mysqli_stmt_close($stmtSelect);
                    }
                    ?>
                </div>
            </main>
            <footer></footer>
        </div>
        <script src="../js/scripts.js"></script>
    </body>

</html>