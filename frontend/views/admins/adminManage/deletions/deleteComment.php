<?php

    require_once('../../../../../backend/controllers/adminManagerCtrl/getCommentRowCtrl.php');

    $getting_comment_row = getCommentRowCtrl();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Supprimer le commentaire de <?= $getting_comment_row['f_author']; ?></title>
    </head>

    <body>

        <h1>Supprimer un commentaire : cette action est irreversible</h1>

        <div>
            <p>
                <strong>Auteur : </strong> <?= $getting_comment_row['f_author']; ?>
            </p>

            <p>
                <strong>Commentaire : </strong> <?= $getting_comment_row['f_comment']; ?>
            </p>

            <p>
                <strong>Identifiant du post commenté : </strong> <?= $getting_comment_row['idPost']; ?>
            </p>
        </div>

        <form method="post" action="../../../../../backend/router/router.php?action=commentDeletionCtrl&amp;comment_id=<?= $getting_comment_row['id']; ?>">

            <p>
                <?php if(isset($error_comment_deletion)): ?>
                    <?= $error_comment_deletion; ?>
                <?php endif; ?>
            </p>

            <div>
                <label for="admin_pwd">
                    <input type="password" name="admin_pwd" id="admin_pwd" required>
                </label>
            </div>

            <div>
                <button type="submit">Supprimer le thème</button>
            </div>
        </form>
    </body>
</html>