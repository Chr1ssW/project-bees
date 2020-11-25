<?php
// include("connect.php");
$username = "";
$email    = "";
$errors = array();

if (isset($_POST['signup'])) {
    $username = mysqli_real_escape_string($conn, $_POST['userNameIn']);
    $email = mysqli_real_escape_string($conn, $_POST['emailAddressIn']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['passwordIn']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['passwordRepeat']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (!filter_var(empty($email), FILTER_VALIDATE_EMAIL))) {
        array_push($errors, "Valid email address is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    $user_check_query = "SELECT * FROM user WHERE name='$username' OR email='$email' LIMIT 1;";
    $result = mysqli_query($conn, $user_check_query);

    if (mysqli_num_rows($result) >= 1) { // if user exists
        array_push($errors, "Username or email already taken");
    }

    if (count($errors) == 0) {
        $password = password_hash($password_1, PASSWORD_DEFAULT);

        $query = "INSERT INTO user (name, passwd, email) 
  			  VALUES ('$username', '$password', '$email')";
        if (mysqli_query($conn, $query)) {
            echo "You have been successsfully registered";
        } else {
            echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
        }
        mysqli_close($conn);
        header("Location: ../html/index.php?successfully&registered");
    }
}
