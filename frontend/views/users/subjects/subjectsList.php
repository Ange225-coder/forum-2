<?php session_start();

    if(!isset($_SESSION['pseudo']) || !isset($_SESSION['email'])) {
        header('Location: ../userLogin/login.php');
    }

    require_once('../../../../backend/controllers/subjectsCtrl/getAllSubjectCtrl.php');
    require_once('../../../../backend/controllers/paginationsCtrl/paginationsCtrl.php');
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Forum - liste des discussions</title>
        <link>
    </head>

    <body>
        <div>
            <?php require_once('../usersDetail/usersDetail.php'); ?>
        </div>

        <a href="../../users/homePage/memberHomePage.php">Retour au menu principal</a>

        <?php foreach (getAllSubjectCtrl() as $get_subject): ?>
            <div class="bord">
                <p>
                    <strong>Thème :</strong> <?= $get_subject['f_theme']; ?>
                </p>

                <p>
                    <strong>Description : </strong> <?= $get_subject['f_description']; ?>
                </p>

                <p>
                    <strong>Créer par : </strong> <?= $get_subject['user_pseudo']; ?> le <em><?= $get_subject['dateFr']; ?></em>
                </p>

                <p>
                    <a href="respondToSubject.php?idPost=<?= $get_subject['id']; ?>">Répondre à la préoccupation</a><br >
                    <a href="displayResponsesToComments.php?idPost=<?= $get_subject['id']; ?>">Voir les commentaires du post</a>
                </p>
            </div>
        <?php endforeach; ?>

        <div>
            <?php for($i=1; $i<=getLinksNumberForSubjectsPagination(); $i++): ?>
                <?php if(getCurrentPage() != $i): ?>
                    <p>
                        <a href="?current_page=<?= $i; ?>"><?= $i; ?></a>
                    </p>
                <?php else: ?>
                    <a><?= $i; ?></a>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    </body>
</html>


<style>
    .bord {
        border: 1px solid black;
        margin-bottom: 2%;
    }
</style>