<?php
require_once 'connect.php';
session_start();
$username = "";
$email    = "";
$errors = array();

if(isset($_POST['signup']))
{
    $username = mysqli_real_escape_string($db, $_POST['userNameIn']);
    $email = mysqli_real_escape_string($db, $_POST['emailAddressIn']);
    $password_1 = mysqli_real_escape_string($db, $_POST['passwordIn']); 
    $password_2 = mysqli_real_escape_string($db, $_POST['passwordRepeat']);

    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    $user_check_query = "SELECT * FROM users WHERE name='$username' OR email='$email' LIMIT 1;";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    if (count($errors) == 0) {
        $password = md5($password_1);

        $query = "INSERT INTO user (name, passwd, email) 
  			  VALUES ('$username', '$password', '$email')";
        if(mysqli_query($db, $query))
        {
            echo "You have been successfully registered";
        }
        else
        {
            echo "ERROR: Could not able to execute $query. " . mysqli_error($db);
        }
        mysqli_close($db);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header("Location: ../html/index.php?success");
    }
    else
    {
        "Location: .. /html/index.php?error";
    }
}
?>