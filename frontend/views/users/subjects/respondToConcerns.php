<?php session_start();

    if(!isset($_SESSION['pseudo']) || !isset($_SESSION['email'])) {
        header('Location: ../userLogin/login.php');
    }

    require_once('../../../../backend/controllers/devConcernsCtrl/getConcernCtrl.php');

    $concern = getConcernCtrl();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title><?= $concern['f_language']; ?></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.57.0/codemirror.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.57.0/codemirror.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.57.0/mode/javascript/javascript.min.js"></script>
        <link>
    </head>

    <body>

        <div>
            <?php require_once('../usersDetail/usersDetail.php'); ?>
        </div>

        <a href="devConcernsList.php">Retour</a>

        <div>
            <p>
                <strong>Auteur : </strong> <?= $concern['f_user']; ?>
            </p>

            <p>
                <strong>Languages utilisés : </strong> <?= $concern['f_language']; ?>
            </p>

            <p>
                <strong>Description : </strong> <?= $concern['f_description']; ?>
            </p>

            <strong>Code : </strong>
            <label>
                <textarea id="code"><?= $concern['f_code'] ?></textarea>
            </label>

            <script src="../../../../vendor/setCodeInEditor.js"></script>
        </div>

        <form method="post" action="../../../../backend/router/router.php?action=setConcernResponseCtrl&amp;idConcern=<?= $concern['id']; ?>">
            <h2>Répondre à la préoccupation</h2>

            <div>
                <?php if(isset($error_response)): ?>
                    <?= $error_response; ?>
                <?php endif; ?>
            </div>

            <div>
                <label for="concern_response">
                    <textarea name="concern_response" id="concern_response" cols="50" rows="3" placeholder="Préciser les lignes erronées..." required></textarea>
                </label>
            </div>

            <div>
                <button type="submit">Répondre</button>
            </div>
        </form>
    </body>
</html>


<style>
    .CodeMirror {
        height: 100%;
    }


</style>

