<?php
// session_start();
function existsCandidat($userId)
{

    if (isset($userId)) {
        global $db;
        $verifyCandidatQuery = "SELECT * FROM User u, Candidat c WHERE u.id = ? AND c.user_id = ?";

        $stmt = $db->prepare($verifyCandidatQuery);
        $stmt->execute([$userId, $userId]);
        $userData = $stmt->fetch();

        return (isset($userData));
    }
}
?>