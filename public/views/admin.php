<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
</head>
<body>

<h2>Candidate Data</h2>

<?php
include "../../controllers/userController.php";

$query = "SELECT * FROM candidat";
$stmt = $db->query($query);


?>

<?php if ($stmt) { ?>
        <table border='1'>
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

            <?php while ($row = $stmt->fetch()) {
                $username = getUsernameById($row["id_user"]);
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nom']; ?></td>
                        <td><?php echo $row['prenom']; ?></td>
                        <td><img src='../../uploads/<?php echo $username; ?>/photo/<?php echo $row['photo']; ?>' alt='Photo' width='50'></td>
                        <td><?php echo $row['date_naiss']; ?></td>
                        <td><?php echo $row['sexe']; ?></td>
                        <td><?php echo $row['nationalite']; ?></td>
                        <td><?php echo $row['annee_bac2']; ?></td>
                        <td><?php echo $row['serie']; ?></td>
                        <td><a href="../../uploads/<?php echo $username; ?>/copie_naiss/<?php echo $row['copie_nais']; ?>" download>Télécharger</a></td>
                        <td><a href='../../uploads/<?php echo $username; ?>/copie_nation/<?php echo $row['copie_nation']; ?>' download>Télécharger</a></td>
                        <td><a href='../../uploads/<?php echo $username; ?>/attest_bac/<?php echo $row['copie_attes_bac2']; ?>' download>Télécharger</a></td>
                        <td><?php echo $row["id_user"]; ?></td>
                    </tr>
            <?php } ?>

        </table>
<?php } else { ?>
        <?php echo "Erreur lors de l'exécution de la query" . implode(" ", $db->errorInfo()); ?>
<?php } ?>

<form action="dateCandid.php">
    <button type="submit" name="dateCandid">Modifier date limite de depôt de candidature</button>
</form>

<form action="dateConc.php">
    <button type="submit" name="dateConc">Modifier date du concours</button>
</form>

</body>
</html>
