<?php

    require_once('../../../../../backend/controllers/adminManagerCtrl/getConcernRowCtrl.php');

    $getting_concern_row = getConcernRowCtrl();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Supprimer <?= $getting_concern_row['f_language'] ?></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.57.0/codemirror.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.57.0/codemirror.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.57.0/mode/javascript/javascript.min.js"></script>
    </head>

    <body>

        <h1>Supprimer une préoccupation de développeur : cette action est irreversible</h1>

        <div>
            <p>
                <strong>Auteur : </strong> <?= $getting_concern_row['f_user']; ?>
            </p>

            <p>
                <strong>Languages utilisés : </strong> <?= $getting_concern_row['f_language'] ?>
            </p>

            <p>
                <strong>Description : </strong> <?=  $getting_concern_row['f_description']; ?>
            </p>

            <strong>Code : </strong>

            <label for="code">
                <textarea id="code"><?= $getting_concern_row['f_code']; ?></textarea>
            </label>

            <script src="../../../../../vendor/setCodeInEditor.js"></script>

        </div>

        <form method="post" action="../../../../../backend/router/router.php?action=concernDeletionCtrl&amp;concern_id=<?= $getting_concern_row['id']; ?>">

            <p>
                <?php if(isset($error_concern_deletion)): ?>
                    <?= $error_concern_deletion; ?>
                <?php endif; ?>
            </p>

            <div>
                <label for="admin_pwd">
                    <input type="password" name="admin_pwd" id="admin_pwd" required>
                </label>
            </div>

            <div>
                <button type="submit">Supprimer la préoccupation</button>
            </div>
        </form>
    </body>
</html>




<style>
    .CodeMirror {
        height: 100%;
    }


</style>
