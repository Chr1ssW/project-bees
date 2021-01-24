<?php
require("connect.php");
$loginErrors = array();
if (isset($_POST['signin'])) {
    $username = htmlentities($_POST['userName']);
    $passwd = htmlentities($_POST['passwd']);

    trim($username);
    trim($passwd);

    if (empty($username)) {
        // header('Location:../html/index.php?error=Username_Or_Email_is_required');
        // exit();
        array_push($loginErrors, "Username Or Email is required");
    }
    if (empty($passwd)) {
        // header('Location:../html/index.php?error=Password_is_required');
        // exit();
        array_push($loginErrors, "Password is required");
    }
    if (count($loginErrors) == 0) {
        $findUser = "SELECT user_id, name, password, email FROM user WHERE email=? OR name=?";
        if ($stmtPrepareToFindUser = mysqli_prepare($conn, $findUser)) {
            mysqli_stmt_bind_param($stmtPrepareToFindUser, 'ss', $email, $username);

            if (mysqli_stmt_execute($stmtPrepareToFindUser) == FALSE) {
                echo mysqli_error($conn);
            }
            mysqli_stmt_bind_result($stmtPrepareToFindUser, $foundUserID, $foundUsername, $foundUserPwd, $foundUserEmail);
            mysqli_stmt_store_result($stmtPrepareToFindUser);
            if (mysqli_stmt_num_rows($stmtPrepareToFindUser) == 0) {
                // header('Location:../html/index.php?error=User_with_username/email_' . $username . '_does_not_exist');
                // exit();
                array_push($loginErrors, "User with username/email " . $username . " does not exist");
            } else {
                while (mysqli_stmt_fetch($stmtPrepareToFindUser)) {
                    if (password_verify($passwd, $foundUserPwd)) {
                        $_SESSION['userID'] = $foundUserID;
                        $_SESSION['userName'] = $foundUsername;
                        $_SESSION['userEmail'] = $foundUserEmail;
                        $_SESSION['loggedin'] = true;

                        echo "<script> window.location.replace('index.php')</script>";
                        // header('Location:../html/index.php?SuccessLoggingIn');
                        // die();
                    } else {
                        // header('Location:../html/index.php?error=Wrong_password');
                        // exit();
                        array_push($loginErrors, "Wrong password");
                    }
                }
            }
            mysqli_stmt_close($stmtPrepareToFindUser);
        }
    }
    mysqli_close($conn);
}
