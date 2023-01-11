
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Forum | Connexion</title>
        <link>
    </head>

    <body>

        <form method="post" action="../../../../backend/router/router.php?action=userLoginCtrl">
            <h1>Connexion</h1>

            <div>
                <?php if(isset($error_login)): ?>
                    <?= $error_login; ?>
                <?php endif; ?>
            </div>

            <div>
                <label for="email">
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </label>
            </div>

            <div>
                <label for="password">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </label>
            </div>

            <div>
                <button type="submit">Se connecter</button>
            </div>

            <div>
                <a href="../../../../frontend/views/users/forgottenPwd/emailForm.php">Mot de passe oublié</a>
            </div>
        </form>
    </body>
</html>