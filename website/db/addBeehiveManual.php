<?php
require("connect.php");

if (isset($_POST['submit'])) {
    $beeHiveLocation = htmlentities($_POST['beehiveLocation']);
    $sensorNumber = htmlentities($_POST['sensorNumber']);
    if (empty($beeHiveLocation) || empty($sensorNumber)) {
        echo ("Empty input");
    } else {
        //We check if beehive specified in form already exists
        $sqlCheckIfBeehiveAlreadyExists = "SELECT s.sensorNumber, bh.Location FROM beeHive as bh, sensor as s WHERE  s.sensoNumber=? AND bh.location=?";
    }
} else {
    echo ("Illegal entrance");
}
