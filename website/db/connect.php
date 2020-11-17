<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
session_start();
// $_SESSION['userID'] = 1;
// $_SESSION['userName'] = "Adam";
$username = "b8041e339aa3d1";
$passwd = "06634b97";
$HostName = "eu-cdbr-west-03.cleardb.net";
$DBName = "heroku_574ab15869a35be";

$conn = mysqli_connect($HostName, $username, $passwd, $DBName);

if (!$conn) {
    die("Connection to the database failed" . mysqli_connect_error());
}
