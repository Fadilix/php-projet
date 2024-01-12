<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concours</title>
    <link rel="stylesheet" href="../../public/css/index.css">
    <link rel="stylesheet" href="../../public/css/navbar.css">
</head>
<body>

<?php
$contestTitle = "Bienvenue sur notre Plateforme de Concours";
$contestDescription = "Cette plateforme héberge des concours passionnants où vous pouvez mettre en valeur vos compétences et talents.";

// include "../../public/components/navbar.php";

echo "<div class='contest-info'>";
echo "<h1>$contestTitle</h1>";
echo "<p>$contestDescription</p>";
echo "</div>";
?>

<div class="links">
    <a href="inscription.php" class="button">Créer un compte</a>
    <a href="connexion.php" class="button">Se connecter</a>
</div>

</body>
</html>