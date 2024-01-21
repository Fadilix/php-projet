<?php
// Include your database configuration
include "C:/xampp/htdocs/projets php/php_p/php-projet/config/database.php";

function getRegistrationStatisticsByNationality() {
    global $db;

    $query = "SELECT nationalite, COUNT(*) as total FROM candidat GROUP BY nationalite";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $data = array();
    $data[] = ['Nationalite', 'Nombre total d\'étudiant'];

    foreach ($results as $row) {
        $data[] = [$row['nationalite'], (int)$row['total']];
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
            };

            var chart = new google.visualization.Histogram(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
</body>
</html>
