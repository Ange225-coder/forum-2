<?php

    require_once('../../../../../backend/controllers/adminManagerCtrl/getUserRowCtrl.php');

    $getting_user_row = getUserRowCtrl();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Supprimer <?= $getting_user_row['f_pseudo']; ?></title>
        <link>
    </head>

    <body>

        <h1>Supprimer un utilisateur : cette action est irreversible</h1>

        <div>
            <p>
                <strong>Pseudonyme : </strong> <?= $getting_user_row['f_pseudo']; ?>
            </p>

            <p>
                <strong>Email : </strong> <?= $getting_user_row['f_email']; ?>
            </p>

            <p>
                <strong>Date d'inscription : </strong> <?= $getting_user_row['registration_date']; ?>
            </p>
        </div>

        <form method="post" action="../../../../../backend/router/router.php?action=userDeletionCtrl&amp;user_id=<?= $_GET['user_id'] ?>">

            <p>
                <?php if(isset($error_user_deletion)): ?>
                    <?= $error_user_deletion; ?>
                <?php endif; ?>
            </p>

            <div>
                <label for="admin_pwd">
                    <input type="password" name="admin_pwd" id="admin_pwd" placeholder="Mot de passe" required>
                </label>
            </div>

            <div>
                <button type="submit">Supprimer l'utilisateur</button>
            </div>
        </form>

    </body>
</html>