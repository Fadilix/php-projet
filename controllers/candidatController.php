<?php
// session_start();

include "C:/xampp/htdocs/projets php/php_p/php-projet/config/database.php";

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
    header("Location: home.php");
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

    // préparation de la requête
    $updateCandidatQuery = "UPDATE candidat SET
                            nom = ?,
                            prenom = ?,
                            date_naiss = ?,
                            sexe = ?,
                            nationalite = ?,
                            annee_bac2 = ?,
                            serie = ?,
                            photo = ?,
                            copie_nais = ?,
                            copie_nation = ?,
                            copie_attes_bac2 = ?
                            WHERE id = ?";

    // préparation
    $stmt = $db->prepare($updateCandidatQuery);

    // Création d'une array de paramètres
    $params = [
        $nom,
        $prenom,
        $dateNais,
        $sexe,
        $nationalite,
        $anneeBac,
        $serieBac,
        $photo == "" ? $candidatData["photo"] : $photo,
        $copieNais == "" ? $candidatData["copie_nais"] : $copieNais,
        $copieNation == "" ? $candidatData["copie_nation"] : $copieNation,
        $copieAttes == "" ? $candidatData["copie_attes_bac2"] : $copieAttes,
        $candidatId,
    ];

    // Exécution de la query
    $stmt->execute($params);

    if ($stmt) {
        echo "Mise à jour réussie.";
    } else {
        echo "Erreur lors de la mise à jour : ";
    }
}


// Liste des candidats inscrits pas sexe
function listCandidatsInscritParSexe()
{
    global $db;
    $candidatesPerSexQuery = "SELECT * FROM candidat GROUP BY sexe";
    $stmt = $db->prepare($candidatesPerSexQuery);
    $stmt->execute();
    return $stmt->fetchAll();
}

// Liste des candidats inscrits par nation
function listCandidatsParNation()
{
    global $db;
    $candidatParNation = "SELECT *, COUNT(*) as total FROM candidat GROUP BY nationalite";
    $stmt = $db->prepare($candidatParNation);
    $stmt->execute();
    return $stmt->fetchAll();
}

// Liste des candidats inscrits doublement
function listCandidatsInscritDouble()
{
    global $db;
    $candidatInscritDoubleQuery = "SELECT *, COUNT(*) as occurrences FROM candidat GROUP BY nom, prenom HAVING occurrences > 1";
    $stmt = $db->prepare($candidatInscritDoubleQuery);
    $stmt->execute();
    return $stmt->fetchAll();
}


// Liste des candidats inscrits ayant omis d'uploader un document
function listeCandOmisDupload()
{
    global $db;
    $omisDuploadQuery = "SELECT * FROM candidat WHERE copie_nais IS NULL OR copie_nation IS NULL OR copie_attes_bac2 IS NULL";
    $stmt = $db->prepare($omisDuploadQuery);
    $stmt->execute();
    return $stmt->fetchAll();
}

// Nombre total d'inscrits 
function nombreTotalDinscrit()
{
    global $db;
    $nombreTotalInscritQuery = "SELECT COUNT(*) as total FROM candidat";
    $stmt = $db->prepare($nombreTotalInscritQuery);
    $stmt->execute();
    return $stmt->fetch();
}

// Nombre de candidats par nation
function nombreCandidNation()
{
    global $db;
    $nbTotalNationQuery = "SELECT nationalite, COUNT(*) as total FROM candidat GROUP BY nationalite";
    $stmt = $db->prepare($nbTotalNationQuery);
    $stmt->execute();
    return $stmt->fetchAll();
}

// Nombre de candidats par serie
function nombreCandParSerie()
{
    global $db;
    $nbCandParSerieQuery = "SELECT serie, COUNT(*) as total FROM candidat GROUP BY serie";
    $stmt = $db->prepare($nbCandParSerieQuery);
    $stmt->execute();
    return $stmt->fetchAll();
}

// Nombre de candidats par sexe
function nbCandParSexe()
{
    global $db;
    $nbCandParSexeQuery = "SELECT sexe, COUNT(*) as total FROM candidat GROUP BY sexe";
    $stmt = $db->prepare($nbCandParSexeQuery);
    $stmt->execute();
    return $stmt->fetchAll();
}
