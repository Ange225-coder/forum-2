<?php

    $user_id = $_GET['user_id'];
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Forum - suppression du compte</title>
        <link>
    </head>

    <body>

        <form method="post" action="../../../../backend/router/router.php?action=deleteAccountCtrl&amp;user_id=<?= $user_id; ?>">
            <h2>Suppression du compte : cette action est irreversible</h2>

            <div>
                <?php if(isset($error_deletion)): ?>
                    <?= $error_deletion; ?>
                <?php endif; ?>
            </div>

            <div>
                <label for="delAccount">
                    <input type="password" name="currentPwd" id="delAccount" placeholder="Mot de passe" required>
                </label>
            </div>

            <div>
                <button type="submit">Supprimer le compte</button>
            </div>
        </form>
    </body>
</html>

