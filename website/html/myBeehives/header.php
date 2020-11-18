<?php
require("../../db/connect.php");
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/main.css">
    <title>Beehive Monitoring System</title>
</head>
<div id="sidebar" class="mobile-nav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <ul>
        <li>
            <a href="#">
                <span class="icon"><img src="../../resources/img/account.png" alt="account"></span>
                <span class="title">Account</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon"><img src="../../resources/img/dashboard.png" alt="account"></span>
                <span class="title">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="../myBeehives.html">
                <span class="icon"><img src="../../resources/img/mybeehives.png" alt="account"></span>
                <span class="title">My beehives</span>
            </a>
        </li>
        <li>
            <a href="../beehivesMap.html">
                <span class="icon"><img src="../../resources/img/map.png" alt="account"></span>
                <span class="title">Map</span>
            </a>
        </li>
        <li class="logout">
            <a href="#">
                <span class="icon"><img src="../../resources/img/logout.png" alt="account"></span>
                <span class="title">Log out</span>
            </a>
        </li>
    </ul>
</div>
<div class="popup-screen" id="login-container">
    <div class="popup-form">
        <a href="javascript:void(0)" class="closebtn" onclick="closeLogin()">&times;</a>
        <div class="loginPic">
            <img src="../../resources/img/account.png" alt="Account">
        </div>
        <!--Need to change it to post in the future-->
        <form method="GET" action="#" id="loginForm">
            <input type="text" placeholder="Username" id="userName">
            <input type="password" placeholder="Password" id="password">
            <span id="remember-container">
                <input type="checkbox" id="remember">
                <label for="remember">Remember me</label>
            </span>
        </form>
        <div class="invalid-response">The combination of email address and password is not valid!</div>
        <button type="submit" form="loginForm">Sign in</button>
    </div>
</div>
<div class="popup-screen" id="signup-container">
    <div class="popup-form">
        <a href="javascript:void(0)" class="closebtn" onclick="closeSignup()">&times;</a>
        <div class="loginPic">
            <img src="../../resources/img/account.png" alt="Account">
        </div>
        <!--Need to change it to post in the future-->
        <form method="GET" action="#" id="signupForm">
            <input type="text" placeholder="Username" id="userNameIn">
            <input type="text" placeholder="Email address" id="emailAddressIn">
            <input type="password" placeholder="Password" id="passwordIn">
            <input type="password" placeholder="Repeat password" id="passwordRepeat">
        </form>
        <div class="invalid-response">Passwords do not match!</div>
        <button type="submit" form="signupForm">Sign up</button>
    </div>
</div>
<div class="popup-screen" id="addHive-container">
    <div class="popup-form">
        <div class="beehiveAdd">
            <a href="javascript:void(0)" class="closebtn" onclick="closeAddHive()">&times;</a>
            <!--Need to change it to post in the future-->
            <form method="POST" action="../../db/addBeehiveManual.php" id="signupForm">
                <input type="text" name="beehiveLocation" placeholder="Beehive location" id="locationIn">
                <input type="text" name="sensorNumber" placeholder="SensorNumber" id="deviceInf">
            </form>
            <div class="invalid-response">Passwords do not match!</div>
        </div>
        <button type="submit" form="signupForm">Add new hive</button>
    </div>
</div>
<div id="main">
    <header>
        <nav>
            <span>
                <a href="javascript:void(0)" onclick="openNav()">
                    <img src="../../resources/img/menu.png" alt="menu">
                </a>
                <h2>Beehive Monitoring System</h2>
            </span>
            <span>
                <button class="signup-btn" type="button" onclick="openSignup()">Sign up</button>
                <button class="signin-btn" type="button" onclick="openLogin()">Sign in</button>
            </span>
        </nav>
    </header>

    <body>