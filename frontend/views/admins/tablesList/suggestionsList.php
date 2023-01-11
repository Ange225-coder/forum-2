<?php session_start();

    require_once('../../../../backend/controllers/adminsCtrl/tablesListCtrl.php');
    require_once('../../../../backend/controllers/paginationsCtrl/paginationsCtrl.php');


?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Administration | Liste des suggestions</title>
        <link>
    </head>

    <body>

        <div>
            <?php require_once('../adminDetails/adminDetails.php'); ?>
        </div>

        <a href="../homePage/adminHomePage.php">Accueil</a>

        <h1>Liste des suggestions</h1>

        <?php foreach(getSuggestionsCtrl() as $suggestion): ?>
            <div class="bord">
                <p>
                    <strong>Identifiant : </strong> <?= $suggestion['id'] ?>
                </p>

                <p>
                    <strong>Full name : </strong> <?= $suggestion['full_name']; ?>
                </p>

                <p>
                    <strong>Email : </strong> <?= $suggestion['s_email']; ?>
                </p>

                <p>
                    <strong>Numéro de téléphone : </strong> <?= $suggestion['s_phone']; ?>
                </p>

                <p>
                    <strong>Suggestion : </strong> <?= $suggestion['s_suggestion'] ?>
                </p>

                <p>
                    <strong>Publié le : </strong> <?= $suggestion['suggestion_date']; ?>
                </p>
            </div>
        <?php endforeach; ?>

        <div>
            <?php for($i=1; $i<=getLinksNumberForSuggestionsPagination(); $i++): ?>
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


