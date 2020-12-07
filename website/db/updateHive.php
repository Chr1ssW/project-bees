
<script>
    const x = document.getElementById("beehive-id").innerText;
</script>
<?php
require("connect.php");
session_start();
if(isset($_POST["updateHive"]))
{

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
        }
    }

}