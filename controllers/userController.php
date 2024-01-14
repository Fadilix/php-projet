<?php
include "C:/xampp/htdocs/projets php/php-projet/config/database.php";
$msg = "";

function addNewUser($username, $password)
{
    global $db;
    global $msg;

    // Chequer si l'utilsateur existe
    $checkUsernameQuery = "SELECT COUNT(*) as count FROM user WHERE username = ?";
    $stmt = $db->prepare($checkUsernameQuery);
    $stmt->execute([$username]);
    $result = $stmt->fetch();

    if ($result['count'] > 0) {
        $msg = "Ce nom d'utilisateur existe déjà";
        return;
    }

    // si le username n'est pas dans la base alors on l'ajoute
    if (strlen($password) >= 8) {
        $msg = "";
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $addNewUserQuery = "INSERT INTO user (username, password) VALUES (?, ?)";
        $stmt = $db->prepare($addNewUserQuery);
        $stmt->execute([$username, $hashedPassword]);
        header("Location: index.php");
        exit;
    } else {
        $msg = "Le mot de passe doit contenir au moins 8 caractères";
    }
}


// loger l'utilisateur en vérifiant son nom d'utilisateur et son mot de passe
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


// Rechercher le username d'un utilisateur à partir de son id
function getUsernameById($userId)
{
    global $db;
    $getUserQuery = "SELECT * FROM user WHERE id = ?";
    $stmt = $db->prepare($getUserQuery);
    $stmt->execute([$userId]);
    $userData = $stmt->fetch();
    return $userData["username"];
}


?>