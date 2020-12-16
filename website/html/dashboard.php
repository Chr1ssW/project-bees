<!DOCTYPE html>
<?php
require_once("../db/connect.php");

    header("Refresh:90");

    //Getting default date values
    $start_date = date('Y-m-d');
    $date = DateTime::createFromFormat('Y-m-d', $start_date);

    $date->modify('-7 day');

    $startDate;
    $endDate;
    $selectedHive;

    if (isset($_GET['updateDashboard']))
    {
        $startDate = mysqli_real_escape_string($conn, htmlentities($_GET['startDate']));
        $endDate = mysqli_real_escape_string($conn, htmlentities($_GET['endDate']));
        $selectedHive = mysqli_real_escape_string($conn, htmlentities($_GET['selectedHive']));
    }else{
        $startDate = $date->format('Y-m-d');
        $endDate = date('Y-m-d');
        $selectedHive = 'node_1';
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

            <?php
                //Selecting temperature information
                $sqlSelect = "SELECT  date(timeStamp), internalTemp, externalTemp 
                FROM beehive_data 
                WHERE timeStamp >= ? 
                    AND timeStamp <= ?
                    AND sensorID = ?
                GROUP BY date(timeStamp) 
                ORDER BY timeStamp"; 

                if ($stmtSelect = mysqli_prepare($conn, $sqlSelect)) {
                mysqli_stmt_bind_param($stmtSelect, 'sss',  $startDate, $endDate, $selectedHive);
                $executeSelect = mysqli_stmt_execute($stmtSelect);
                if ($executeSelect == FALSE) {
                echo mysqli_error($conn);
                }
                mysqli_stmt_bind_result($stmtSelect, $timeStamp, $internalTemp, $externalTemp);
                mysqli_stmt_store_result($stmtSelect);

                }
            ?>

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                ['Date', 'External', 'Internal'],
                <?php
                    if (!mysqli_stmt_num_rows($stmtSelect) == 0){
                        while (mysqli_stmt_fetch($stmtSelect)) {
                            echo "['$timeStamp', $externalTemp, $internalTemp], ";
                        }
                    }

                    mysqli_stmt_close($stmtSelect);
                ?>
                ]);

                var options = {
                    title: 'Internal temperature',
                    backgroundColor: '#0B2638',
                    colors:['#EAB111','white'],
                    chartArea: {'width': '80%', 'height': '70%'},
                    hAxis: {
                            title: 'Date',
                            textStyle: {
                                color: '#ffffff'
                            }
                        },
                    vAxis: {
                        minValue: 0,
                        textStyle: {
                                color: '#ffffff'
                            }
                        },
                    legend: {
                        position: 'bottom',
                        textStyle: {
                                color: '#ffffff'
                            }
                        },
                    titleTextStyle: {
                        color: '#ffffff'
                    }           
                };

                var chart = new google.visualization.AreaChart(document.getElementById('chart-1'));
                chart.draw(data, options);
            }
        </script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            <?php
                //Selecting weight information
                $sqlSelect = "SELECT  date(timeStamp), weight 
                FROM beehive_data 
                WHERE timeStamp >= ? 
                    AND timeStamp <= ?
                    AND sensorID = ?
                GROUP BY date(timeStamp) 
                ORDER BY timeStamp"; 

                if ($stmtSelect = mysqli_prepare($conn, $sqlSelect)) {
                mysqli_stmt_bind_param($stmtSelect, 'sss',  $startDate, $endDate, $selectedHive);
                $executeSelect = mysqli_stmt_execute($stmtSelect);
                if ($executeSelect == FALSE) {
                echo mysqli_error($conn);
                }
                mysqli_stmt_bind_result($stmtSelect, $timeStamp, $weight);
                mysqli_stmt_store_result($stmtSelect);

                }
            ?>

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                ['Date', 'Weight'],
                <?php
                    if (!mysqli_stmt_num_rows($stmtSelect) == 0){
                        while (mysqli_stmt_fetch($stmtSelect)) {
                            echo "['$timeStamp', $weight], ";
                        }
                    }

                    mysqli_stmt_close($stmtSelect);
                ?>
                ]);

                var options = {
                    title: 'Weight',
                    backgroundColor: '#0B2638',
                    colors:['#EAB111'],
                    chartArea: {'width': '80%', 'height': '70%'},
                    hAxis: {
                            title: 'Date',
                            textStyle: {
                                color: '#ffffff'
                            }
                        },
                    vAxis: {
                        minValue: 0,
                        textStyle: {
                                color: '#ffffff'
                            }
                        },
                    legend: {
                        position: 'bottom',
                        textStyle: {
                                color: '#ffffff'
                            }
                        },
                    titleTextStyle: {
                        color: '#ffffff'
                    }           
                };

                var chart = new google.visualization.AreaChart(document.getElementById('chart-2'));
                chart.draw(data, options);
            }
        </script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            <?php
                //Selecting weight information
                $sqlSelect = "SELECT  date(timeStamp), humidity 
                FROM beehive_data 
                WHERE timeStamp >= ? 
                    AND timeStamp <= ?
                    AND sensorID = ?
                GROUP BY date(timeStamp) 
                ORDER BY timeStamp"; 

                if ($stmtSelect = mysqli_prepare($conn, $sqlSelect)) {
                mysqli_stmt_bind_param($stmtSelect, 'sss',  $startDate, $endDate, $selectedHive);
                $executeSelect = mysqli_stmt_execute($stmtSelect);
                if ($executeSelect == FALSE) {
                echo mysqli_error($conn);
                }
                mysqli_stmt_bind_result($stmtSelect, $timeStamp, $humidity);
                mysqli_stmt_store_result($stmtSelect);

                }
            ?>

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                ['Date', 'Humidity'],
                <?php
                    if (!mysqli_stmt_num_rows($stmtSelect) == 0){
                        while (mysqli_stmt_fetch($stmtSelect)) {
                            echo "['$timeStamp', $humidity], ";
                        }
                    }

                    mysqli_stmt_close($stmtSelect);
                ?>
                ]);

                var options = {
                    title: 'Humidity',
                    backgroundColor: '#0B2638',
                    colors:['#EAB111'],
                    chartArea: {'width': '80%', 'height': '70%'},
                    hAxis: {
                            title: 'Date',
                            textStyle: {
                                color: '#ffffff'
                            }
                        },
                    vAxis: {
                        minValue: 0,
                        textStyle: {
                                color: '#ffffff'
                            }
                        },
                    legend: {
                        position: 'bottom',
                        textStyle: {
                                color: '#ffffff'
                            }
                        },
                    titleTextStyle: {
                        color: '#ffffff'
                    }           
                };

                var chart = new google.visualization.AreaChart(document.getElementById('chart-3'));
                chart.draw(data, options);
            }
        </script>
        <script type="text/javascript">
        google.charts.load('current', {'packages':['gauge']});
        google.charts.setOnLoadCallback(drawChart);

        <?php
                //Selecting current information
                $sqlSelect = "SELECT  internalTemp, externalTemp, humidity, weight
                    FROM beehive_data 
                    WHERE sensorID = ?
                    ORDER BY timeStamp DESC
                    LIMIT 1"; 

                if ($stmtSelect = mysqli_prepare($conn, $sqlSelect)) {
                    mysqli_stmt_bind_param($stmtSelect, 's', $selectedHive);
                    $executeSelect = mysqli_stmt_execute($stmtSelect);
                    if ($executeSelect == FALSE) {
                        echo mysqli_error($conn);
                    }

                    mysqli_stmt_bind_result($stmtSelect, $internalTemp, $externalTemp, $humidity, $weight);
                    mysqli_stmt_store_result($stmtSelect);
                }
            ?>

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
            ['Label', 'Value'],
            <?php
                if (!mysqli_stmt_num_rows($stmtSelect) == 0){
                    while (mysqli_stmt_fetch($stmtSelect)) {
                        echo "['Ext. temp.', $externalTemp], ";
                        echo "['Int. temp.', $internalTemp], ";
                        echo "['Humidity', $humidity], ";
                        echo "['Weight', $weight], ";
                    }
                }

                mysqli_stmt_close($stmtSelect);
            ?>
            ]);

            var options = {
            width: 630, height: 250,
            greenFrom: 0, greenTo: 40,
            redFrom: 70, redTo: 100,
            yellowFrom: 40, yellowTo: 70,
            minorTicks: 5
            };

            var chart = new google.visualization.Gauge(document.getElementById('gauge-container'));

            chart.draw(data, options);
        }
        </script>
    </head>
    <body>
        <?php
        require_once("sidebarAndPopup.php");
        ?>

        <div class="popup-screen" id="settings-container">
            <div class="settings-popup-form">
                <a href="javascript:void(0)" class="closebtn" onclick="closeSetup()">&times;</a>
                <div id="form-container-settings">
                    <div id="form-header">
                        <h1>Dashboard settings</h1>
                    </div>
                    <form action="#" method="GET" name="setupForm">
                        <div class="field-container">
                            <label for="startDate"><h3>Start date:</h3></label>
                            <input type="date" name="startDate" id="startDate" value=<?php echo $startDate; ?>>
                        </div>
                        <div class="field-container">
                            <label for="endDate"><h3>End date:</h3></label>
                            <input type="date" name="endDate" id="endDate" value=<?php echo $endDate; ?>>
                        </div>
                        <div class="field-container">
                            <label for="selectedHive"><h3>Select a beehive:</h3></label>
                            <select name="selectedHive" id="selectedHive">
                                <?php
                                    //Selecting all beehives here
                                    $sqlSelect = "SELECT DISTINCT sensorID, location FROM beehive"; 

                                    if ($stmtSelect = mysqli_prepare($conn, $sqlSelect)) {
                                        $executeSelect = mysqli_stmt_execute($stmtSelect);
                                        if ($executeSelect == FALSE) {
                                            echo mysqli_error($conn);
                                        }
                                        mysqli_stmt_bind_result($stmtSelect, $sensorId, $location);
                                        mysqli_stmt_store_result($stmtSelect);

                                        if (!mysqli_stmt_num_rows($stmtSelect) == 0){
                                            while (mysqli_stmt_fetch($stmtSelect)) {
                                                if ($sensorId == $selectedHive){
                                                    echo "<option value='$sensorId' selected>$location</option>";
                                                }
                                                else{
                                                    echo "<option value='$sensorId'>$location</option>";
                                                }
                                            }
                                        }
                        
                                        mysqli_stmt_close($stmtSelect);
                                        
                                    }

                                ?>
                            </select>
                        </div>    
                        <button class="change-btn" type="submit" name="updateDashboard">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <div id="main">
            <header>
                <nav>
                    <span>
                        <a href="index.php">
                            <img src="../resources/img/back.png" alt="Go back">
                        </a>
                        <a href="javascript:void(0)" onclick="openSetup()">
                            <img src="../resources/img/settings.png" alt="Setup diagram information">
                        </a>
                        <h1>
                        <?php 
                                $sqlSelect = "SELECT location
                                FROM beehive 
                                WHERE sensorID = ?
                                LIMIT 1"; 

                                if ($stmtSelect = mysqli_prepare($conn, $sqlSelect)) {
                                    mysqli_stmt_bind_param($stmtSelect, 's', $selectedHive);
                                    $executeSelect = mysqli_stmt_execute($stmtSelect);

                                    if ($executeSelect == FALSE) {
                                    echo mysqli_error($conn);
                                    }
                                    
                                    mysqli_stmt_bind_result($stmtSelect, $location);
                                    mysqli_stmt_store_result($stmtSelect);
                                }

                                    if (!mysqli_stmt_num_rows($stmtSelect) == 0){
                                        while (mysqli_stmt_fetch($stmtSelect)) {
                                            echo $location;
                                        }
                                    }

                                    mysqli_stmt_close($stmtSelect);
                            ?>
                        </h1>
                    </span>
                </nav>
            </header>
            <main id="dashboad-bg">
                <div id="dashboard-canvas">
                    <div class="canvas-rows" id="top-row">
                        <div id="gauge-container">

                        </div>
                    </div>
                    <div class="canvas-rows" id="bottom-row">
                        <div class="charts" id="chart-1"></div>
                        <div class="charts" id="chart-2"></div>
                        <div class="charts" id="chart-3"></div>
                    </div>
                </div>
            </main>
            <footer>
                <i><h3>Last refreshed: <?php echo date('d/m/Y H:i:s') ?></h1></i>
            </footer>
        </div>
        <script src="../js/scripts.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="../js/slick.min.js"></script>
    </body>
</html>