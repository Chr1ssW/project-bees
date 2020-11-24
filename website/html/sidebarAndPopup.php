<div id="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <ul>
        <li class="mobile-signin" onclick="openLogin()">
            <a href="#">
                <span class="icon"><img src="../resources/img/login.png" alt="account"></span>
                <span class="title">Sign in</span>
            </a>
        </li>
        <li class="mobile-signup" onclick="openSignup()">
            <a href="#">
                <span class="icon"><img src="../resources/img/signup.png" alt="account"></span>
                <span class="title">Sign up</span>
            </a>
        </li>
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
            <a href="userBeeHives.php">
                <span class="icon"><img src="../resources/img/mybeehives.png" alt="My beehives"></span>
                <span class="title">My beehives</span>
            </a>
        </li>
        <li>
            <a href="beehivesMap.php">
                <span class="icon"><img src="../resources/img/map.png" alt="Beehves Map"></span>
                <span class="title">Map</span>
            </a>
        </li>
        <li class="logout">
            <a href="../db/logout.php">
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
        <form method="POST" action="index.php?reloaded=signin" id="loginForm">
            <input type="text" placeholder="Username/Email" name="userName" id="userName">
            <input type="password" placeholder="Password" name="passwd" id="password">
            <span id="remember-container">
                <input type="checkbox" id="remember">
                <label for="remember">Remember me</label>
            </span>
            <!-- <input type="submit" name="submit"> -->
        </form>
        <div class="invalid-response">
            <?php
            // if (isset($_GET['error'])) {
            //     echo '<p>' . $_GET['error'] . '</p>';
            // }
            include("../db/login.php");
            foreach ($loginErrors as $loginError) {
                echo $loginError . '<br>';
            }
            ?>
        </div>
        <button type="submit" name="signin" form="loginForm" onsubmit="openLogin()">Sign in</button>
    </div>
</div>
<div class="popup-screen" id="signup-container">
    <div class="popup-form">
        <a href="javascript:void(0)" class="closebtn" onclick="closeSignup()">&times;</a>
        <div class="loginPic">
            <img src="../resources/img/account.png" alt="Account">
        </div>
        <!--Need to change it to post in the future-->
        <form method="POST" action="index.php?reloaded=signup" id="signupForm">
            <input type="text" placeholder="Username" name="userNameIn">
            <input type="text" placeholder="Email address" name="emailAddressIn">
            <input type="password" placeholder="Password" name="passwordIn">
            <input type="password" placeholder="Repeat password" name="passwordRepeat">
        </form>
        <div class="invalid-response">
            <?php
            include("../db/signup.php");
            foreach ($errors as $error) {
                echo $error . '<br>';
            }
            ?>
        </div>
        <button type="submit" form="signupForm" name="signup" onsubmit="openSignup()">Sign up</button>
    </div>
</div>