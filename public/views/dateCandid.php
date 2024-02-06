<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/dateCandid.css">
</head>

<body>

    <?php
    // récupérer la date de la candidature;
    include "../../controllers/datesController.php";

    $dateLimDepot = getCandidDate();
    // echo $dateLimDepot["date_lim_dep"];


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newCandiDate = $_POST["new_date"];
        modifyCandidDate($newCandiDate);
    }
    ?>

    <?php include "../components/adminSidebar.php" ?>
    <h3>Modifier la date de candidature</h3>
    <form action="" method="POST">
        <input type="date" name="new_date" placeholder="date de candidature" value="<?php echo $dateLimDepot["date_lim_dep"]; ?>">
        <button type="submit">Modifier</button>
    </form>
</body>

</html>