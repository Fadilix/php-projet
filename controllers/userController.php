<?php
include "C:/xampp/htdocs/projets php/php-projet/config/database.php";
$msg = "";

function addNewUser($username, $password)
{
    global $db;
    global $msg;
    $getAllUsernames = "SELECT username FROM user";

    $stmt = $db->query($getAllUsernames);

    $usernamesData = $stmt->fetch();

    if (strlen($password) < 8) {
        return;
    } else {
        if (!in_array($username, $usernamesData)) {
            $msg = "";
            $addNewUserQuery = "INSERT INTO user (username, password) VALUES (?, ?)";
            $stmt = $db->prepare($addNewUserQuery);
            $stmt->execute([$username, $password]);
            header("Location: index.php");
        } else {
            $msg = "ce nom d'utilisateur existe déjà";
        }
    }
}

?>