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



function logUser($username, $password)
{
    global $db;
    global $msg;
    $getUsernameQuery = "SELECT * FROM user WHERE username = ? AND password = ?";
    $stmt = $db->prepare($getUsernameQuery);
    $stmt->execute([$username, $password]);

    $userData = $stmt->fetch();
    $msg = "";

    if (isset($userData) && !empty($userData)) {
        $msg = "connecté avec succès";

        $getUserIdQuery = "SELECT id FROM user WHERE username = ?";
        $stmt = $db->prepare($getUserIdQuery);
        $stmt->execute([$username]);
        $userId = $stmt->fetch()["id"];

        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["id"] = $userId;
        header("Location: home.php");
    } else {
        $msg = "connection echoué, le mot de passe ou le nom d'utilisateur n'est pas correcte";
    }
}



?>