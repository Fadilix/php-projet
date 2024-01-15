<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<?php

include "../../config/database.php";
include "../../controllers/adminController.php";
$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (isset($username) && isset($password) && !empty($username) && !empty($password)) {
        logAdmin($username, $password);
    }



}

?>
    
</head>
<body>
<form action="" method="POST">
        <div>
            <label for="">Nom d'utilisateur</label>
            <input type="text" placeholder="Entrer votre nom d'utilisateur" name="username" class="username">
        </div>

        <div>
            <label for="">Mot de passe</label>
            <input type="password" placeholder="Entrer votre mot de passe" name="password" class="password">
        </div>


        <p class="msg">
        <?php echo $msg; ?>
    </p>
        <button type="submit" class="submit">S'inscrire</button>
</form>
</body>
</html>