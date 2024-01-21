<?php
// connection à la base de données;

$host = "localhost";
$dbname = "gest_concours_iai";
$user = "root";
$password = "";


try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
} catch (PDOException $e) {
    die("Erreur lors de la connexion : " . $e->getMessage());
}
