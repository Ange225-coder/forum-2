<?php session_start();

    if(!isset($_SESSION['pseudo']) || !isset($_SESSION['email'])) {
        header('Location: ../userLogin/login.php');
    }

    require_once('../../../../backend/controllers/subjectsCtrl/getPostCtrl.php');

    $getting_post = getPostCtrl();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title><?= $getting_post['f_theme']; ?></title>
        <link>
    </head>

    <body>

        <div>
            <?php require_once('../usersDetail/usersDetail.php'); ?>
        </div>

        <div>
            <p>
                <strong>Auteur : </strong> <?= $getting_post['user_pseudo']; ?>
            </p>

            <p>
                <strong>Thème : </strong> <?= $getting_post['f_theme']; ?>
            </p>

            <p>
                <strong>Description : </strong> <?= $getting_post['f_description']; ?>
            </p>
        </div>

        <form method="post" action="../../../../backend/router/router.php?action=setNewCommentCtrl&amp;idPost=<?= $getting_post['id']; ?>">
            <h2>Commentez le post</h2>

            <div>
                <?php if(isset($error_set_comment)): ?>
                    <?= $error_set_comment; ?>
                <?php endif; ?>
            </div>

            <div>
                <label for="comment">
                    <textarea name="comment" id="comment" cols="50" rows="8" required></textarea>
                </label>
            </div>

            <div>
                <button type="submit">Poster le commentaire</button>
            </div>
        </form>
    </body>
</html>