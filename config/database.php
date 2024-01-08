<?php
// connection à la base de donnée;

$host = "localhost";
$dbname = "gestion_candid";
$user = "root";
$password = "";


try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion établie avec succès";
    return $db;
} catch (PDOException $e) {
    die("Erreur lors de la connexion : " . $e->getMessage());
}

?>