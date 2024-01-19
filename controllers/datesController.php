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
    $getConcDateQuery = "SELECT date_lim_dep FROM concours";
    $stmt = $db->prepare($getConcDateQuery);
    $stmt->execute();
    return $stmt->fetch();
}

function modifyCandidDate($id, $newDate)
{
    global $db;
    
}

?>