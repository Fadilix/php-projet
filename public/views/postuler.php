<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" href="../css/postuler.css">
</head>


<?php

include "../../controllers/candidatController.php";

session_start();
$userId = $_SESSION["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $dateNais = $_POST["date_naiss"];
    $sexe = $_POST["sexe"];
    $nationalite = $_POST["nationalite"];
    $anneeBac = $_POST["annee_bac"];
    $serieBac = $_POST["serie_bac"];

    // Gérer les fichiers
    $photo = $_FILES["photo"]["name"];
    $copieNais = $_FILES["copie_naiss"]["name"];
    $copieNation = $_FILES["copie_nation"]["name"];
    $attestBac = $_FILES["attest_bac"]["name"];

    // validation pour le formulaire
    if (empty($nom) || empty($prenom) || empty($dateNais) || empty($sexe) || empty($nationalite) || empty($anneeBac) || empty($serieBac) || empty($photo) || empty($copieNais) || empty($copieNation) || empty($attestBac)) {
        echo "Tous les champs sont réquis";
        exit;
    }

    // Ajouter un nouveau candidat
    addNewCandidat(
        $nom,
        $prenom,
        $dateNais,
        $sexe,
        $nationalite,
        $anneeBac,
        $serieBac,
        $photo,
        $copieNais,
        $copieNation,
        $attestBac,
        $userId
    );

    $username = $_SESSION["username"];
    $userDirectory = "../../uploads/$username";

    if (!is_dir($userDirectory)) {
        mkdir($userDirectory, 0777, true);
    }

    // Créer des sous-répertoires pour chaque type de fichier
    $subdirectories = ["photo", "copie_naiss", "copie_nation", "attest_bac"];
    foreach ($subdirectories as $subdir) {
        $typeDirectory = "$userDirectory/$subdir";
        if (!is_dir($typeDirectory)) {
            mkdir($typeDirectory, 0777, true);
        }
    }

    // Déplacer les fichiers du répertoire temporaire vers le répertoire dans notre projet
    move_uploaded_file($_FILES["photo"]["tmp_name"], "$userDirectory/photo/" . $photo);
    move_uploaded_file($_FILES["copie_naiss"]["tmp_name"], "$userDirectory/copie_naiss/" . $copieNais);
    move_uploaded_file($_FILES["copie_nation"]["tmp_name"], "$userDirectory/copie_nation/" . $copieNation);
    move_uploaded_file($_FILES["attest_bac"]["tmp_name"], "$userDirectory/attest_bac/" . $attestBac);

    exit;
}
?>

<body>
    <?php include "../components/candidateNav.php" ?>
    <main>

        <h1>Formulaire d'inscription</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" required><br>
            </div>

            <div class="row">

                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" required><br>
            </div>


            <div class="row">

                <label for="photo">Photo :</label>
                <input type="file" name="photo" accept="image/jpeg, image/png, image/bmp, image/webp" required><br>
            </div>

            <div class="row">
                <label for="date_naissance">Date de naissance :</label>
                <input type="date" name="date_naiss" min="1990-01-01" required><br>
            </div>

            <div class="row">

                <label for="sexe">Sexe (M ou F) :</label>
                <input type="radio" value="M" name="sexe">M
                <input type="radio" value="F" name="sexe">F
            </div>

            <div class="row">

                <label for="nationalite">Nationalité :</label>
                <select name="nationalite" id="" class="nationalite" required></select>
            </div>

            <div class="row">
                <label for="annee_bac">Année d'obtention du BAC II :</label>
                <select value="" class="menu_annee" name="annee_bac" required></select>
            </div>

            <div class="row">
                <label for="serie_bac">Série du BAC (C, D, E, F1 ou F2) :</label>
                <select name="serie_bac" id="" required>
                    <option value="C" name="serie_bac">C</option>
                    <option value="D" name="serie_bac">D</option>
                    <option value="E" name="serie_bac">E</option>
                    <option value="F1" name="serie_bac">F1</option>
                    <option value="F2" name="serie_bac">F2</option>
                </select>
            </div>

            <div class="row">
                <label for="copie_naissance">Copie de la naissance (PDF) :</label>
                <input type="file" name="copie_naiss" accept=".pdf"><br>
            </div>

            <div class="row">
                <label for="copie_nationalite">Copie de la nationalité (PDF) :</label>
                <input type="file" name="copie_nation" accept=".pdf"><br>
            </div>

            <div class="row">

                <label for="attestation_bac">Attestation du BAC II (PDF) :</label>
                <input type="file" name="attest_bac" accept=".pdf"><br>
            </div>

            <div class="submit-container">

                <input type="submit" value="Soumettre">
            </div>
        </form>
    </main>

    <script src="../js/postuler.js"></script>
    <script src="../js/fetchCountriesApi.js"></script>

</body>

</html>