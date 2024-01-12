<?php

include "../config/database.php";
function addNewUser($username, $password)
{
    global $db;
    $addNewUserQuery = "INSERT INTO user (username, password) VALUES (?, ?)";
    $stmt = $db->prepare($addNewUserQuery);
    $stmt->execute([$username, $password]);
}




?>