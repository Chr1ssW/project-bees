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
        <script>
            if (Boolean(<?php echo (isset($_SESSION['loggedin'])) ?>)) {
                var lines = '<li>';
                lines += '<a href="account.php">';
                lines += '<span class="icon"><img src="../resources/img/account.png" alt="Account"></span>';
                lines += '<span class="title">Account</span>';
                lines += '</a>';
                lines += '</li>';
                document.write(lines);
            }
        </script>
        <li>
            <a href="#">
                <span class="icon"><img src="../resources/img/dashboard.png" alt="Dashboard"></span>
                <span class="title">Dashboard</span>
            </a>
        </li>

        <script>
            if (Boolean(<?php echo (isset($_SESSION['loggedin'])) ?>)) {
                var lines = '<li>';
                lines += '<a href="userBeeHives.php">';
                lines += '<span class="icon"><img src="../resources/img/mybeehives.png" alt="My beehives"></span>';
                lines += '<span class="title">My beehives</span>';
                lines += '</a>';
                lines += '</li>';
                document.write(lines);
            }
        </script>
        <li>
            <a href="beehivesMap.php">
                <span class="icon"><img src="../resources/img/map.png" alt="Beehves Map"></span>
                <span class="title">Map</span>
            </a>
        </li>

        <script>
            if (Boolean(<?php echo (isset($_SESSION['loggedin'])) ?>)) {
                var lines = '<li class="logout">';
                lines += '<a href="../db/logout.php">';
                lines += '<span class="icon"><img src="../resources/img/logout.png" alt="account"></span>';
                lines += '<span class="title">Log out</span>';
                lines += '</a>';
                lines += '</li>';
                document.write(lines);
            }
        </script>
    </ul>
</div>
<div class="popup-screen" id="login-container">
    <div class="popup-form">
        <a href="javascript:void(0)" class="closebtn" onclick="closeLogin()">&times;</a>
        <div class="loginPic">
            <img src="../resources/img/account.png" alt="Account">
            </div>

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
                require_once("../db/login.php");
                foreach ($loginErrors as $loginError) {
                    echo $loginError . '<br>';
                }
                ?>
            </div>
            <button type="submit" name="signin" form="loginForm">Sign in</button>
    </div>
</div>
<div class="popup-screen" id="signup-container">
    <div class="popup-form">
        <a href="javascript:void(0)" class="closebtn" onclick="closeSignup()">&times;</a>
        <div class="loginPic">
            <img src="../resources/img/account.png" alt="Account">
        </div>
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