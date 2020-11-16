<?php

function userExists($conn, $username, $email)
{
    $sql = "SELECT * FROM user WHERE user_ID = ? OR user email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../html/index.html?error");
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    if ($row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt))) {
        if ($row == $username) {
            echo "Username already added";
        }
        return true;
    } else {
        return false;
    }
}

function createUser($conn, $username, $password, $email)
{
    $sql = "INSERT INTO user ($username, $password, $email) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../html/index.html?error");
    }

    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sss", $username, $hashPassword, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location ../html/index.html?error=no");
    exit();
}

function isEmptyInput($username, $password, $passwordRep, $email)
{
    if(empty($username) || empty($password) || empty($passwordRep) || empty($email))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function isPassMatch($password, $passwordRep)
{
    if($password != $passwordRep)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function isValidEmail($email)
{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        return true;
    }
    else
    {
        return false;
    }
}
?>