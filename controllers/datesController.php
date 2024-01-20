<?php
include "C:/xampp/htdocs/projets php/php_p/php-projet/config/database.php";

function getCandidDate()
{

    global $db;
    $getCandidDateQuery = "SELECT date_lim_dep FROM concours";
    $stmt = $db->prepare($getCandidDateQuery);
    $stmt->execute();
    return $stmt->fetch();
}


function getConcDate()
{
    global $db;
    $getConcDateQuery = "SELECT date_conc FROM concours";
    $stmt = $db->prepare($getConcDateQuery);
    $stmt->execute();
    return $stmt->fetch();
}

function modifyCandidDate($newDate)
{
    global $db;
    $updateDateQuery = "UPDATE concours SET date_lim_dep = ? WHERE id = ?";
    $stmt = $db->prepare($updateDateQuery);
    $stmt->execute([$newDate, 1]);

    header("Location: admin.php");
}

function modifyConcDate($newConcDate)
{
    global $db;
    $updateDateQuery = "UPDATE concours SET date_conc = ? WHERE id = ?";
    $stmt = $db->prepare($updateDateQuery);
    $stmt->execute([$newConcDate, 1]);

    header("Location: admin.php");
}

?>