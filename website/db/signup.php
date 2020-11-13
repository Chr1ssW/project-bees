<?php

if(isset($_POST['signupForm']))
{
    $username = $_POST['userNameIn'];
    $password = $_POST['passwordIn'];
    $passwordRep = $_POST['passwordRepeat'];
    $email = $_POST['emailAddressIn'];

    require_once 'connect.php';
    require_once 'functions.php';



    if(empty($username) || empty($password) || empty($passwordRep) || empty($email))
    {
        header("Locaton: ../html/index.html?=empty%user%input");
    }
    else if($password != $passwordRep)
    {
        //Passwords must match
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        //Invalid email format
    }

}
