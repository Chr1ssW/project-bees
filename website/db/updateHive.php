<?php
require("connect.php");
if(isset($_POST["updateHive"]))
{
    session_start();
    $beeID = $_SESSION['id'];

    $beeHiveLocation = htmlentities($_POST['editBeehiveLocation']);
    if (empty($beeHiveLocation)) {
        header("Location: userBeeHives.php?=empty&input");
    } else {
        $sqlUpdateBeeHive = "UPDATE beehive SET location = ? WHERE sensorID = ?";
        if ($stmtUpdateBeeHive = mysqli_prepare($conn, $sqlUpdateBeeHive)) {
            mysqli_stmt_bind_param($stmtUpdateBeeHive, 'ss', $beeHiveLocation, $beeID);
            if (mysqli_stmt_execute($stmtUpdateBeeHive) == FALSE) {
                echo mysqli_error($conn);
            }
            mysqli_stmt_close($stmtUpdateBeeHive);
            header("Location: ../html/userBeeHives.php?location=updated");
        }
    }
    unset($beeID);
}