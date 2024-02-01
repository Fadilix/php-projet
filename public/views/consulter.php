<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/consulter.css">
    <link rel="stylesheet" href="../css/table.css">
</head>

<style>
    th {
        background-color: white;
    }

    caption {
        color: white;
        text-align: left;
    }


    button {
        padding: 4px;
    }

    .table-container {
        margin-top: 100px;
    }

    tr,
    td,
    th {
        color: black;
    }
</style>

<body>

    <?php
    session_start();

    // can only access this page if he's is logged in
    if ((string) $_SESSION["id"] == "0") {
        header("Location: login.php");
    }
    ?>

    <?php

    include "../../controllers/candidatController.php";
    include "../../controllers/userController.php";
    include "../../controllers/datesController.php";
    if (!isset($_SESSION["id"])) {
        echo "no id found";
        // header("Location: index.php");
        exit;
    }
    $userId = $_SESSION["id"];
    $candidatData = getCandidatById($userId);
    $username = getUsernameById($userId);

    if (isset($_POST["supprimer"])) {
        $candidatID = (int) $_POST["candID"];
        supprimerCandid($candidatID);
    }

    ?>
    <?php include "../components/candidateNav.php" ?>

    <div class="table-container">
        <table border="1" width="100%">
            <caption>Vos candidatures</caption>
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
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>


            <tr>
                <td data-cell="Nom"><?php echo $candidatData['nom']; ?></td>
                <td data-cell="Prenom"><?php echo $candidatData['prenom']; ?></td>
                <td data-cell="Photo"><img src='../../uploads/<?php echo $username; ?>/photo/<?php echo $candidatData['photo']; ?>' alt='Photo' width='50'></td>
                <td data-cell="Date de naissance"><?php echo $candidatData['date_naiss']; ?></td>
                <td data-cell="Sexe"><?php echo $candidatData['sexe']; ?></td>
                <td data-cell="Nationalité"><?php echo $candidatData['nationalite']; ?></td>
                <td data-cell="Année d'obtention de BAC II"><?php echo $candidatData['annee_bac2']; ?></td>
                <td data-cell="Serie"><?php echo $candidatData['serie']; ?></td>
                <td data-cell="Copie de naissance"><a href="../../uploads/<?php echo $username; ?>/copie_naiss/<?php echo $candidatData['copie_nais']; ?>" download>Télécharger</a></td>
                <td data-cell="Copie de nationalité"><a href='../../uploads/<?php echo $username; ?>/copie_nation/<?php echo $candidatData['copie_nation']; ?>' download>Télécharger</a></td>
                <td data-cell="Copie de l'attestation de BAC II"><a href='../../uploads/<?php echo $username; ?>/attest_bac/<?php echo $candidatData['copie_attes_bac2']; ?>' download>Télécharger</a></td>
                <td data-cell="Modifier">
                    <form action="modifierCandidat.php?candidat_id=<?php echo $candidatData["id"]; ?>" method="POST">
                        <button type="submit" class="modif-button">Modifier</button>
                        <script>
                            const modifButton = document.querySelector(".modif-button");
                            const currentDate = new Date();
                            const candidatureDate = new Date("<?php echo getCandidDate()['date_lim_dep']; ?>");
                            const diffDate = candidatureDate - currentDate;
                            // window.addEventListener("DOMContentLoaded", () => {
                            //     console.log(diffDate);
                            //     console.log(candidatureDate);
                            // })
                            modifButton.disabled = (diffDate < 0);
                        </script>
                    </form>
                </td>

                <td data-cell="modifier">
                    <form action="" method="POST">
                        <input name="candID" type="hidden" value="<?php echo $candidatData["id"]; ?>">
                        <button type="submit" name="supprimer" class="supprimer" style="display: none;"></button>
                        <button type="button" name="supprimerClone" class="supprimerClone">Supprimer</button>
                        <script>
                            const supprimerClone = document.querySelector(".supprimerClone");
                            const supprimer = document.querySelector(".supprimer");
                            supprimerClone.addEventListener("click", () => {
                                if (confirm("Voulez vous vraiment supprimer votre candidature")) {
                                    supprimer.click();
                                    alert("Votre candidature a été supprimé avec succès");
                                }
                            })
                        </script>
                    </form>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>