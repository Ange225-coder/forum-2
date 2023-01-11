<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Mot de passe oublié</title>
        <link>
    </head>

    <body>
        <form method="post" action="../../../../backend/router/router.php?action=getEmailCtrl">
            <h2>Entrez votre email</h2>

            <div>
                <?php if(isset($error_user_email)): ?>
                    <?= $error_user_email; ?>
                <?php endif; ?>
            </div>

            <div>
                <label for="email">
                    <input type="email" name="email" id="email" required>
                </label>
            </div>

            <div>
                <button type="submit">Continuer</button>
            </div>
        </form>
    </body>
</html>
