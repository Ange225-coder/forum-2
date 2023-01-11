<?php session_start();

    require_once('../../../../backend/controllers/adminsCtrl/tablesListCtrl.php');
    require_once('../../../../backend/controllers/paginationsCtrl/paginationsCtrl.php');

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Administration | Liste des sujets du forum</title>
        <link>
    </head>

    <body>

        <div>
            <?php require_once('../adminDetails/adminDetails.php'); ?>
        </div>

        <a href="../homePage/adminHomePage.php">Accueil</a>

        <h1>Liste des sujets du forum</h1>

        <?php foreach(getSubjectsTableCtrl() as $subjects): ?>
            <div class="bord">
                <p>
                    <strong>Identifiant du sujet: </strong> <?= $subjects['id']; ?>
                </p>

                <p>
                    <strong>Identifiant utilisateur : </strong> <?= $subjects['user_id']; ?>
                </p>

                <p>
                    <strong>Pseudonyme : </strong> <?= $subjects['user_pseudo']; ?>
                </p>

                <p>
                    <strong>Thème du sujet : </strong> <?= $subjects['f_theme'] ?>
                </p>

                <p>
                    <strong>Description du thème : </strong> <?= $subjects['f_description']; ?>
                </p>

                <p>
                    <strong>Sujet crée le : </strong> <?= $subjects['subject_registration_date']; ?>
                </p>

                <p>
                    <a href="../adminManage/deletions/deleteSubject.php?subject_id=<?= $subjects['id']; ?>" class="red">Retirer le sujet</a>
                </p>
            </div>
        <?php endforeach; ?>

        <div>
            <?php for($i=1; $i<=getLinksNumberForSubjectPagination(); $i++): ?>
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
