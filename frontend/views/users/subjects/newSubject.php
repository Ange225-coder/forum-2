<?php session_start();

    if(!isset($_SESSION['pseudo']) || !isset($_SESSION['email'])) {
        header('Location: ../userLogin/login.php');
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Forum - Créer un sujet de discussion</title>
        <link>
    </head>

    <body>

        <div>
            <?php require_once('../usersDetail/usersDetail.php'); ?>
        </div>

        <a href="../homePage/memberHomePage.php">Revenir à la page principale</a>

        <form method="post" action="../../../../backend/router/router.php?action=setNewSubjectCtrl">
            <h1>Créer votre sujet de discussion</h1>

            <div>
                <?php if(isset($error_field_empty)): ?>
                    <?= $error_field_empty; ?>
                <?php endif; ?>
            </div>

            <div>
                <label for="theme">Thème du sujet</label><br >
                <input type="text" name="theme" id="theme" placeholder="Ex: PHP, JAVASCRIPT, ..." required>
            </div>

            <div>
                <label for="description">Description du thème</label><br >
                <textarea name="description" id="description" placeholder="Donner la raison pour laquelle vous créez ce thème" cols="40" rows="6" required></textarea>
            </div>

            <div>
                <button type="submit">Créer le sujet</button>
            </div>
        </form>
    </body>
</html>
