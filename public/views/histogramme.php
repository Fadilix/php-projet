<?php
// Include your database configuration
include "C:/xampp/htdocs/projets php/php_p/php-projet/config/database.php";
session_start();

$adminId = $_SESSION["admin_id"];
if ((string) $adminId === "0") {
    header("Location: adminConnexion.php");
}

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
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var jsonData = <?php echo getRegistrationStatisticsByNationality(); ?>;

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Nationalite');
            data.addColumn('number', 'Nombre total d\'étudiant');
            data.addRows(jsonData);

            var options = {
                title: 'Statistiques des étudiants inscrits par nationalite',
                legend: {
                    position: 'none'
                },
                seriesType: 'bars',
                series: {
                    0: {
                        color: 'teal'
                    },
                    1: {
                        type: 'line',
                        color: 'teal'
                    }
                },
                animation: {
                    startup: true,
                    duration: 3000,
                    easing: 'out'
                }
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
            margin-top: -60px;
        }

        #chart_div {
            margin-left: 20px;
            width: 90%;
            height: 700px;
        }


        @media screen and (min-width: 768px) {
            #sidebar {
                flex-basis: 300px;
            }

            #chart_container {
                flex-basis: calc(100% - 300px);
            }
        }
    </style>
</head>

<?php include "../../controllers/candidatController.php" ?>

<body>
    <div id="sidebar">
        <?php include "../components/adminSidebar.php" ?>
    </div>
    <div id="chart_container">
        <div id="chart_div"></div>
    </div>
    <!-- 
    <div class="informations">
        <p>Nombre total de candidats inscrits : <?php echo nombreTotalDinscrit()["total"]; ?></p>
    </div> -->
</body>

</html>