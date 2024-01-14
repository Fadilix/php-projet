<?php
// session_start();

include "C:/xampp/htdocs/projets php/php-projet/config/database.php";

// verifier si le candidat a déjà postulé ou pas
function existsCandidat($userId)
{

    $userId = (int) $userId;

    if (isset($userId)) {
        global $db;
        $verifyCandidatQuery = "SELECT COUNT(*) as count FROM User u, Candidat c WHERE u.id = ? AND c.id_user = ?";

        $stmt = $db->prepare($verifyCandidatQuery);
        $stmt->execute([$userId, $userId]);
        $userData = $stmt->fetch();

        return $userData["count"] > 0;
    }
}


// ajouter un nouveau candidat
function addNewCandidat(
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
    $copieAttes,
    $id_user
) {
    global $db;

    $addNewCandidQuery = "INSERT INTO candidat (
        nom,
        prenom,
        photo,
        date_naiss,
        sexe,
        nationalite,
        annee_bac2,
        serie,
        copie_nais,
        copie_nation,
        copie_attes_bac2,
        id_user
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $db->prepare($addNewCandidQuery);

    $values = [
        $nom,
        $prenom,
        $photo,
        $dateNais,
        $sexe,
        $nationalite,
        $anneeBac,
        $serieBac,
        $copieNais,
        $copieNation,
        $copieAttes,
        $id_user
    ];

    $stmt->execute($values);
    echo "Candidat inscrit avec succès";
}


function getCandidatById($userId)
{
    global $db;
    $getCandidatQuery = "SELECT * FROM candidat WHERE id_user = ?";
    $stmt = $db->prepare($getCandidatQuery);
    $stmt->execute([$userId]);
    $candidatData = $stmt->fetch();
    return $candidatData;
}


// update candidat

function updateCandidat(
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
    $copieAttes,
    $id_user,
    $candidatId
) {
    global $db;

    $getCandidatQuery = "SELECT * FROM candidat WHERE id = ?";
    $stmt = $db->prepare($getCandidatQuery);
    $stmt->execute([$candidatId]);
    $candidatData = $stmt->fetch();

    // Prepare the query
    $updateCandidatQuery = "UPDATE candidats SET
                            nom = ?,
                            prenom = ?,
                            date_naissance = ?,
                            sexe = ?,
                            nationalite = ?,
                            annee_bac = ?,
                            serie_bac = ?,
                            photo = ?,
                            copie_naissance = ?,
                            copie_nationalite = ?,
                            copie_attestation = ?
                            WHERE id_user = ?";

    // Bind parameters and execute the query
    $stmt = $db->prepare($updateCandidatQuery);

    // Create an array of parameters
    $params = [
        $nom,
        $prenom,
        $dateNais,
        $sexe,
        $nationalite,
        $anneeBac,
        $serieBac,
        $photo == null ? $candidatData["photo"] : $photo,
        $copieNais == null ? $candidatData["copie_nais"] : $copieNais,
        $copieNation == null ? $candidatData["copie_nation"] : $copieNation,
        $copieAttes == null ? $candidatData["copie_attes_bac2"]: $copieAttes,
        $id_user,
    ];

    // Append the parameters to the execute function
    $stmt->execute($params);

    if ($stmt) {
        echo "Mise à jour réussie.";
    } else {
        echo "Erreur lors de la mise à jour : ";
    }
}

?>