<?php
echo "hello";
include 'functions.php';

$username = "b8041e339aa3d1";
$passwd = "06634b97";
$HostName = "eu-cdbr-west-03.cleardb.net";
$DBName = "heroku_574ab15869a35be";

$conn = mysqli_connect($HostName, $username, $passwd, $DBName);

if(!$conn)
{
    die("Connection to the database failed" . mysqli_connect_error());
}

if(isset($_POST['signupForm']))
{
    $username = $_POST['userNameIn'];
    $password = $_POST['passwordIn'];
    $passwordRep = $_POST['passwordRepeat'];
    $email = $_POST['emailAddressIn'];

    if(isEmptyInput($username, $password, $passwordRep, $email))
    {
        header("Location: ../html/index.html?error=empty%user%input");
        exit();
    }
    if(isPassMatch($password, $passwordRep))
    {
        header("Location: ../html/index.html?error=password%dont%match");
        exit();
    }
    if(isValidEmail($email))
    {
        header("Location: ../html/index.html?error=inavlid%email");
        exit();
    }

    if(!userExists($conn, $username, $email))
    {
        createUser($conn, $username, $password, $email);
        echo "User created successfully";
    }
}
?>