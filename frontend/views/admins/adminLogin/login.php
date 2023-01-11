<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Administration | S'authentifier</title>
        <link>
    </head>

    <body>

        <form method="post" action="../../../../backend/router/router.php?action=connectAnAdminCtrl">
            <h2>S'authentifier en tant qu'administrateur</h2>

            <div>
                <?php if(isset($error_admin_login)): ?>
                    <?= $error_admin_login; ?>
                <?php endif; ?>
            </div>

            <div>
                <label for="username">
                    <input type="text" name="username"  id="username" placeholder="username" required>
                </label>
            </div>

            <div>
                <label for="password">
                    <input type="password" name="password" id="password" placeholder="password  " required>
                </label>
            </div>

            <div>
                <button type="submit">S'authentifier</button>
            </div>

        </form>
    </body>
</html>