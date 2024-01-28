<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/auth.css">
</head>

<body>

    <?php
    include "../../config/database.php";
    include "../../controllers/userController.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = $_POST["username"];
        $password = $_POST["password"];
        $msg = "";

        if (isset($username) && isset($password) && !empty($username) && !empty($password)) {
            addNewUser($username, $password);
        } else {
            $msg = "Veuillez remplir tous les champs";
        }
    }

    ?>

    <?php include "../components/authNavbar.php"; ?>


    <h1>Inscription <span>utilisateur</span></h1>
    <form action="" method="POST">
        <div class="image"></div>
        <div class="form">
            <div class="welcome">
                <h2>Inscription</h2>
                <p>Veuillez remplir tous les champs</p>
            </div>
            <div class="real-form">

                <div>
                    <label for="">Nom d'utilisateur</label>
                    <input type="text" placeholder="Enter votre nom d'utilisateur" name="username">
                </div>

                <div>
                    <label for="">Mot de passe</label>
                    <input type="password" placeholder="Enter votre mot de passe" name="password" class="password">
                </div>
                <p class="msg" style="color: red">
                    <?php echo $msg; ?>
                </p>
                <div class="button-wrapper">
                    <button type="submit" name="submit">S'inscrire</button>
                </div>
            </div>
        </div>
    </form>

    <script src="../js/inscription.js"></script>
</body>

</html>