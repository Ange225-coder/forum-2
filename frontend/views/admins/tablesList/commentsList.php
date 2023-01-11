<?php session_start();

    require_once('../../../../backend/controllers/adminsCtrl/tablesListCtrl.php');
    require_once('../../../../backend/controllers/paginationsCtrl/paginationsCtrl.php');

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Administration | Liste des commentaires des sujets crée sur le forum</title>
        <link>
    </head>

    <body>

        <div>
            <?php require_once('../adminDetails/adminDetails.php'); ?>
        </div>

        <a href="../homePage/adminHomePage.php">Accueil</a>

        <h1>Liste des commentaires des sujets du forum</h1>

        <?php foreach(getCommentsTableCtrl() as $comment): ?>
            <div class="bord">
                <p>
                    <strong>Identifiant du commentaire : </strong> <?= $comment['id']; ?>
                </p>

                <p>
                    <strong>Identifiant du post commenté : </strong> <?= $comment['idPost']; ?>
                </p>

                <p>
                    <strong>Auteur du commentaire : </strong> <?= $comment['f_author']; ?>
                </p>

                <p>
                    <strong>Commentaire : </strong> <?= $comment['f_comment']; ?>
                </p>

                <strong>Commentaire posté le : </strong> <?= $comment['comment_date'] ?>

                <p>
                    <a href="../adminManage/deletions/deleteComment.php?comment_id=<?= $comment['id']; ?>" class="red">Retirer le commentaire</a>
                </p>
            </div>
        <?php endforeach; ?>

        <div>
            <?php for($i=1; $i<=getLinksNumberForCommentsPagination(); $i++): ?>
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
