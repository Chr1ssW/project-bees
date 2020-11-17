<!DOCTYPE html>
<?php
require_once("../db/connect.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/slick.css" />
    <link rel="stylesheet" type="text/css" href="../css/slick-theme.css" />
    <title>Beehive Monitoring System</title>
</head>

<body>
    <div id="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <ul>
            <li>
                <a href="#">
                    <span class="icon"><img src="../resources/img/account.png" alt="Account"></span>
                    <span class="title">Account</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><img src="../resources/img/dashboard.png" alt="Dashboard"></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="myBeehives.html">
                    <span class="icon"><img src="../resources/img/mybeehives.png" alt="My beehives"></span>
                    <span class="title">My beehives</span>
                </a>
            </li>
            <li>
                <a href="beehivesMap.html">
                    <span class="icon"><img src="../resources/img/map.png" alt="Beehves Map"></span>
                    <span class="title">Map</span>
                </a>
            </li>
            <li class="logout">
                <a href="#">
                    <span class="icon"><img src="../resources/img/logout.png" alt="account"></span>
                    <span class="title">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="popup-screen" id="login-container">
        <div class="popup-form">
            <a href="javascript:void(0)" class="closebtn" onclick="closeLogin()">&times;</a>
            <div class="loginPic">
                <img src="../resources/img/account.png" alt="Account">
            </div>
            <!--Need to change it to post in the future-->
            <form method="POST" action="../db/login.php" id="loginForm">
                <input type="text" placeholder="Username" name="userName" id="userName">
                <input type="password" placeholder="Password" name="passwd" id="password">
                <span id="remember-container">
                    <input type="checkbox" id="remember">
                    <label for="remember">Remember me</label>
                </span>
                <!-- <input type="submit" name="submit"> -->
            </form>
            <div class="invalid-response">The combination of email address and password is not valid!</div>
            <button type="submit" name="submit" form="loginForm">Sign in</button>
        </div>
    </div>
    <div class="popup-screen" id="signup-container">
        <div class="popup-form">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSignup()">&times;</a>
            <div class="loginPic">
                <img src="../resources/img/account.png" alt="Account">
            </div>
            <!--Need to change it to post in the future-->
            <form method="POST" action="index.php#signup-container" id="signupForm">
                <input type="text" placeholder="Username" name="userNameIn">
                <input type="text" placeholder="Email address" name="emailAddressIn">
                <input type="password" placeholder="Password" name="passwordIn">
                <input type="password" placeholder="Repeat password" name="passwordRepeat">
            </form>
            <div class="invalid-response">
                <?php
                include("../db/signup.php");
                foreach($errors as $error) {
                    echo $error . '<br>';
                }
                ?>
            </div>
            <button type="submit" form="signupForm" name="signup">Sign up</button>
        </div>
    </div>
    <div id="main">
        <header>
            <nav>
                <span>
                    <a href="javascript:void(0)" onclick="openNav()">
                        <img src="../resources/img/menu.png" alt="menu">
                    </a>
                    <h2>Beehive Monitoring System</h2>
                </span>
                <span>
                    <button class="signup-btn" type="button" onclick="openSignup()">Sign up</button>
                    <button class="signin-btn" type="button" onclick="openLogin()">Sign in</button>
                </span>
            </nav>
        </header>
        <main>
            <div class="slideshow">
                <div class="slide">
                    <div class="text">
                        <h1>Welcome!</h1>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                            sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna
                            aliquam erat volutpat. Ut wisi enim ad minim veniam.</p>
                    </div>
                    <img src="../resources/img/slide1.png" alt="Bee">
                </div>
                <div class="slide">
                    <div class="text">
                        <h1>Welcome!</h1>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                            sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna
                            aliquam erat volutpat. Ut wisi enim ad minim veniam.</p>
                    </div>
                    <img src="../resources/img/slide1.png" alt="Bee">
                </div>
                <div class="slide">
                    <div class="text">
                        <h1>Made by students</h1>
                        <p>This system was designed and created by students of NHLStenden University of
                            Applied Sciences.</p>
                    </div>
                    <img src="../resources/img/slide3.png" alt="Bee">
                </div>
            </div>
        </main>
        <footer></footer>
    </div>

    <script src="../js/scripts.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="../js/slick.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.slideshow').slick({
                arrows: false,
                dots: true,
            });
        });
    </script>
</body>

</html>