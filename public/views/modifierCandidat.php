<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    include "../../controllers/candidatController.php";
    include "../../controllers/userController.php";
    include "../../config/database.php";


    $candidatId = (int) $_GET["candidat_id"];
    $getCandidatQuery = "SELECT * FROM candidat WHERE id = ?";

    $stmt = $db->prepare($getCandidatQuery);
    $stmt->execute([$candidatId]);
    $candidatData = $stmt->fetch();
    $username = getUsernameById($_SESSION["id"]);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST["submit"])) {
            $userId = $_SESSION["id"];
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
            if (empty($nom) || empty($prenom) || empty($dateNais) || empty($sexe) || empty($nationalite) || empty($anneeBac) || empty($serieBac)) {
                echo "Tous les champs sont réquis";
                exit;
            }

            updateCandidat(
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
                $userId,
                $candidatId
            );

            $userDirectory = "../../uploads/$username";
            move_uploaded_file($_FILES["photo"]["tmp_name"], "$userDirectory/photo/" . $photo);
            move_uploaded_file($_FILES["copie_naiss"]["tmp_name"], "$userDirectory/copie_naiss/" . $copieNais);
            move_uploaded_file($_FILES["copie_nation"]["tmp_name"], "$userDirectory/copie_nation/" . $copieNation);
            move_uploaded_file($_FILES["attest_bac"]["tmp_name"], "$userDirectory/attest_bac/" . $attestBac);

            exit;
        }
    }




    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div>

            <label for="nom">Nom :</label>
            <input type="text" name="nom" required value="<?php echo $candidatData["nom"] ?>"><br>
        </div>

        <div>

            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" required value="<?php echo $candidatData["prenom"] ?>"><br>
        </div>


        <div>

            <label for="photo">Photo :</label>
            <input type="file" name="photo" accept="image/jpeg, image/png, image/bmp, image/webp"><br>
            <span>Photo actuelle: <?php echo $candidatData['photo']; ?></span><br>
        </div>

    <div>
        <label for="date_naissance">Date de naissance :</label>
        <input type="date" name="date_naiss" min="1990-01-01" value="<?php echo $candidatData["date_naiss"]; ?>"><br>
    </div>

    <div>

        <label for="sexe">Sexe (M ou F) :</label>
        <input type="radio" value="M" name="sexe"
         <?php if ($candidatData["sexe"] == "M") { ?>
                                checked
        <?php } ?>
        >M
        <input type="radio" value="F" name="sexe"
        <?php if ($candidatData["sexe"] == "F") { ?>
                                checked
        <?php } ?>
        >F
    </div>


    <div>

        <label for="nationalite">Nationalité :</label>
        <select name="nationalite" id="" class="nationalite" required >
            <option value="<?php echo $candidatData["nationalite"] ?>"><?php echo $candidatData["nationalite"] ?></option>
        </select>
    </div>

    <div>
        <label for="annee_bac">Année d'obtention du BAC II :</label>
        <select value="" class="menu_annee" name="annee_bac" required>
            <option value="<?php echo $candidatData["annee_bac2"] ?>"><?php echo $candidatData["annee_bac2"] ?></option>
        </select>
    </div>

    <div>
        <label for="serie_bac">Série du BAC (C, D, E, F1 ou F2) :</label>
        <select name="serie_bac" id="" required>
            <option value="<?php echo $candidatData["serie"] ?>"><?php echo $candidatData["serie"] ?></option>
            <option value="C" name="serie_bac">C</option>
            <option value="D" name="serie_bac">D</option>
            <option value="E" name="serie_bac">E</option>
            <option value="F1" name="serie_bac">F1</option>
            <option value="F2" name="serie_bac">F2</option>
        </select>
    </div>


    <div>
        <label for="copie_naissance">Copie de la naissance (PDF) :</label>
        <input type="file" name="copie_naiss" accept=".pdf"><br>
        <span>Copie de naissance actuelle : <?php echo $candidatData['copie_nais']; ?></span><br>

    </div>

    <div>
        <label for="copie_nationalite">Copie de la nationalité (PDF) :</label>
        <input type="file" name="copie_nation" accept=".pdf"><br>
        <span>Copie de nationalité actuelle : <?php echo $candidatData['copie_nation']; ?></span><br>

    </div>


    <div>

        <label for="attestation_bac">Attestation du BAC II (PDF) :</label>
        <input type="file" name="attest_bac" accept=".pdf"><br>
        <span>Copie attestation BAC II actuelle: <?php echo $candidatData['copie_attes_bac2']; ?></span><br>
    </div>
        
        <input type="submit" value="Soumettre" name="submit">
    </form>

    <script src="../js/fetchCountriesApi.js"></script>
    <script src="../js/postuler.js"></script>
</body>
</html>