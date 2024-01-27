<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concours</title>
    <link rel="stylesheet" href="../../public/css/index.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<style>
    .contest-info {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }


    .title {
        width: 800px;
        text-align: center;
    }
</style>

<body>

    <?php
    $contestTitle = "Bienvenue sur notre plateforme d'inscription au concours d'entrée d'IAI-TOGO";
    $contestDescription = "Transformez votre passion en expertise numérique avec l'École Informatique IAI Togo – Où l'innovation devient une réalité, et vos rêves informatiques prennent vie!";

    // include "../../public/components/navbar.php";
    ?>
    <?php include "../components/navbar.php" ?>
    <div class="informations-container">
        <div class="informations">
            <div class='contest-info'>
                <h1 class="title"><?php echo $contestTitle; ?></h1>
                <p class="title"><?php echo $contestDescription; ?></p>
            </div>

            <div class="links">
                <a href="inscription.php" class="inscription-button">Créer un compte</a>
                <a href="login.php" class="connection-button">Se connecter</a>
            </div>
        </div>
    </div>
    <div style="height: 200vh;" class="formations">
        <h1>Nos formations</h1>
    </div>

    <script src="../js/index.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
</body>

</html>