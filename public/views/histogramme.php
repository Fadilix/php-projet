<?php
// Include your database configuration
include "C:/xampp/htdocs/projets php/php_p/php-projet/config/database.php";

function getRegistrationStatisticsByNationality()
{
    global $db;

    $query = "SELECT nationalite, COUNT(*) as total FROM candidat GROUP BY nationalite";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $data = array();

    foreach ($results as $row) {
        $data[] = [$row['nationalite'], (int) $row['total']];
    }

    return json_encode($data);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Statistics</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var jsonData = <?php echo getRegistrationStatisticsByNationality(); ?>;

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Nationalite');
            data.addColumn('number', 'Nombre total d\'étudiant');
            data.addRows(jsonData);

            var options = {
                title: 'Student Registration Statistics by Nationality',
                legend: { position: 'none' },
                seriesType: 'bars',
                series: { 1: { type: 'line' } },
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>

    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
        }

        #sidebar {
            width: 300px;
            position: absolute;
            z-index: 10;
        }

        #chart_container {
            flex: 1;
            padding: 20px;
        }

        #chart_div {
            width: 100%;
            height: 400px;
        }
    </style>
</head>
<body>
    <div id="sidebar">
        <?php include "../components/adminSidebar.php" ?>
    </div>
    <div id="chart_container">
        <div id="chart_div"></div>
    </div>
</body>
</html>
