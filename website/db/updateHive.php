<?php
if(isset($_POST["updateHive"]))
{
    $beeHiveLocation = htmlentities($_POST['editBeehiveLocation']);
    $userID = $_SESSION['userID'];
    if (empty($beeHiveLocation)) {
        header("Location: ../html/userBeeHives.php?=empty&input");
    } else {
        $sqlInsertBeeHive = "UPDATE beehive SET location = ? WHERE sensorID = ?";
        if ($stmtInsertBeeHive = mysqli_prepare($conn, $sqlInsertBeeHive)) {
            mysqli_stmt_bind_param($stmtInsertBeeHive, 'ss', $beeHiveLocation, $beeID);
            if (mysqli_stmt_execute($stmtInsertBeeHive)) {
                header("Location: ../html/userBeeHives.php?=beehive%updated");
            }
            else
            {
                mysqli_error($conn);
            }
            mysqli_stmt_close($stmtInsertBeeHive);
        }
    }
}
