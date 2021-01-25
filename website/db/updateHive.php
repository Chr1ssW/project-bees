<?php

if (isset($_POST["updateHive"])) {
    $beeID = $_POST['id'];
    $beeHiveLocation = htmlentities($_POST['editBeehiveLocation']);
    $sensorNumber = htmlentities($_POST['sensorNumber']);

    function update_location($beeID, $beeHiveLocation)
    {
        require("connect.php");
        $sqlInsertBeeHive = "UPDATE beehive SET location = ? WHERE sensor_id = ?";
        if ($stmtInsertBeeHive = mysqli_prepare($conn, $sqlInsertBeeHive)) {
            mysqli_stmt_bind_param($stmtInsertBeeHive, 'ss', $beeHiveLocation, $beeID);
            if (mysqli_stmt_execute($stmtInsertBeeHive)) {
                header("Location: ../html/userBeeHives.php?=beehive%updated");
            } else {
                mysqli_error($conn);
            }
            mysqli_stmt_close($stmtInsertBeeHive);
        }
    }

    function update_sensor($beeID, $sensorNumber)
    {
        require("connect.php");
        $sqlInsertBeeHive = "UPDATE beehive SET sensor_id = ? WHERE sensor_id = ?";
        if ($stmtInsertBeeHive = mysqli_prepare($conn, $sqlInsertBeeHive)) {
            mysqli_stmt_bind_param($stmtInsertBeeHive, 'ss', $sensorNumber, $beeID);
            if (mysqli_stmt_execute($stmtInsertBeeHive)) {
                header("Location: ../html/userBeeHives.php?=beehive%updated");
            } else {
                mysqli_error($conn);
            }
            mysqli_stmt_close($stmtInsertBeeHive);
        }
    }

    if (empty($beeHiveLocation) && empty($sensorNumber)) {
        header("Location: ../html/userBeeHives.php?=empty&input");
    } 
    elseif (!empty($beeHiveLocation) && empty($sensorNumber))
    {
        update_location($beeID, $beeHiveLocation);
    }
    elseif (empty($beeHiveLocation) && !empty($sensorNumber))
    {
        update_sensor($beeID, $sensorNumber);
    }
    elseif (!empty($beeHiveLocation) && !empty($sensorNumber))
    {
        update_location($beeID, $beeHiveLocation);
        update_sensor($beeID, $sensorNumber);
    }

   
}
else if (isset($_POST["deleteHive"]))
{
    $beeID = $_POST['id'];
    require("connect.php");
    $delete_hive = "DELETE FROM beehive WHERE sensor_id = ?";
        if ($delete_hive = mysqli_prepare($conn, $delete_hive)) {
            mysqli_stmt_bind_param($delete_hive, 's', $beeID);
            if (mysqli_stmt_execute($delete_hive)) {
                header("Location: ../html/userBeeHives.php?=beehive%deleted");
            } else {
                mysqli_error($conn);
            }
            mysqli_stmt_close($delete_hive);
        }
}
?>