<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/table.css">

</head>

<body>
    <?php

    include "C:/xampp/htdocs/projets php/php_p/php-projet/controllers/candidatController.php";
    include "../../controllers/userController.php";
    include "../../controllers/datesController.php";

    $candidats = listeCandOmisDupload();

    ?>
    <div class="sidebar">
        <?php include "../components/adminSidebar.php" ?>
    </div>
    <div class="table-container">

        <table border="1">
        <div style="display: flex; align-items:center; gap: 10px;">
                <p>Date du concours : <?php echo getConcDate()["date_conc"]; ?> </p>

                <form action="dateCandid.php">
                    <button type="submit" name="dateCandid">Modifier</button>
                </form>
            </div>
            <div style="display: flex; align-items:center; gap: 10px;">

                <p>Date limite de dépôt de candid : <?php echo getCandidDate()["date_lim_dep"]; ?></p>

                <form action="dateConc.php">
                    <button type="submit" name="dateConc">Modifier</button>
                </form>
            </div>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Photo</th>
                <th>Date Naissance</th>
                <th>Sexe</th>
                <th>Nationalite</th>
                <th>Annee Bac</th>
                <th>Serie</th>
                <th>Copie Naissance</th>
                <th>Copie Nationalite</th>
                <th>Copie Attestation Bac</th>
            </tr>

            <?php
            foreach ($candidats as $candidat) {
                $username = getUsernameById($candidat["id_user"]);

            ?>
                <tr>
                    <td data-cell="Nom"><?php echo $candidat['nom']; ?></td>
                    <td data-cell="Prenom"><?php echo $candidat['prenom']; ?></td>
                    <td data-cell="Photo"><img src='../../uploads/<?php echo $username; ?>/photo/<?php echo $candidat['photo']; ?>' alt='Photo' width='50'></td>
                    <td data-cell="Date de naissance"><?php echo $candidat['date_naiss']; ?></td>
                    <td data-cell="Sexe"><?php echo $candidat['sexe']; ?></td>
                    <td data-cell="Nationalité"><?php echo $candidat['nationalite']; ?></td>
                    <td data-cell="Année d'obtention de BAC II"><?php echo $candidat['annee_bac2']; ?></td>
                    <td data-cell="Serie"><?php echo $candidat['serie']; ?></td>
                    <td data-cell="Copie de naissance"><a href="../../uploads/<?php echo $username; ?>/copie_naiss/<?php echo $candidat['copie_nais']; ?>" download>Télécharger</a></td>
                    <td data-cell="Copie de nationalité"><a href='../../uploads/<?php echo $username; ?>/copie_nation/<?php echo $candidat['copie_nation']; ?>' download>Télécharger</a></td>
                    <td data-cell="Copie de l'attestation de BAC II"><a href='../../uploads/<?php echo $username; ?>/attest_bac/<?php echo $candidat['copie_attes_bac2']; ?>' download>Télécharger</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>

</body>

</html>