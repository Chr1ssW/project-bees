<?php
$username = "b8041e339aa3d1";
$passwd = "06634b97";
$HostName = "eu-cdbr-west-03.cleardb.net";
$DBName = "heroku_574ab15869a35be";

$conn = mysqli_connect($HostName, $username, $passwd, $DBName);

if(!$conn)
{
    die("Connection to the database failed" . mysqli_connect_error());
}