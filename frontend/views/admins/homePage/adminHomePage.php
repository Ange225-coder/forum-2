<?php session_start();
    if(!isset($_SESSION['username'])) {
        header('Location: ../adminLogin/login.php');
    }

    require_once('../../../../backend/controllers/adminsCtrl/tablesCounterCtrl.php');
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Administrator | <?= $_SESSION['username']; ?></title>
        <link>
    </head>

    <body>

        <div>
            <?php require_once('../adminDetails/adminDetails.php'); ?>
        </div>

        <h2>Bienvenue <?= $_SESSION['username']; ?></h2>

        <div>
            <p>
                Utilisateurs enregistrés sur le forum : <br >
                <span><?= usersCounterCtrl(); ?></span>

                <a href="../tablesList/usersList.php">Voir la liste</a>
            </p>

            <p>
                Sujet crée sur le forum : <br >
                <span><?= subjectsCounterCtrl(); ?></span>

                <a href="../tablesList/subjectsList.php">Voir la liste</a>
            </p>

            <p>
                Commentaires des sujets du forum : <br >
                <span><?= commentsCounterCtrl(); ?></span>

                <a href="../tablesList/commentsList.php">Voir la liste</a>
            </p>

            <p>
                Préoccupations de développeurs enregistrés : <br >
                <span><?= devConcernsCounterCtrl(); ?></span>

                <a href="../tablesList/devConcernsList.php">Voir la liste</a>
            </p>

            <p>
                Réponse aux préoccupations de développeurs : <br >
                <span><?= concernsResponsesCounterCtrl(); ?></span>

                <a href="../tablesList/concernsResponsesList.php">Voir la liste</a>
            </p>

            <p>
                Suggestions : <br >
                <span><?= suggestionCounterCtrl(); ?></span>

                <a href="../tablesList/suggestionsList.php">Voir la liste</a>
            </p>
        </div>

    </body>
</html>