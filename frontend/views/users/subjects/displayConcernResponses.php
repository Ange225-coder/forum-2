<?php session_start();

    if(!isset($_SESSION['pseudo']) || !isset($_SESSION['email'])) {
        header('Location: ../userLogin/login.php');
    }

    require_once('../../../../backend/controllers/devConcernsCtrl/getConcernCtrl.php');
    require_once('../../../../backend/controllers/concernsResponseCtrl/getConcernResponsesCtrl.php');

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

        <a href="devConcernsList.php">Retour à la liste des préoccupations</a>

        <div>
            <p>
                <strong>Auteur : </strong> <?= $concern['f_user'] ?>
            </p>

            <p>
                <strong>Langage utilisé : </strong> <?= $concern['f_language']; ?>
            </p>

            <p>
                <strong>Description : </strong> <?= $concern['f_description'] ?>
            </p>

            <label>
                <textarea id="code"><?= $concern['f_code'] ?></textarea>
            </label>

            <script src="../../../../vendor/setCodeInEditor.js"></script>
        </div>

        <h2>Commentaires</h2>

        <?php foreach(getConcernResponsesCtrl() as $response): ?>
            <div>
                <ul>
                    <li>
                        <strong>Commentaire : </strong> <?= $response['f_response']; ?>. <em>publié le <?= $response['date_response_fr'] ?></em><br >
                        <strong><em>Posté par : </em></strong> <?= $response['f_author']; ?>
                    </li>
                </ul>
            </div>
        <?php endforeach; ?>


        <form method="post" action="../../../../backend/router/router.php?action=setConcernResponseCtrl&amp;idConcern=<?= $concern['id']; ?>">
            <div>
                <label for="concern_response">
                    <textarea name="concern_response" id="concern_response" placeholder="Répondre à un commentaire" cols="70" rows="3"></textarea>
                </label>
            </div>

            <div>
                <button type="submit">Publier votre réponse</button>
            </div>
        </form>
    </body>
</html>





<style>
    .CodeMirror {
        height: 100%;
    }


</style>