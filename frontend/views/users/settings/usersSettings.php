<?php session_start();



?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Forum - Paramètres utilisateur</title>
        <link>
    </head>

    <body>

        <p>
            <a href="../../../../backend/logout/logout.php">Se déconnecter</a>
        </p>

        <a href="../../../../frontend/views/users/homePage/memberHomePage.php">Menu principal</a>

        <h1>Paramètres utilisateurs</h1>

        <form method="post" action="../../../../backend/router/router.php?action=updatingEmailCtrl&amp;user_id=<?= $_SESSION['id']; ?>">
            <h2>Mettre à jour l'email</h2>

            <div>
                <?php if(isset($error_updating_email)): ?>
                    <?= $error_updating_email; ?>
                <?php endif; ?>
            </div>

            <div>
                <label for="current_email">Email actuel</label><br >
                <input type="text" name="current_email" id="current_email" value="<?= $_SESSION['email']; ?>">
            </div>

            <div>
                <label for="new_email">Nouvel email</label><br >
                <input type="email" name="new_email" id="new_email" required>
            </div>

            <div>
                <button type="submit">Mettre l'email à jour</button>
            </div>
        </form>


        <form method="post" action="../../../../backend/router/router.php?action=updatingPwdCtrl&amp;user_id=<?= $_SESSION['id']; ?>">
            <h2>Mettre à jour le mot de passe</h2>

            <div>
                <?php if(isset($error_updating_pwd)): ?>
                    <?= $error_updating_pwd; ?>
                <?php endif; ?>
            </div>

            <div>
                <label for="current_pass">Mot de passe actuel</label><br >
                <input type="password" name="current_pass" id="current_pass">
            </div>

            <div>
                <Label for="new_pass">Nouveau mot de passe</Label><br >
                <input type="password" name="new_pass" id="new_pass">
            </div>

            <div>
                <label for="confirm_newPass">Confirmer le nouveau mot de passe</label><br >
                <input type="password" name="confirm_newPass" id="confirm_newPass">
            </div>

            <div>
                <button type="submit">Mettre l'email à jour</button>
            </div>
        </form>

        <div>
            <h2>Suppression du compte</h2>
            <p>
                <a href="delAccountForm.php?user_id=<?= $_SESSION['id']; ?>">Supprimer votre compte</a>
            </p>
        </div>
    </body>
</html>

