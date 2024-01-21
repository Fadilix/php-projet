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
        $submit = $_POST["submit"];

        if (isset($username) && isset($password) && !empty($username) && !empty($password) && isset($submit)) {
            logUser($username, $password);
        }
    }

    ?>

    <form action="" method="POST">
        <div>
            <label for="">Nom d'utilisateur</label>
            <input type="text" placeholder="Enter votre nom d'utilisateur" name="username">
        </div>

        <div>
            <label for="">Mot de passe</label>
            <input type="password" placeholder="Enter votre mot de passe" name="password" class="password">
        </div>
        <p class="msg">
            <?php echo $msg; ?>
        </p>

        <button type="submit" name="submit">Se connecter</button>
    </form>
</body>

</html>