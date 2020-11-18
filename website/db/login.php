<?php
require("connect.php");
if (isset($_POST['submit'])) {
    $username = htmlentities($_POST['userName']);
    $passwd = htmlentities($_POST['passwd']);
    // $username = strtolower($username);
    trim($username);
    trim($passwd);

    if (empty($username) || empty($passwd)) {
        echo "You forgot to fill out one of the inputs";
    } else {
        $findUser = "SELECT `user_ID`,`name`,passwd,email  FROM user WHERE name=?";
        if ($stmtPrepareToFindUser = mysqli_prepare($conn, $findUser)) {
            mysqli_stmt_bind_param($stmtPrepareToFindUser, 's', $username);

            if (mysqli_stmt_execute($stmtPrepareToFindUser) == FALSE) {
                echo mysqli_error($conn);
            }
            mysqli_stmt_bind_result($stmtPrepareToFindUser, $foundUserID, $foundUsername, $foundUserPwd, $foundUserEmail);
            mysqli_stmt_store_result($stmtPrepareToFindUser);
            if (mysqli_stmt_num_rows($stmtPrepareToFindUser) == 0) {
                echo "User not found";
            } else {
                // $passwdCheck = password_verify($passwd, $foundUserPwd);
                if (md5($passwd) == md5($foundUserPwd)) {
                    echo "Wrong password";
                } else {
                    session_start();
                    $_SESSION['userID'] = $foundUserID;
                    $_SESSION['userName'] = $foundUsername;
                    $_SESSION['userEmail'] = $foundUserEmail;
                    header('Location:../html/index.php?SuccessLoggingIn');
                }
            }
            mysqli_stmt_close($stmtPrepareToFindUser);
        }
    }
} else {
    echo "Illegal entrance";
}
