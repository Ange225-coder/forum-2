<?php session_start();

    if(!isset($_SESSION['pseudo']) || !isset($_SESSION['email'])) {
        header('Location: ../userLogin/login.php');
    }

    require_once('../../../../backend/controllers/subjectsCtrl/getPostCtrl.php');
    require_once('../../../../backend/controllers/commentsCtrl/getPostCommentsCtrl.php');


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

        <a href="subjectsList.php">Liste des posts</a>

        <div>
            <p>
                <strong>Auteur : </strong> <?= $getting_post['user_pseudo']; ?>
            </p>

            <p>
                <strong>Theme : </strong> <?= $getting_post['f_theme']; ?>
            </p>

            <p>
                <strong>Description : </strong> <?= $getting_post['f_description']; ?>
            </p>
        </div>

        <h2>Commentaires</h2>

        <?php foreach(getPostCommentsCtrl() as $response_com): ?>
            <div>
                <ul>
                    <li>
                        <strong>Commentaire : </strong> <?= $response_com['f_comment'] ?>  <em>publié le <?= $response_com['date_com_fr'] ?></em><br >
                        <strong><em>Posté par : </em></strong> <?= $response_com['f_author']; ?>
                    </li>
                </ul>
            </div>
        <?php endforeach; ?>

        <form method="post" action="../../../../backend/router/router.php?action=setNewCommentCtrl&amp;idPost=<?= $getting_post['id']; ?>">
             <div>
                 <label for="responses">
                     <textarea name="comment" id="responses" placeholder="Répondre à un commentaire" cols="70" rows="3" required></textarea>
                 </label>
             </div>

            <div>
                <button type="submit">Publier votre réponse</button>
            </div>
        </form>
    </body>

</html>