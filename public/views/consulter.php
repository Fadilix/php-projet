<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php

include "../../controllers/candidatController.php";
include "../../controllers/userController.php";
session_start();
if (!isset($_SESSION["id"])) {
    echo "no id found";
    // header("Location: index.php");
    exit;
}
$userId = $_SESSION["id"];
$candidatData = getCandidatById($userId);
$username = getUsernameById($userId);

?>


<table border="1" width="100%">

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
    <td><?php echo $candidatData['nom']; ?></td>
    <td><?php echo $candidatData['prenom']; ?></td>
    <td><img src='../../uploads/<?php echo $username; ?>/photo/<?php echo $candidatData['photo']; ?>' alt='Photo' width='50'></td>
    <td><?php echo $candidatData['date_naiss']; ?></td>
    <td><?php echo $candidatData['sexe']; ?></td>
    <td><?php echo $candidatData['nationalite']; ?></td>
    <td><?php echo $candidatData['annee_bac2']; ?></td>
    <td><?php echo $candidatData['serie']; ?></td>
    <td><a href="../../uploads/<?php echo $username; ?>/copie_naiss/<?php echo $candidatData['copie_nais']; ?>" download>Télécharger</a></td>
    <td><a href='../../uploads/<?php echo $username; ?>/copie_nation/<?php echo $candidatData['copie_nation']; ?>' download>Télécharger</a></td>
    <td><a href='../../uploads/<?php echo $username; ?>/attest_bac/<?php echo $candidatData['copie_attes_bac2']; ?>' download>Télécharger</a></td>
    <td>
        <form action="modifierCandidat.php?candidat_id=<?php echo $candidatData["id"] ?>" method="POST">
            <button type="submit">Modifier</button>
        </form>
    </td>

    <td>
        <form action="" method="POST">
            <button type="submit">Supprimer</button>
        </form>
    </td>
</tr>
</table>
</body>
</html>