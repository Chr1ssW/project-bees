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
    } else {
        return false;
    }
}

function createUser($conn, $username, $password, $email)
{
    $sql = "INSERT INTO user (null, $username, $password, $email) VALUES (?, ?, ?)";
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
