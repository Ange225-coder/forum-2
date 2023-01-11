<?php session_start();

    require_once('../../../../backend/controllers/adminsCtrl/tablesListCtrl.php');
    require_once('../../../../backend/controllers/paginationsCtrl/paginationsCtrl.php');

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Administration | Liste des préoccupations enregistrés sur le forum</title>
        <link>
    </head>

    <body>

        <div>
            <?php require_once('../adminDetails/adminDetails.php'); ?>
        </div>

        <a href="../homePage/adminHomePage.php">Accueil</a>

        <h1>Liste des préoccupations du forum</h1>

        <?php foreach(getDevConcernsTableCtrl() as $concerns): ?>
            <div class="bord">
                <p>
                    <strong>Identifiant de la préoccupation: </strong> <?= $concerns['id']; ?>
                </p>

                <p>
                    <strong>Auteur de la préoccupation posé : </strong> <?= $concerns['f_user']; ?>
                </p>

                <p>
                    <strong>Languages utilisés : </strong> <?= $concerns['f_language']; ?>
                </p>

                <p>
                    <strong>Description de la préoccupation : </strong> <?= $concerns['f_description'] ?>
                </p>

                <p>
                    <strong>Préoccupation posée le : </strong> <?= $concerns['concern_date']; ?>
                </p>

                <p>
                    <a href="../adminManage/deletions/deleteConcern.php?concern_id=<?= $concerns['id']; ?>" class="red">Retirer la préoccupation</a>
                </p>
            </div>
        <?php endforeach; ?>

        <div>
            <?php for($i=1; $i<=getLinksNumberForConcernsPagination(); $i++): ?>
                <?php if(getCurrentPage() != $i): ?>
                    <p>
                        <a href="?current_page=<?= $i; ?>"><?= $i; ?></a>
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
        margin-bottom: 3%;
    }

    .red {
        color: red;
    }
</style>
