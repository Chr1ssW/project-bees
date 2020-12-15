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


    //Selecting temperature information
    $sqlSelect = "SELECT  date(timeStamp), internalTemp, externalTemp 
                    FROM beehive_data 
                    WHERE timeStamp > ? 
                        AND timeStamp < ?
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
                        <h1><?php echo date('d/m/Y H:i:s') ?></h1>
                    </span>
                </nav>
            </header>
            <main id="dashboad-bg">
                <div id="dashboard-canvas">
                    <div id="chart_div" style="width: 40%; height: 500px;"></div>
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