<?php

include "C:/xampp/htdocs/projets php/php_p/php-projet/config/database.php";
// ajout d'un nouvel administrateur
function addNewAdmin($username, $password)
{
    global $db;
    global $msg;

    // Chequer si l'utilsateur existe
    $checkUsernameQuery = "SELECT COUNT(*) as count FROM administrateur WHERE username = ?";
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
        // on crypte le mot de passe avant de le mettre dans la base de données
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $addNewAdminQuery = "INSERT INTO administrateur (username, password) VALUES (?, ?)";
        $stmt = $db->prepare($addNewAdminQuery);
        $stmt->execute([$username, $hashedPassword]);
        header("Location: admin.php");
        exit;
    } else {
        $msg = "Le mot de passe doit contenir au moins 8 caractères";
    }
}


// Connexion de l'administrateur
function logAdmin($username, $password)
{
    global $db;
    global $msg;

    $getAdminQuery = "SELECT * FROM administrateur WHERE username = ?";
    $stmt = $db->prepare($getAdminQuery);
    $stmt->execute([$username]);
    $adminData = $stmt->fetch();

    if ($adminData && password_verify($password, $adminData['password'])) {
        $msg = "Connecté avec succès";

        $userId = $adminData["id"];


        session_start();
        $_SESSION["admin_name"] = $username;
        $_SESSION["admin_id"] = $userId;
        header("Location: admin.php");
        exit;
    } else {
        $msg = "Connexion échouée. Le mot de passe ou le nom d'utilisateur n'est pas correct.";
    }
}
