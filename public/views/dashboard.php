<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
</head>
<body>

<h2>Candidat Data</h2>

<?php

// ici tout le monde comprend (enfin je crois)
include "../../controllers/userController.php";

$query = "SELECT * FROM candidat";
$stmt = $db->query($query);

if ($stmt) {
    echo "<table border='1'>
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
            </tr>";

    while ($row = $stmt->fetch()) {
        $username = getUsernameById($row["id_user"]);
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nom']}</td>
                <td>{$row['prenom']}</td>
                <td><img src='../../uploads/{$username}/photo/{$row['photo']}' alt='Photo' width='50'></td>
                <td>{$row['date_naiss']}</td>
                <td>{$row['sexe']}</td>
                <td>{$row['nationalite']}</td>
                <td>{$row['annee_bac2']}</td>
                <td>{$row['serie']}</td>
                <td><a href='../../uploads/{$username}/copie_naiss/{$row['copie_nais']}' download>Download</a></td>
                <td><a href='../../uploads/{$username}/copie_nation/{$row['copie_nation']}' download>Download</a></td>
                <td><a href='../../uploads/{$username}/attest_bac/{$row['copie_attes_bac2']}' download>Download</a></td>
                <td>{$row["id_user"]}</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "Erreur lors de l'exécution de la query" . implode(" ", $db->errorInfo());
}

?>

</body>
</html>
