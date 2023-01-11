<?php

    require_once('../../../../../backend/controllers/adminManagerCtrl/getSubjectRowCtrl.php');

    $getting_subject_row = getSubjectRowCtrl();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Supprimer <?= $getting_subject_row['f_theme']; ?></title>
        <link>
    </head>

    <body>

        <h1>Supprimer un thème : cette action est irreversible</h1>

        <div>
            <p>
                <strong>Thème : </strong> <?= $getting_subject_row['f_theme']; ?>
            </p>

            <p>
                <strong>Créer par : </strong> <?= $getting_subject_row['user_pseudo']; ?>
            </p>

            <p>
                <strong>Description : </strong> <?= $getting_subject_row['f_description']; ?>
            </p>
        </div>

        <form method="post" action="../../../../../backend/router/router.php?action=subjectDeletionCtrl&amp;subject_id=<?= $getting_subject_row['id']; ?>">

            <p>
                <?php if(isset($error_subject_deletion)): ?>
                    <?= $error_subject_deletion; ?>
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
