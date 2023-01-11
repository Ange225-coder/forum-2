<?php

    require_once('../../../../../backend/controllers/adminManagerCtrl/getConcernResponseRowCtrl.php');

    $getting_concernResponse = getConcernResponseRowCtrl();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Supprimer la réponse de <?= $getting_concernResponse['f_author']; ?></title>
    </head>

    <body>
        <h1>Supprimer une réponse à une préoccupation de développeur</h1>

        <div>
            <p>
                <strong>Auteur : </strong> <?= $getting_concernResponse['f_author']; ?>
            </p>

            <p>
                <strong>Réponse : </strong> <?= $getting_concernResponse['f_response']; ?>
            </p>

            <p>
                <strong>Identifiant de la préoccupation répondu : </strong> <?= $getting_concernResponse['id']; ?>
            </p>
        </div>


        <form method="post" action="../../../../../backend/router/router.php?action=concernResponseDeletionCtrl&amp;response_id=<?= $getting_concernResponse['id']; ?>">

            <p>
                <?php if(isset($error_concernResponse_deletion)): ?>
                    <?= $error_concernResponse_deletion; ?>
                <?php endif; ?>
            </p>

            <div>
                <label for="admin_pwd">
                    <input type="password" name="admin_pwd" id="admin_pwd" required>
                </label>
            </div>

            <div>
                <button type="submit">Supprimer la réponse</button>
            </div>
        </form>
    </body>
</html>
