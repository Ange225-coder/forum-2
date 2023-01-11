<?php session_start();

    if(!isset($_SESSION['pseudo']) || !isset($_SESSION['email'])) {
        header('Location: ../userLogin/login.php');
    }

    require_once('../../../../backend/controllers/devConcernsCtrl/getAllDevConcernsCtrl.php');
    require_once('../../../../backend/controllers/paginationsCtrl/paginationsCtrl.php');
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Liste des préoccupations posées en programmation</title>
        <link>
    </head>

    <body>

        <div>
            <?php require_once('../usersDetail/usersDetail.php'); ?>
        </div>

        <a href="../homePage/memberHomePage.php">Retour au menu principal</a>

        <?php foreach(getAllDevConcernsCtrl() as $get_concerns): ?>
            <div class="bord">
                <p>
                    <strong>Languages utilisés : </strong> <?= $get_concerns['f_language']; ?>
                </p>

                <p>
                    <strong>Posté par : </strong> <?= $get_concerns['f_description']; ?>
                </p>

                <p>
                    <strong>Posté par : </strong> <?= $get_concerns['f_user']; ?>  <em>le <?= $get_concerns['date_concern_fr']; ?></em>
                </p>

                <p>
                    <a href="respondToConcerns.php?idConcern=<?= $get_concerns['id'] ?>">Répondre au problème posé</a><br >
                    <a href="displayConcernResponses.php?idConcern=<?= $get_concerns['id']; ?>">Voir les commentaires du problème</a>
                </p>
            </div>
        <?php endforeach;?>

        <div>
            <?php for($i=1; $i<=getLinksNumberForConcernsPagination(); $i++): ?>
                <?php if(getCurrentPage() != $i): ?>
                    <p>
                        <a href="?current_page=<?= $i; ?>"><?= $i ?></a>
                    </p>
                <?php else: ?>
                <p>
                    <a><?= $i; ?></a>
                </p>
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
