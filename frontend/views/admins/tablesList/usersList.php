<?php session_start();

    require_once('../../../../backend/controllers/adminsCtrl/tablesListCtrl.php');
    require_once('../../../../backend/controllers/paginationsCtrl/paginationsCtrl.php')
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Administration | Listes des membres du forum</title>
        <link>
    </head>

    <body>

        <div>
            <?php require_once('../adminDetails/adminDetails.php'); ?>
        </div>

        <a href="../homePage/adminHomePage.php">Accueil</a>

        <h1>Liste des membres du forum</h1>

        <?php foreach(getUsersTableCtrl() as $users): ?>
            <div class="bord">
                <p>
                    <strong>Identifiant utilisateur: </strong> <?= $users['id']; ?>
                </p>

                <p>
                    <strong>Pseudonyme : </strong> <?= $users['f_pseudo']; ?>
                </p>

                <p>
                    <strong>Email : </strong> <?= $users['f_email']; ?>
                </p>

                <p>
                    <strong>Inscrit le : </strong> <?= $users['registration_date'] ?>
                </p>

                <p>
                    <a href="../adminManage/deletions/deleteUser.php?user_id=<?= $users['id']; ?>" class="red">Retirer l'utilisateur</a>
                </p>
            </div>
        <?php endforeach; ?>

        <div>
            <?php for($i=1; $i<=getLinksNumberForUsersPagination(); $i++): ?>
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
