<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php

include "../../controllers/adminController.php";


$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];


    if (isset($username) && isset($password) & !empty($username) && !empty($password)) {
        addNewAdmin($username, $password);
    }
}

?>
    <form action="" method="POST">
        <div>
            <label for="">Nom d'utilisateur</label>
            <input type="text" placeholder="Entrer votre nom d'utilisateur" name="username" class="username">
        </div>

        <div>
            <label for="">Mot de passe</label>
            <input type="password" placeholder="Entrer votre mot de passe" name="password" class="password">
        </div>


        <p class="msg"><?php echo $msg ?></p>
        <button type="submit" class="submit">S'inscrire</button>

    </form>

    <script src="../js/inscription.js"></script>
</body>
</html>