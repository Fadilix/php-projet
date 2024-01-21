<?php
include "C:/xampp/htdocs/projets php/php_p/php-projet/config/database.php";

// obtenir la date limite de depôt de candidature
function getCandidDate()
{

    global $db;
    $getCandidDateQuery = "SELECT date_lim_dep FROM concours";
    $stmt = $db->prepare($getCandidDateQuery);
    $stmt->execute();
    return $stmt->fetch();
}



// Obtenir la date du concours
function getConcDate()
{
    global $db;
    $getConcDateQuery = "SELECT date_conc FROM concours";
    $stmt = $db->prepare($getConcDateQuery);
    $stmt->execute();
    return $stmt->fetch();
}


// Modifier la date de depôt de candidature
function modifyCandidDate($newDate)
{
    global $db;
    $updateDateQuery = "UPDATE concours SET date_lim_dep = ? WHERE id = ?";
    $stmt = $db->prepare($updateDateQuery);
    $stmt->execute([$newDate, 1]);

    header("Location: admin.php");
}


// Modifier la date du concours
function modifyConcDate($newConcDate)
{
    global $db;
    $updateDateQuery = "UPDATE concours SET date_conc = ? WHERE id = ?";
    $stmt = $db->prepare($updateDateQuery);
    $stmt->execute([$newConcDate, 1]);

    header("Location: admin.php");
}
