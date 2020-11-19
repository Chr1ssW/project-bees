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
    <?php
    require_once("sidebarAndPopup.html");
    ?>
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
                autoplay: true,
                autoplaySpeed: 3000
            });
        });

        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const reloaded = urlParams.get('reloaded')
        console.log(reloaded);

        if (reloaded == 'signin') {
            openLogin();
        } else if (reloaded == 'signup') {
            openSignup();
        }
    </script>
</body>

</html>