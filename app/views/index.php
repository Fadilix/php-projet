<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concours</title>
</head>
<body>

<?php
$contestTitle = "Bienvenue sur notre Plateforme de Concours";
$contestDescription = "Cette plateforme héberge des concours passionnants où vous pouvez mettre en valeur vos compétences et talents.";

echo "<div class='contest-info'>";
echo "<h1>$contestTitle</h1>";
echo "<p>$contestDescription</p>";
echo "</div>";
?>

<a href="inscription.php" class="button">Créer un Compte</a>
<a href="connexion.php" class="button">Se Connecter</a>

</body>
</html>
