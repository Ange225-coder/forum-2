<?php session_start();

    if(!isset($_SESSION['pseudo']) || !isset($_SESSION['email'])) {
        header('Location: ../userLogin/login.php');
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Poser une préoccupation relatif à la programmation</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.57.0/codemirror.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.57.0/codemirror.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.57.0/mode/javascript/javascript.min.js"></script>
        <link>
    </head>

    <body>

        <div>
            <?php require_once('../usersDetail/usersDetail.php'); ?>
        </div>

        <form method="post" action="../../../../backend/router/router.php?action=setDevConcernsCtrl">
            <h2>Poser votre problème en programmation</h2>

            <div>
                <label for="language_used">Langages utilisés</label><br >
                <input type="text" name="language_used" id="language_used" placeholder="EX: PHP, JAVASCRIPT, ..." required>
            </div>

            <div>
                <label for="description">Description du problème (précisez les lignes concernées)</label><br >
                <textarea name="description" id="description" placeholder="Décrivez de manière explicite et brève votre préoccupation en précisant les lignes concernées" cols="45" rows="4" required></textarea>
            </div>

            <div>
                <label for="code">Copier et coller le code problématique ici</label><br >
                <textarea name="code" id="code" required>
                </textarea>
            </div>

            <script src="../../../../vendor/setCodeInEditor.js"></script>

            <div>
                <button type="submit">Poser votre problème</button>
            </div>
        </form>
    </body>
</html>



<style>
    .CodeMirror {
        height: 100%;
    }


</style>