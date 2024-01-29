<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de tous les étudiants</title>
    <link rel="stylesheet" href="../css/table.css">
    <style>

    </style>
</head>

<body>

    <?php
    include "../../controllers/userController.php";
    include "../../controllers/datesController.php";
    $query = "SELECT * FROM candidat";
    $stmt = $db->query($query);
    ?>

    <div class="sidebar">
        <?php include "../components/adminSidebar.php" ?>
    </div>

    <div class="table-container">
        <?php if ($stmt) { ?>
            <table>
                <div style="display: flex; align-items:center; gap: 10px;">
                    <p>Date du concours : <?php echo getConcDate()["date_conc"]; ?> </p>

                    <form action="dateConc.php">
                        <button type="submit" name="dateCandid">Modifier</button>
                    </form>
                </div>
                <div style="display: flex; align-items:center; gap: 10px;">

                    <p>Date limite de dépôt de candid : <?php echo getCandidDate()["date_lim_dep"]; ?></p>

                    <form action="dateCandid.php">
                        <button type="submit" name="dateConc">Modifier</button>
                    </form>
                </div>
                <caption>Liste de tous les candidats inscrits</caption>
                <tr>
                    <th>ID</th>
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
                    <th>ID User</th>
                </tr>

                <?php foreach ($stmt as $row) {
                    $username = getUsernameById($row["id_user"]);
                ?>
                    <tr>
                        <td data-cell="id"><?php echo $row['id']; ?></td>
                        <td data-cell="Nom"><?php echo $row['nom']; ?></td>
                        <td data-cell="Prenom"><?php echo $row['prenom']; ?></td>
                        <td data-cell="Photo"><img src='../../uploads/<?php echo $username; ?>/photo/<?php echo $row['photo']; ?>' alt='Photo' width='50'></td>
                        <td data-cell="Date de naissance"><?php echo $row['date_naiss']; ?></td>
                        <td data-cell="Sexe"><?php echo $row['sexe']; ?></td>
                        <td data-cell="Nationalite"><?php echo $row['nationalite']; ?></td>
                        <td data-cell="Annee d'obtention de BAC II"><?php echo $row['annee_bac2']; ?></td>
                        <td data-cell="Serie"><?php echo $row['serie']; ?></td>
                        <td data-cell="Copie de naissance"><a href="../../uploads/<?php echo $username; ?>/copie_naiss/<?php echo $row['copie_nais']; ?>" download>Télécharger</a></td>
                        <td data-cell="Copie de nationalite"><a href='../../uploads/<?php echo $username; ?>/copie_nation/<?php echo $row['copie_nation']; ?>' download>Télécharger</a></td>
                        <td data-cell="Copie de l'attestion de BAC II"><a href='../../uploads/<?php echo $username; ?>/attest_bac/<?php echo $row['copie_attes_bac2']; ?>' download>Télécharger</a></td>
                        <td data-cell="id_user"><?php echo $row["id_user"]; ?></td>
                    </tr>
                <?php } ?>

            </table>
        <?php } else { ?>
            <?php echo "Erreur lors de l'exécution de la query" . implode(" ", $db->errorInfo()); ?>
        <?php } ?>


    </div>

</body>

</html>