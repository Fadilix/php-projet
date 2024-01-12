<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
include "../../config/database.php";
include "../../controllers/userController.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    addNewUser($username, $password);

    header("Location: index.php");
}

?>
    

<form action="" method="POST">
    <div>
        <label for="">Nom d'utilisateur</label>
        <input type="text" placeholder="Enter votre nom complet" name="username">
    </div>

    <div>
        <label for="">Mot de passe</label>
        <input type="text" placeholder="Enter votre mot de passe" name="password">
    </div>

    <button type="submit">S'inscrire</button>
</form>
</body>
</html>