<?php session_start();

    if(!isset($_SESSION['pseudo']) || !isset($_SESSION['email'])) {
        header('Location: ../userLogin/login.php');
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Bienvenue <?= $_SESSION['pseudo'] ?></title>
        <link>
    </head>

    <body>

        <header>
            <div>
                <?= require_once('../usersDetail/usersDetail.php'); ?>
            </div>

            <h1>Bonjour <?= $_SESSION['pseudo']; ?> bienvenue sur mon forum</h1>
        </header>

        <div>
            <a href="../subjects/newSubject.php">Créer un sujet de discussion</a><br >
            <a href="../subjects/subjectsList.php">Parcourir toutes les discussions</a><br >
            <a href="../subjects/devConcerns.php">Poser un problème en programmation</a><br >
            <a href="../subjects/devConcernsList.php">Parcourir la liste des problèmes posés en programmation</a>
        </div>

    </body>
</html>
