<?php

session_start();
// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
define('DB_SERVER', "eu-cdbr-west-03.cleardb.net");
define('DB_USERNAME', "b8041e339aa3d1");
define('DB_PASSWORD', "06634b97");
define('DB_NAME', "heroku_574ab15869a35be");

/* Attempt to connect to MySQL database */
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// REGISTER USER
if(isset($_POST['signup']))
{
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['userNameIn']);
    $email = mysqli_real_escape_string($db, $_POST['emailAddressIn']);
    $password_1 = mysqli_real_escape_string($db, $_POST['passwordIn']); 
    $password_2 = mysqli_real_escape_string($db, $_POST['passwordRepeat']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
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

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database

        $query = mysqli_prepare($db,"INSERT INTO user VALUES (null, ?, ?, ?)");
        mysqli_stmt_bind_param($query, 'isss', $username, $password, $email);
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
    }
    else
    {
        foreach ($errors as $error) {
            echo "$error <br>";
        }
    }
}
else
{
    echo 'error';
}
?>