<?php
require("connect.php");

if (isset($_POST['submit'])) {
    $beeHiveLocation = htmlentities($_POST['beehiveLocation']);
    $sensorNumber = htmlentities($_POST['sensorNumber']);
    $userID = $_SESSION['userID'];
    if (empty($beeHiveLocation) || empty($sensorNumber)) {
        echo ("Empty input");
    } else {
        //We check if beehive specified in form already exists
        // $sqlCheckIfBeehiveAlreadyExists = "SELECT s.sensorNumber, bh.Location FROM beeHive as bh, sensor as s WHERE  s.sensoNumber=? AND bh.location=?";

        //We are inserting into beeHive
        $sqlInsertBeeHive = "INSERT INTO `beehive` VALUES(?,?,?)";
        if ($stmtInsertBeeHive = mysqli_prepare($conn, $sqlInsertBeeHive)) {
            mysqli_stmt_bind_param($stmtInsertBeeHive, 'ssi', $sensorNumber, $beeHiveLocation, $userID);
            if (mysqli_stmt_execute($stmtInsertBeeHive) == FALSE) {
                echo mysqli_error($conn);
            }
            mysqli_stmt_close($stmtInsertBeeHive);
            header("Location: ../html/userBeeHives.php?=beehive%added");
        }
    }
} else {
    echo ("Illegal entrance");
}
