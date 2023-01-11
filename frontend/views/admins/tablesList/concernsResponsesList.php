<?php session_start();

    require_once('../../../../backend/controllers/adminsCtrl/tablesListCtrl.php');
    require_once('../../../../backend/controllers/paginationsCtrl/paginationsCtrl.php')

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Administration | Liste des réponses aux préoccupations</title>
        <link>
    </head>

    <body>

        <div>
            <?php require_once('../adminDetails/adminDetails.php'); ?>
        </div>

        <a href="../homePage/adminHomePage.php">Accueil</a>

        <h1>Liste des réponses aux préoccupations</h1>

        <?php foreach(getConcernsResponsesTableCtrl() as $response): ?>
            <div class="bord">
               <p>
                   <strong>Identifiant de la réponse : </strong> <?= $response['id']; ?>
               </p>

                <p>
                    <strong>Identifiant de la préoccupation : </strong> <?= $response['idConcern']; ?>
                </p>

                <p>
                    <strong>Auteur de la réponse : </strong> <?= $response['f_author']; ?>
                </p>

                <p>
                    <strong>Réponse : </strong> <?= $response['f_response']; ?>
                </p>

                <p>
                    <strong>Réponse enregistrée le : </strong> <?= $response['response_date']; ?>
                </p>

                <p>
                    <a href="../adminManage/deletions/deleteConcernResponse.php?response_id=<?= $response['id']; ?>" class="red">Retirer la réponse</a>
                </p>
            </div>
        <?php endforeach; ?>

        <div>
            <?php for($i=1; $i<=getLinksNumberForConcernsResponsesPagination(); $i++): ?>
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
