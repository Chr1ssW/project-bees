<!DOCTYPE html>
<?php
require_once("../db/connect.php");

    $sqlSelect = "SELECT date(timeStamp), internalTemp, externalTemp FROM beehive_data WHERE timeStamp > '2020-12-1' GROUP BY date(timeStamp) ORDER BY timeStamp"; 

    if ($stmtSelect = mysqli_prepare($conn, $sqlSelect)) {
        $executeSelect = mysqli_stmt_execute($stmtSelect);
        if ($executeSelect == FALSE) {
            echo mysqli_error($conn);
        }
        mysqli_stmt_bind_result($stmtSelect, $timeStamp, $internalTemp, $externalTemp);
        mysqli_stmt_store_result($stmtSelect);
        
    }
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/slick.css" />
        <link rel="stylesheet" type="text/css" href="../css/slick-theme.css" />
        <title>Beehive Monitoring System</title>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Year', 'Internal', 'External'],
            <?php
                if (!mysqli_stmt_num_rows($stmtSelect) == 0){
                    while (mysqli_stmt_fetch($stmtSelect)) {
                        echo "['$timeStamp', $internalTemp, $externalTemp], ";
                    }
                }

                mysqli_stmt_close($stmtSelect);
            ?>
            ]);

            var options = {
            title: 'Internal temperature',
            hAxis: {title: 'Date'},
            vAxis: {minValue: 0},
            legend: {position: 'bottom'}
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
        </script>
    </head>
    <body>
        <?php
        require_once("sidebarAndPopup.php");
        ?>
        <div id="main">
            <header>
                <nav>
                    <span>
                        <a href="index.php">
                            <img src="../resources/img/back.png" alt="menu">
                        </a>
                    </span>
                </nav>
            </header>
            <main id="dashboad-bg">
                <div id="dashboard-canvas">
                    <!--- <div id="chart_div" style="width: 40%; height: 500px;"></div> -->
                    <iframe src="http://localhost:3000/d-solo/MCZwc-1Mk/beehive-data-dashboard?orgId=1&from=1607848641382&to=1608021441382&var-Location=NL,%20Emmen%20De%20Veenkampen%205&panelId=2" width="450" height="200" frameborder="0"></iframe>
                </div>
            </main>
            <footer></footer>
        </div>
        <script src="../js/scripts.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="../js/slick.min.js"></script>
    </body>
</html>