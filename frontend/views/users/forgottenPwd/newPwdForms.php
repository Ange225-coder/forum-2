

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Modification du mot de passe</title>
        <link>
    </head>

    <body>


        <form method="post" action="../../../../backend/router/router.php?action=setNewUserPwdCtrl">
            <h2>Entrez un nouveau mot de passe</h2>


            <div>
                <?php if(isset($error_modification_pwd)): ?>
                    <?= $error_modification_pwd; ?>
                <?php endif; ?>
            </div>

            <div>
                <label for="new_pwd">
                    <input type="password" name="new_pwd" id="new_pwd" placeholder="Ex: xyz2_0" required>
                </label>
            </div>

            <div>
                <label for="confirm_new_pwd">
                    <input type="password" name="confirm_new_pwd" id="confirm_new_pwd" required>
                </label>
            </div>

            <div>
                <button type="submit">Connectez vous</button>
            </div>

            <p>
                <em>NB: Vous serez redirigé vers la page de connexion</em>
            </p>
        </form>
    </body>
</html>