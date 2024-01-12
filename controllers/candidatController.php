<?php
// session_start();

include "C:/xampp/htdocs/projets php/php-projet/config/database.php";
function existsCandidat($userId)
{

    if (isset($userId)) {
        global $db;
        $verifyCandidatQuery = "SELECT * FROM User u, Candidat c WHERE u.id = ? AND c.id_user = ?";

        $stmt = $db->prepare($verifyCandidatQuery);
        $stmt->execute([$userId, $userId]);
        $userData = $stmt->fetch();

        return (isset($userData));
    }
}
?>